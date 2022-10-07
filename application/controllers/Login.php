<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('facebook');

    }
    public function index()
    {
       
    }

    public function fblogin()
    {
        $data['user'] = array();
        if ($this->facebook->is_authenticated()) {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id,name,first_name,last_name,email,link,gender,picture');
            if (!isset($user['error'])) {
                // $data['oauth_provider'] = 'facebook'; 
                $user['oauth_provider'] = 'facebook';
               $data['user'] = $user;
               echo $email        = $user['email'];
               echo "<br>";
             echo   $name = $user['first_name'];
             echo "<pre>";
               print_r($user);

            }

        } else {
            $data['title'] = 'Login - IPL Quiz';
            $this->load->view('login', $data);
        }
    }

}
