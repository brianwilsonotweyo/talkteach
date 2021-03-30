<?php

use function PHPSTORM_META\type;

if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('translate')) {
    function translate($phrase = '')
    {
        $CI = &get_instance();
        $CI->load->database();
        if ($current_language = $CI->session->userdata('language')) {
        } else {
            $current_language = $CI->db->get_where('settings', array('type' => 'language'))->row()->description;
        }
        if ($current_language == '') {
            $current_language == 'english';
            $CI->session->set_userdata('current_language', $current_language);
        }

        $query = $CI->db->get_where('language', array("phrase" => $phrase))->row();
        $row =  $query->row();

        // RETURN CURRENT SESSION LANGUAGE FEILD

        if (isset($row->$current_language) && $row->$current_language != '')
            return $row->$current_language;
        else return ucwords(str_replace('_', ' ', $phrase));
    }
}
