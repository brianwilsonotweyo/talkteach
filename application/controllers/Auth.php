<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }


    public function index()
    {
        $this->load->view('back/account/login');
    }

    function validate_login()
    {
        $email = html_escape($this->input->post('email'));
        $password = html_escape($this->input->post('password'));

        $this->login_model->loginFunctionForAllUsers($email, $password);
    }
}
