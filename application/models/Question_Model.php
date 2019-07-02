<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Question_Model extends CI_Model {

    function showQuestions() {
        $email = $this->session->userdata('email');
            $this->db->where('subject.lecturer', $email);
            $this->db->join('question', 'subject.code = question.subjectCode');
            $rs = $this->db->get('subject');
            
            return $rs;
    }
    
    function showQuestionsBySubject() {
        $email = $this->session->userdata('email');
        $subject = $this->input->post('subjectCode');
            $this->db->where('subject.lecturer', $email);
            $this->db->where('question.subjectCode', $subject);
            $this->db->join('question', 'subject.code = question.subjectCode');
            $rs = $this->db->get('subject');
            
            return $rs;
    }
    
    function addQuestion() {

            $data = array(
                'question' => $this->input->post('question', TRUE),
                'a1' => $this->input->post('a1', TRUE),
                'a2' => $this->input->post('a2', TRUE),
                'a3' => $this->input->post('a3', TRUE),
                'a4' => $this->input->post('a4', TRUE),
                'a5' => $this->input->post('a5', TRUE),
                'correctAnswer' => $this->input->post('correctAnswer', TRUE),
                'subjectCode' => $this->input->post('subjectCode', TRUE)
            );
         
            $rs = $this->db->insert('question', $data);
        
      
        
        return $rs;
    }

}
