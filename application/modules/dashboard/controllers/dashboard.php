<?php

if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    /* --------------------------------------
     *            PRE-BUILT METHODS          
     * -------------------------------------- */

    function __construct()
    {
        parent::__construct();
    }

    function admin()
    {
        $data['view_file'] = 'dash_admin';
        $this->load->module('template');
        $this->template->admin($data);
    }

    /* DASHBOARD FOR NORMAL USERS */
    function home()
    {
        $data['view_file'] = 'dash_home';
        $this->load->module('template');
        $this->template->public_admin($data);
    }
}