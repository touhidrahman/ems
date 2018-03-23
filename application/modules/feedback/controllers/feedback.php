<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    
    
    function index() 
    { 
        $total_rows = $this->count_all();
        
        $this->load->library('pagination');
        
        $config['base_url'] = site_url('feedback/index');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 20;
        $config['num_links'] = 20;
        //$config['uri_segment'] = 3;
        $config['full_tag_open'] = '<div class="button-group">';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<button class="ink-button">';
        $config['first_tag_close'] = '</button>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<button class="ink-button">';
        $config['last_tag_close'] = '</button>';
        $config['next_link'] = 'Next &gt;&gt;';
        $config['next_tag_open'] = '<button class="ink-button">';
        $config['next_tag_close'] = '</button>';
        $config['prev_link'] = '&lt;&lt; Previous';
        $config['prev_tag_open'] = '<button class="ink-button">';
        $config['prev_tag_close'] = '</button>';
        $config['cur_tag_open'] = '<button class="ink-button green"><b>';
        $config['cur_tag_close'] = '</b></button>';
        $config['num_tag_open'] = '<button class="ink-button">';
        $config['num_tag_close'] = '</button>';
        
        
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        
        $offset = $this->uri->segment(3);
        $data["results"] = $this->get_with_limit($config["per_page"], $offset, 'sent_at desc');  
 
        $data['module'] = "feedback";
        $data['view_file'] = "index_feedback";
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    
    
    function send()
    {
        $submit = $this->input->post('submit', TRUE);
    
        if ($submit == "Submit")
        // Person has submitted data
        {
            $data = $this->get_data_from_post();
        } 
    
        $data['view_file'] = 'send_feedback';
        $this->load->module('template');
        $this->template->public_one_col($data);
    }
    
    
    
    function get_data_from_post()
    {
        $data = array(
            'email'         => $this->input->post('email', TRUE),
            'name'          => $this->input->post('name', TRUE),
            'subject'       => $this->input->post('subject', TRUE),
            'description'   => $this->input->post('description', TRUE),
            'sent_at'       => $this->input->post('sent_at', TRUE),
        );
    
        return $data;
    }
    
    
    
    function submit()
    {
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('name', 'Your Name (optional)', 'trim|xss_clean');
        $this->form_validation->set_rules('subject', 'Subject (optional)', 'trim|xss_clean');
        $this->form_validation->set_rules('email', 'Your Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');
    
        if ($this->form_validation->run($this) == FALSE )
        {
            $this->send();
        }
        else
        {
            $data = $this->get_data_from_post();
            $this->_insert($data);
    
            redirect('feedback/show_success');
        }
    }
    
    
    
    function show_success()
    {
        $this->load->module('template');
        $data['view_file'] = 'show_success';
        $this->template->public_one_col($data);
    }
    
    
    
    /* --------------------------------------
     *            PRE-BUILT METHODS
     * -------------------------------------- */
    function get($order_by)
    {
        $this->load->model('mdl_feedback');
        $query = $this->mdl_feedback->get($order_by);
        return $query;
    }
    
    function get_with_limit($limit, $offset, $order_by)
    {
        $this->load->model('mdl_feedback');
        $query = $this->mdl_feedback->get_with_limit($limit, $offset, $order_by);
        return $query;
    }
    
    function get_where($id)
    {
        $this->load->model('mdl_feedback');
        $query = $this->mdl_feedback->get_where($id);
        return $query;
    }
    
    function get_where_custom($col, $value)
    {
        $this->load->model('mdl_feedback');
        $query = $this->mdl_feedback->get_where_custom($col, $value);
        return $query;
    }
    
    function _insert($data)
    {
        $this->load->model('mdl_feedback');
        $this->mdl_feedback->_insert($data);
    }
    
    function _update($id, $data)
    {
        $this->load->model('mdl_feedback');
        $this->mdl_feedback->_update($id, $data);
    }
    
    function _delete($id)
    {
        $this->load->model('mdl_feedback');
        $this->mdl_feedback->_delete($id);
    }
    
    function count_where($column, $value)
    {
        $this->load->model('mdl_feedback');
        $count = $this->mdl_feedback->count_where($column, $value);
        return $count;
    }
    
    function count_all()
    {
        $this->load->model('mdl_feedback');
        $count = $this->mdl_feedback->count_all();
        return $count;
    }
    
    function get_max()
    {
        $this->load->model('mdl_feedback');
        $max_id = $this->mdl_feedback->get_max();
        return $max_id;
    }
    
    function _custom_query($mysql_query)
    {
        $this->load->model('mdl_feedback');
        $query = $this->mdl_feedback->_custom_query($mysql_query);
        return $query;
    }
    
    
}