<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MX_Controller
{

    public function index()
    {
        $first_bit = $this->uri->segment(1);
        $second_bit = $this->uri->segment(2);
        
        $data = array();
        
        //If there is no method called in uri
        if ($second_bit == "") {
            // this must be a custom page having custom url
            

        }
        
        
        //if there is no controller called in uri
        if ($first_bit == '' || (($first_bit == 'home') && ($second_bit == ''))) {
            $data['module'] = 'home';
            $data['view_file'] = 'home_view';
        }
        
        $this->load->module('template');
        $this->template->public_one_col($data);
    }
    

}
