<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller {


    function __construct()
    {
        parent::__construct();
        
    }
    
    
    function add_meta_tags($data)
    { 
        if (!isset($data['keywords']))
        {
            $data['keywords'] = "Management";
        }
        if (!isset($data['description']))
        {
            $data['description'] = "One of the oldest management training institute of Bangladesh";
        }
        if (!isset($data['page_title']))
        {
            $data['page_title'] = "BIM Exam Management System";
        }
    }
    
    function public_one_col($data)
	{
	       $this->add_meta_tags($data);
	       $this->load->view('header', $data);
	       $this->load->view('public_one_col', $data);
	       $this->load->view('footer', $data);
	}
    
    function ques_view($data)
	{
	       $this->load->view('ques_view', $data);
	}
    
	

    
    function two_col($data)
	{
	    $this->load->view('two_col', $data);
	}
    
    function public_admin($data)
	{
	    $this->load->module('site_security');
	    $ck = $this->site_security->is_logged_in();
	    if ($ck)
	    {
	        $this->add_meta_tags($data);
	       $this->load->view('header', $data);
	       $this->load->view('public_admin', $data);
	       $this->load->view('footer', $data);
	    }
	}
	
    function three_col($data)
	{
	    $this->load->view('three_col', $data);
	}
    
    function admin($data)
	{
	    $this->load->module('site_security');
	    $ck = $this->site_security->make_sure_is_admin();
	    if ($ck)
	    {
	       $this->add_meta_tags($data);
	       $this->load->view('header', $data);
	       $this->load->view('admin', $data);
	       $this->load->view('footer', $data);
	    }
	}
	
}
