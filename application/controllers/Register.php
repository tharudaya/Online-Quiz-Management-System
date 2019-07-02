<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of register
 *
 * @author Sachithre
 */
class Register extends CI_Controller {

    public function registerUser() {

        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->input->post('role') == 'Student') {
            $this->form_validation->set_rules('batch', 'Batch', 'required');
        } elseif ($this->input->post('role') == 'Lecturer') {
            $this->form_validation->set_rules('faculty', 'Faculty', 'required');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Register');
        } else {
            $this->load->model('User_Model');
            $response = $this->User_Model->insertUserData();
            if ($response) {
                $this->session->set_flashdata('msg', 'Registered Successfully... Please Login');
                redirect('Home/showLogin');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong!');
                redirect('Home/showRegister');
            }
        }
    }

}
