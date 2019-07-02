<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Sachithre
 */
class Admin extends CI_Controller {

    public function index() {
        $this->load->view('Admin/home');
    }

    function showStudents() {
        $this->load->model('User_Model');
        $data["details"] = $this->User_Model->getStudents();
        $this->load->view('Admin/students', $data);
    }

    function showLecturers() {
        $this->load->model('User_Model');
        $data["details"] = $this->User_Model->getLecturers();
        $this->load->view('Admin/lecturers', $data);
    }

    function activateL() {
        $this->load->model('User_Model');
        $response = $this->User_Model->activate();
        redirect('Admin/showLecturers');
        
    }

    function deactivateL() {
        $this->load->model('User_Model');
        $response = $this->User_Model->deactivate();
        redirect('Admin/showLecturers');
    }
    
    function activateS() {
        $this->load->model('User_Model');
        $response = $this->User_Model->activate();
        redirect('Admin/showStudents');
        
    }

    function deactivateS() {
        $this->load->model('User_Model');
        $response = $this->User_Model->deactivate();
        redirect('Admin/showStudents');
    }

}
