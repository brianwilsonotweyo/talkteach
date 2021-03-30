<?php

use function PHPSTORM_META\type;

if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('get_settings')) {
    function get_settings($type = '')
    {
        $CI = &get_instance();
        $CI->load->database();
        $CI->db->where('$type', $type);
        $result = $CI->db->get('settings')->row()->description;
        return $result;
    }
}
