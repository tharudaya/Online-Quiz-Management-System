<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author Sachithre
 */
class Student extends CI_Controller {

    public function index() {
        $this->load->view('Student/home');
    }

    public function editProfile() {
        $this->load->model('User_Model');
        $data["details"] = $this->User_Model->showData();
        $this->load->view('Student/profile', $data);
    }

    public function saveProfile() {
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('batch', 'Batch', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->model('User_Model');
            $data["details"] = $this->User_Model->showData();
            $this->load->view('Student/profile', $data);
        } else {
            $this->load->model('User_Model');
            $response = $this->User_Model->updateData();
            if ($response) {
                $this->session->set_flashdata('msg', 'Your Profile Updated Successfully');

                redirect('Student/editProfile');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong!');
                redirect('Student/editProfile');
            }
        }
    }

    function showSubjects() {
        $this->load->model('Subject_Model');
        $data["details"] = $this->Subject_Model->showSubjectsByBatch();
        $this->load->view('Student/subjects', $data);
    }

    function showQuizzes() {
        $this->load->model('Quiz_Model');
        $data["q_details"] = $this->Quiz_Model->showQuizzesByBatch();
        $this->load->view('Student/quizzes', $data);
    }

    function attempt() {
        
        $this->load->model('Quiz_Model');
        $data["details"] = $this->Quiz_Model->getQuizQuestions();
        $data["quiz"] = $this->Quiz_Model->showQuizById();
        $this->load->view('Student/attemptQuiz', $data);
    }
    
    function mark(){
        $this->load->model('Quiz_Model');
            $data['details'] = $this->Quiz_Model->updateMarks();
            redirect('Student/showMarks');
        
    }

    function showMarks() {
        $this->load->model('Quiz_Model');
            $data['details'] = $this->Quiz_Model->showMarks();
            $this->load->view('Student/marks', $data);
    }

}
