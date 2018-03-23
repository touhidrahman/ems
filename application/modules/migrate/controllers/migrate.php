<?php

if (! defined('BASEPATH')) exit('No direct script access allowed');

class Migrate extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index () 
    { 
        $this->load->library('migration');
        
        if ( ! $this->migration->current())
        {
            show_error($this->migration->error_string());
        } else {
            $this->session->set_flashdata('notify', 'Database Installed/Updated!');
            echo 'Database Installed/Updated!';
            //redirect('pages/manage');
        }
    }
}