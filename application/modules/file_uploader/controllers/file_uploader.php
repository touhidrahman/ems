<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class File_uploader extends MX_Controller
{


    function __construct()
    {
        parent::__construct();
    }
    
    
    
    
    
    
    
    
    
    
    
    /* --------------------------------------
     *            PRE-BUILT METHODS
     * -------------------------------------- */
    function get($order_by)
    {
        $this->load->model('mdl_file_uploader');
        $query = $this->mdl_file_uploader->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $this->load->model('mdl_file_uploader');
        $query = $this->mdl_file_uploader->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $this->load->model('mdl_file_uploader');
        $query = $this->mdl_file_uploader->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $this->load->model('mdl_file_uploader');
        $query = $this->mdl_file_uploader->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->load->model('mdl_file_uploader');
        $this->mdl_file_uploader->_insert($data);
    }

    function _update($id, $data)
    {
        $this->load->model('mdl_file_uploader');
        $this->mdl_file_uploader->_update($id, $data);
    }

    function _delete($id)
    {
        $this->load->model('mdl_file_uploader');
        $this->mdl_file_uploader->_delete($id);
    }

    function count_where($column, $value)
    {
        $this->load->model('mdl_file_uploader');
        $count = $this->mdl_file_uploader->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $this->load->model('mdl_file_uploader');
        $max_id = $this->mdl_file_uploader->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $this->load->model('mdl_file_uploader');
        $query = $this->mdl_file_uploader->_custom_query($mysql_query);
        return $query;
    }
    
    /* --------------------------------------
     *        END PRE-BUILT METHODS
     * -------------------------------------- */
}