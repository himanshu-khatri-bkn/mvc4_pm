<?php
class LoginController extends Controller
{
    public function index()
    {
        if (Session::get('logindtl')) {
            redirect('/');
            exit;
        }
        if (request('username')) {
            $loginmodel = $this->loadModel('user');
            if ($info = $loginmodel->checkLogin()) {
                Session::set('logindtl', $info);
                redirect('/');
            } else {
                Session::set('emsg', "Please Enter valid username and password");
            }
        }
        $this->load->view("login.index");
    }
    public function logout()
    {
        Session::destroy();
        redirect("/");
    }
}
