<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Controllers extends MX_Controller
{
    /*
     * --------------------------------------
     * PRE-BUILT METHODS imported
     * --------------------------------------
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_controllers');
    }

    function get($order_by)
    {
        $query = $this->mdl_controllers->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->mdl_controllers->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->mdl_controllers->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->mdl_controllers->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $insert_id = $this->mdl_controllers->_insert($data);
        return $insert_id;
    }

    function _update($id, $data)
    {
        $this->mdl_controllers->_update($id, $data);
    }

    function _delete($id)
    {
        $this->mdl_controllers->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->mdl_controllers->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $max_id = $this->mdl_controllers->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->mdl_controllers->_custom_query($mysql_query);
        return $query;
    }
    
    /*
     * --------------------------------------
     * END PRE-BUILT METHODS AND START CUSTOM
     * --------------------------------------
     */
    
    function index () 
    {
        $data['module'] = "controllers"; // can be also loaded auto from uri
        $data['view_file'] = "index";
        $this->load->module('template');
        $this->template->public_one_col($data);
    }
    
    
    function login()
    {
        $controller_id = $this->session->userdata('controller_id');
        if (is_numeric($controller_id))
        {
            redirect('dashboard/home');
        } else {
            //load programs list
            $data['q'] = $this->_custom_query('SELECT * FROM subs ORDER BY sub_name');
            $data['module'] = "controllers"; // can be also loaded auto from uri
            $data['view_file'] = "login";
            $this->load->module('template');
            $this->template->public_one_col($data);
        }
    }

    function submit()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('batch', 'Batch', 'required|numeric');
        $this->form_validation->set_rules('sub_code', 'Subject', 'required|alpha');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_password_ck');
        
        if ($this->form_validation->run($this) == FALSE) {
            //$this argument is required in case libraries/MY_Form_validation is used
            $this->login();
        } else {
            $sub_code = $this->input->post('sub_code');
                $tpc = $this->_custom_query("SELECT prog_code FROM subs WHERE sub_code='$sub_code' LIMIT 1");
                $tpv = $tpc->row();
            $prog_code = $tpv->prog_code;
            $batch = $this->input->post('batch');
            $this->_in_you_go($prog_code, $sub_code, $batch);
        }
    }
    
    function password_ck($password)
    {
        $sub_code = $this->input->post('sub_code');
                $tpc = $this->_custom_query("SELECT prog_code FROM subs WHERE sub_code='$sub_code' LIMIT 1");
                $tpv = $tpc->row();
        $prog_code = $tpv->prog_code;
        $batch = $this->input->post('batch');
        
        $this->load->module('site_security');
        
        $password = $this->site_security->make_hash($password);
        
        
        $this->load->model('mdl_controllers');
        $result = $this->mdl_controllers->password_ck($prog_code, $sub_code, $batch, $password);
        if ($result == FALSE)
        {
            $this->form_validation->set_message('password_ck', "Invalid Username/Password");
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
    
    function _in_you_go($prog_code, $sub_code, $batch)
    {
        $query = $this->_custom_query(
            "SELECT * FROM controllers WHERE prog_code='$prog_code' AND batch='$batch' AND sub_code='$sub_code'"
            );
        foreach($query->result() as $row)
        {
            $controller_id = $row->id;
            $prog_code = $row->prog_code;
            $batch = $row->batch;
            $sub_code = $row->sub_code;
        }
        //provide session
        $this->session->set_userdata('controller_id', $controller_id);
        $this->session->set_userdata('prog_code', $prog_code);
        $this->session->set_userdata('batch', $batch);
        $this->session->set_userdata('sub_code', $sub_code);
        
            redirect('controllers');
    }
    
    
    function logout()
    { 
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
   
    
    function password_change()
    {
        $this->load->module('site_security');
        if (!$this->site_security->is_logged_in())
        {
            redirect('controllers/login');
        } else {
            $data['module'] = "controllers"; // can be also loaded auto from uri
            $data['view_file'] = "password_change";
            $this->load->module('template');
            $this->template->public_one_col($data);
        }
    }
    
    
    
    function change_pass()
    { 
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('cur_pass', 'Current Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('conf_password', 'Confirm Password', 'required|min_length[6]|matches[password]');
        
        if ($this->form_validation->run($this) == FALSE) {
            //$this argument is required in case libraries/MY_Form_validation is used
            $this->password_change();
        } else {
            $this->load->module('site_security');
            $cur_pass = $this->site_security->make_hash($this->input->post('cur_pass'));
            $id = $this->session->userdata('controller_id');
            $new_pass = $this->site_security->make_hash($this->input->post('password'));
            $changed = $this->mdl_controllers->change_pass($id, $cur_pass, $new_pass);
            
            if ($changed == TRUE)
            {
                $notify = '<div class="ink-alert basic align-center" role="alert">Password successfully changed</div>';
                $this->session->set_flashdata('notify', $notify);
            }
            
            redirect('dashboard/home');
        }
    }
    
    
    
    function forgot_password() 
    { 
        $data['module'] = "controllers"; // can be also loaded auto from uri
        $data['view_file'] = "forgot_password";
        $this->load->module('template');
        $this->template->public_one_col($data);
    }
    
    
}