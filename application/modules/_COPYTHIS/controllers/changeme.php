<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class CHANGEME extends MX_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_changeme');
    }
    
    
    
    
    
    
    
    
    
    
    
    /* --------------------------------------
     *            PRE-BUILT METHODS
     * -------------------------------------- */
    function get($order_by)
    {
        $query = $this->mdl_changeme->get($order_by);
        return $query;
    }

    function get_col($fieldname)
    {
        $query = $this->mdl_changeme->get_col($fieldname);
        return $query;
    }
    
    
    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->mdl_changeme->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->mdl_changeme->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->mdl_changeme->get_where_custom($col, $value);
        return $query;
    }

    function get_where_custom_orderby($col, $value, $orderby)
    {
        $query = $this->mdl_changeme->get_where_custom($col, $value, $orderby);
        return $query;
    }

    function _insert($data)
    {
        $this->mdl_changeme->_insert($data);
    }

    function _update($id, $data)
    {
        $this->mdl_changeme->_update($id, $data);
    }

    function _delete($id)
    {
        $this->mdl_changeme->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->mdl_changeme->count_where($column, $value);
        return $count;
    }

    function count_all()
    {
        $count = $this->mdl_changeme->count_all();
        return $count;
    }
    
    function get_max()
    {
        $max_id = $this->mdl_changeme->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->mdl_changeme->_custom_query($mysql_query);
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