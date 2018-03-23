<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Tests extends MX_Controller
{
    /*
     * --------------------------------------
     * PRE-BUILT METHODS imported
     * --------------------------------------
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_test');
    }

    function get($order_by)
    {
        $query = $this->mdl_test->get($order_by);
        return $query;
    }
    
    function get_col($fieldname)
    {
        $query = $this->mdl_test->get_col($fieldname);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->mdl_test->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->mdl_test->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->mdl_test->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $insert_id = $this->mdl_test->_insert($data);
        return $insert_id;
    }

    function _update($id, $data)
    {
        $this->mdl_test->_update($id, $data);
    }

    function _delete($id)
    {
        $this->mdl_test->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->mdl_test->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $max_id = $this->mdl_test->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->mdl_test->_custom_query($mysql_query);
        return $query;
    }
    
    /*
     * --------------------------------------
     * END PRE-BUILT METHODS AND START CUSTOM
     * --------------------------------------
     */
    
    function index () 
    {
        //list tests based on user
        $data['prog_code'] = $this->session->userdata('prog_code');
        $data['roll'] = $this->session->userdata('roll');
        $data['batch'] = $this->session->userdata('batch');
        $data['aval_tests'] = $this->_custom_query("SELECT * FROM tests WHERE prog_code='".$data['prog_code']."' AND batch='" .$data['batch']. "' ORDER BY sub_code, type");
        $data['module'] = "tests"; // can be also loaded auto from uri
        $data['view_file'] = "index";
        $this->load->module('template');
        $this->template->public_one_col($data);
    }
    
    function take ()
    { 
        $test_id = $this->uri->segment(3);
        if ($this->session->userdata('counter')) {
            $counter = $this->session->userdata('counter');
        } else {
            $counter = 0;
        }
        
        //save sen data of last ques
        if ($this->input->post('submit') == 'Submit & Next')
        {
            $sid = $this->session->all_userdata();
            $cq = $this->_custom_query("SELECT true_ans FROM questions WHERE id='".$this->input->post('ques_id')."'");
            $cqr = $cq->row();
            $ans = array(
                'user_id' => $this->session->userdata('user_id'),
                'ques_id' => $this->input->post('ques_id'),
                'user_ans' => $this->input->post('user_ans'),
                'test_id' => $test_id,
                'session_id' => $sid['session_id'],
                'last_activity' => time(),
                'true_ans' => $cqr->true_ans,
            );
            $this->load->module('answers');
            $this->answers->_insert($ans);
        }
        
        //if counter == total ques, finish
        $tq = $this->_custom_query("SELECT * FROM tests WHERE id='$test_id'");
        $tq_val = $tq->row();
        $total_ques = $data['total_ques'] = $tq_val->total_ques;
        $total_marks = $tq_val->total_marks;
        $data['testname'] = $tq_val->testname;
        $data['prog_code'] = $tq_val->prog_code;
        $data['sub_code'] = $tq_val->sub_code;
        $data['batch'] = $tq_val->batch;
        
        if ($counter < $total_ques)
        {
            //load appropriate ques
            // SELECT * FROM questions WHERE test_id=test_id LIMIT 1, offset
            $data['ques'] = $this->_custom_query("SELECT * FROM questions WHERE test_id='$test_id' LIMIT $counter, 1");
            
            //view ques
            $new_count = $counter + 1;
            $this->session->set_userdata('counter', $new_count);
            $data['test_id'] = $test_id;
            $data['module'] = "tests"; // can be also loaded auto from uri
            $data['view_file'] = "take";
            $this->load->module('template');
            $this->template->ques_view($data);
        } else {
            //get the total marks
            $q1 = $this->_custom_query("SELECT * FROM answers WHERE test_id='$test_id' AND user_id='".$sid['user_id']."' AND session_id='".$sid['session_id']."'");
            $correct_ans = 0;
            foreach ($q1->result() as $r)
            {
                if ($r->user_ans == $r->true_ans)
                {
                    $correct_ans+=1;
                }
            }
            $obtained_marks = $total_marks / $total_ques * $correct_ans;
            //use total marks to save in results table
            $result = array(
                'user_id' => $this->session->userdata('user_id'),
                'test_id' => $test_id,
                'session_id' => $sid['session_id'],
                'marks' => $obtained_marks, //add business logic to calculate total marks
            );
            //insert ignore if there is a dame combo of testid and userid available
            $tql = $this->_custom_query("SELECT COUNT(*) AS count FROM results WHERE test_id='".$result['test_id']."' AND user_id='".$result['user_id']."'");
            $tqll = $tql->row();
            $no_prev = $tqll->count;
            
            //$this->load->module('results');
            //$this->results->_insert($result);
            $this->session->set_userdata('counter', 0);
            //redirect ('results/'.$test_id);
            redirect ('results');
        }
        
    }
    
    function create()
    {
        //if clicked on edit link
        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);
    
        if ($submit == "Submit")
        // Person has submitted data
        {
            $data = $this->get_data_from_post();
        } else {
            if (is_numeric($update_id)) {
                $data = $this->get_data_from_db($update_id);
            }
        }
    
        if (! isset($data)) {
            $data = $this->get_data_from_post();
        }
    
        $data['update_id'] = $update_id;
        //$data['user_id'] = $this->session->userdata('user_id');
    
        //load options in create page
        $data['qq'] = $this->_custom_query('SELECT * FROM subs ORDER BY sub_name, prog_code');
        
        $data['view_file'] = 'create';
        $this->load->module('template');
        $this->template->public_one_col($data);
    }
    
    function submit()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('sub_code', 'Subject Code', 'required');
        
        if ($this->form_validation->run($this) == FALSE) {
            //$this argument is required in case libraries/MY_Form_validation is used
            $this->create();
        } else {
            $data = $this->get_data_from_post();
            $update_id = $this->uri->segment(3);
            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
            } else {
                $test_id = $this->_insert($data); //insert method returns id
            }
    //fwd to questions to input as per total ques
            redirect('questions/create_all/'.$test_id);
        }
    }

    function get_data_from_post()
    {
        $q = $this->_custom_query("SELECT prog_code FROM subs WHERE sub_code='".$this->input->post('sub_code')."' LIMIT 1");
        $r = $q->row();
        $data = array(
            'testname' => $this->input->post('testname', TRUE),
            'sub_code' => $this->input->post('sub_code', TRUE),
            'prog_code' => $r->prog_code,
            'total_ques' => $this->input->post('total_ques', TRUE),
            'total_marks' => $this->input->post('total_marks', TRUE),
            'type' => $this->input->post('type', TRUE),
            'batch' => $this->input->post('batch', TRUE),
        );
    
        return $data;
    }
    
    function get_data_from_db($update_id)
    {
        $query = $this->mdl_test->get_where($update_id);
        foreach ($query->result() as $row) {
    
            $data = array(
            'testname' => $row->testname,
            'sub_code' => $row->sub_code,
            'prog_code' => $row->prog_code,
            'total_ques' => $row->total_ques,
            'total_marks' => $row->total_marks,
            'type' => $row->type,
            'batch' => $row->batch,
            );
        }
    
        if (! isset($data)) {
            $data = "";
        }
        return $data;
    }
    
}