<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lecturer
 *
 * @author Sachithre
 */
class Lecturer extends CI_Controller {

    public function index() {
        $this->load->view('Lecturer/home');
    }

    public function editProfile() {
        $this->load->model('User_Model');
        $data["details"] = $this->User_Model->showData();
        $this->load->view('Lecturer/profile', $data);
    }

    public function saveProfile() {
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('faculty', 'Faculty', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->model('User_Model');
            $data["details"] = $this->User_Model->showData();
            $this->load->view('Lecturer/profile', $data);
        } else {
            $this->load->model('User_Model');
            $response = $this->User_Model->updateData();
            if ($response) {
                $this->session->set_flashdata('msg', 'Your Profile Updated Successfully');

                redirect('Lecturer/editProfile');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong!');
                redirect('Lecturer/editProfile');
            }
        }
    }

    function showSubjects() {
        $this->load->model('Subject_Model');
        $data["details"] = $this->Subject_Model->showSubjects();
        $this->load->view('Lecturer/subjects', $data);
    }

    function showAddSubject() {

        $this->load->view('Lecturer/addSubject');
    }

    function addSubject() {
        $this->form_validation->set_rules('code', 'Subject Code', 'required|is_unique[subject.code]');
        $this->form_validation->set_rules('subjectName', 'Subject Name', 'required');
        $this->form_validation->set_rules('batch', 'Batch', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('Lecturer/addSubject');
        } else {
            $this->load->model('Subject_Model');
            $response = $this->Subject_Model->addSubject();
            if ($response) {
                $this->session->set_flashdata('msg', 'Subject Added Successfully');

                redirect('Lecturer/showSubjects');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong!');
                redirect('Lecturer/showAddSubject');
            }
        }
    }

    function showQuestions() {
        $this->load->model('Question_Model');
        $data["details"] = $this->Question_Model->showQuestions();
        $this->load->view('Lecturer/questions', $data);
    }

    function showAddQuestion() {
        $this->load->model('Subject_Model');
        $data["details"] = $this->Subject_Model->showSubjects();
        $this->load->view('Lecturer/addQuestion', $data);
    }

    function addQuestion() {
        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('a1', 'Answer 1', 'required');
        $this->form_validation->set_rules('a2', 'Answer 2', 'required');
        $this->form_validation->set_rules('a3', 'Answer 3', 'required');
        $this->form_validation->set_rules('a4', 'Answer 4', 'required');
        $this->form_validation->set_rules('a5', 'Answer 5', 'required');
        $this->form_validation->set_rules('correctAnswer', 'Correct Answer', 'required');
        $this->form_validation->set_rules('subjectCode', 'Subject Code', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->model('Subject_Model');
            $data["details"] = $this->Subject_Model->showSubjects();
            $this->load->view('Lecturer/addQuestion', $data);
        } else {
            $this->load->model('Question_Model');
            $response = $this->Question_Model->addQuestion();
            if ($response) {
                $this->session->set_flashdata('msg', 'Question Added Successfully');

                redirect('Lecturer/showQuestions');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong!');
                redirect('Lecturer/showAddQuestion');
            }
        }
    }

    function showQuizzes() {
        $this->load->model('Quiz_Model');
        $data["q_details"] = $this->Quiz_Model->showQuizzes();
        $this->load->model('Subject_Model');
        $data["s_details"] = $this->Subject_Model->showSubjects();
        $this->load->view('Lecturer/quizzes', $data);
    }

    function showAddQuiz() {
        $this->form_validation->set_rules('subjectCode', 'Subject', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('Quiz_Model');
            $data["q_details"] = $this->Quiz_Model->showQuizzes();
            $this->load->model('Subject_Model');
            $data["s_details"] = $this->Subject_Model->showSubjects();
            $this->load->view('Lecturer/quizzes', $data);
        } else {

            $data["subject"] = $this->input->post('subjectCode', TRUE);
            $this->load->model('Question_Model');
            $data["details"] = $this->Question_Model->showQuestionsBySubject();
            $this->load->view('Lecturer/addQuiz', $data);
        }
    }

    function addQuiz() {
        $this->form_validation->set_rules('quizName', 'Quiz Name', 'required');
        $this->form_validation->set_rules('time', 'Time Duration', 'required');
        $this->form_validation->set_rules('q[]', 'Selected Questions', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data["subject"] = $this->input->post('subjectCode', TRUE);
            $this->load->model('Question_Model');
            $data["details"] = $this->Question_Model->showQuestionsBySubject();
            $this->load->view('Lecturer/addQuiz', $data);
        } else {
            $this->load->model('Quiz_Model');
            $response = $this->Quiz_Model->addQuiz();
            if ($response) {
                $this->session->set_flashdata('msg', 'Quiz Added Successfully');

                redirect('Lecturer/showQuizzes');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong!');
                redirect('Lecturer/showAddQuiz');
            }
        }
    }
    function showMarks(){
        $this->load->model('Quiz_Model');
            $data['details'] = $this->Quiz_Model->showMarksByQuiz();
            $this->load->view('Lecturer/marks', $data);
        
    }

}
