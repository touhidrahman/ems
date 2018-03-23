<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends MX_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_question');
    }
    
    function index ()
    {
        //list tests based on user
        $data['prog_code'] = $this->session->userdata('prog_code');
        $data['sub_code'] = $this->session->userdata('sub_code');
        $data['batch'] = $this->session->userdata('batch');
        $data['aval_tests'] = $this->_custom_query("SELECT * FROM tests WHERE prog_code='".$data['prog_code']."' AND batch='" .$data['batch']. "' ORDER BY sub_code, type");
        $data['module'] = "tests"; // can be also loaded auto from uri
        $data['view_file'] = "index";
        $this->load->module('template');
        $this->template->public_one_col($data);
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
    
        $data['view_file'] = 'create';
        $this->load->module('template');
        $this->template->public_one_col($data);
    }
    
    
    function create_all()
    {
        //if clicked on edit link
        $test_id = $this->uri->segment(3);
        $tt = $this->_custom_query("SELECT total_ques FROM tests WHERE id='$test_id'");
        $tv = $tt->row();
        $data['total_ques'] = $tv->total_ques;
        
        $data['module'] = 'questions';
        $data['view_file'] = 'create_all';
        $this->load->module('template');
        $this->template->public_one_col($data);
    }
    
    function submit_all()
    {
        $total_ques = $this->input->post('total_ques');
    
        for ($i = 1; $i <= $total_ques; $i++)
        {
            $data = array(
                'ques_title' => $this->input->post('ques_title'.$i, TRUE),
                'ans1' => $this->input->post('ans1'.$i, TRUE),
                'ans2' => $this->input->post('ans2'.$i, TRUE),
                'ans3' => $this->input->post('ans3'.$i, TRUE),
                'ans4' => $this->input->post('ans4'.$i, TRUE),
                'true_ans' => $this->input->post('true_ans'.$i, TRUE),
                'test_id' => $this->input->post('test_id', TRUE),
            );
            $this->_insert($data);
        }
    
            redirect('tests');
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
                $this->_insert($data);
            }
    
            redirect('tests');
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
    
    
    
    
    
    
    
    
    
    /* --------------------------------------
     *            PRE-BUILT METHODS
     * -------------------------------------- */
    function get($order_by)
    {
        $query = $this->mdl_question->get($order_by);
        return $query;
    }

    function get_col($fieldname)
    {
        $query = $this->mdl_question->get_col($fieldname);
        return $query;
    }
    
    
    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->mdl_question->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->mdl_question->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->mdl_question->get_where_custom($col, $value);
        return $query;
    }

    function get_where_custom_orderby($col, $value, $orderby)
    {
        $query = $this->mdl_question->get_where_custom($col, $value, $orderby);
        return $query;
    }

    function _insert($data)
    {
        $this->mdl_question->_insert($data);
    }

    function _update($id, $data)
    {
        $this->mdl_question->_update($id, $data);
    }

    function _delete($id)
    {
        $this->mdl_question->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->mdl_question->count_where($column, $value);
        return $count;
    }

    function count_all()
    {
        $count = $this->mdl_question->count_all();
        return $count;
    }
    
    function get_max()
    {
        $max_id = $this->mdl_question->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->mdl_question->_custom_query($mysql_query);
        return $query;
    }
    
    /* --------------------------------------
     *        END PRE-BUILT METHODS
     * -------------------------------------- */
    /*
     * 1. Every MySQL Table should have a corresponding module
     * 2. Every module has the same name that corresponds the table
     * 3. Controller folders must not contain more than 1 php file
     * 4. Model folders must not contain more than 1 php file
     * 5. View folder can contain many files
     *  */
}