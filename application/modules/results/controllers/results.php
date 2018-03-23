<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Results extends MX_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_result');
    }
    
    function index() 
    { 
        //list tests based on user
        $data['user_id'] = $this->session->userdata('user_id');
        $data['prog_code'] = $this->session->userdata('prog_code');
        $data['roll'] = $this->session->userdata('roll');
        $data['batch'] = $this->session->userdata('batch');
        $data['aval_tests'] = $this->_custom_query(
            "SELECT r.marks, t.testname, t.prog_code, t.sub_code, t.total_marks, t.type, t.id, r.session_id
            FROM `results` r 
            JOIN `tests` t 
            JOIN `users` u 
            ON (t.id = r.test_id) AND (u.id = r.user_id)
            WHERE r.user_id = '".$data['user_id']."' 
            ORDER BY t.testname"
            );
        $data['module'] = "results"; // can be also loaded auto from uri
        $data['view_file'] = "index";
        $this->load->module('template');
        $this->template->public_one_col($data);
    }
    
    
    
    
    
    
    
    
    
    /* --------------------------------------
     *            PRE-BUILT METHODS
     * -------------------------------------- */
    function get($order_by)
    {
        $query = $this->mdl_result->get($order_by);
        return $query;
    }

    function get_col($fieldname)
    {
        $query = $this->mdl_result->get_col($fieldname);
        return $query;
    }
    
    
    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->mdl_result->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->mdl_result->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->mdl_result->get_where_custom($col, $value);
        return $query;
    }

    function get_where_custom_orderby($col, $value, $orderby)
    {
        $query = $this->mdl_result->get_where_custom($col, $value, $orderby);
        return $query;
    }

    function _insert($data)
    {
        $this->mdl_result->_insert($data);
    }

    function _update($id, $data)
    {
        $this->mdl_result->_update($id, $data);
    }

    function _delete($id)
    {
        $this->mdl_result->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->mdl_result->count_where($column, $value);
        return $count;
    }

    function count_all()
    {
        $count = $this->mdl_result->count_all();
        return $count;
    }
    
    function get_max()
    {
        $max_id = $this->mdl_result->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->mdl_result->_custom_query($mysql_query);
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