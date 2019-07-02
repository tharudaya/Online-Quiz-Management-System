<?php

class Login extends CI_Controller {

    public function loginUser() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Login');
        } else {
            $this->load->model('User_Model');
            $user = $this->User_Model->LoginUser();
            if ($user == "1") {
                $this->session->set_flashdata('errmsg', 'You are not activated yet');
                redirect('Home/showLogin');
            } elseif ($user == false) {
                $this->session->set_flashdata('errmsg', 'Wrong email and password');
                redirect('Home/showLogin');
            } else {
                $user_data = array(
                    'email' => $user->email,
                    'type' => $user->type,
                    'fname' => $user->fname,
                    'lname' => $user->lname,
                    'batch' => $user->batch,
                    'faculty' => $user->faculty,
                    'loggedin' => $user->loggedin
                );
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('welocme', 'Welcome back');
                if ($user->type == 'admin') {
                    redirect('Admin/index');
                } elseif ($user->type == 'lecturer') {
                    redirect('Lecturer/index');
                } elseif ($user->type == 'student') {
                    redirect('Student/index');
                }
            }
        }
    }

    public function logoutUser() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('type');
        $this->session->unset_userdata('fname');
        $this->session->unset_userdata('lname');
        $this->session->unset_userdata('batch');
        $this->session->unset_userdata('faculty');
        $this->session->unset_userdata('loggedin');
        redirect('Home/index');
    }

}
