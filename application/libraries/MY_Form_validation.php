<?php
class MY_Form_validation extends CI_Form_validation
{
    function run($modules='', $group='') {
        (is_object($modules)) AND $this->CI =&$modules;
        return parent::run($group);
    }
}