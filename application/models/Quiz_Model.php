<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Quiz_Model extends CI_Model {

    function showQuizzes() {
        $email = $this->session->userdata('email');
        $this->db->where('lecturer', $email);
        $rs = $this->db->get('quiz');

        return $rs;
    }
    
    function showQuizById() {
        $id = $this->input->post('quiz_id');
        $this->db->where('id', $id);
        $rs = $this->db->get('quiz');

        return $rs;
    }

    function showQuizzesByBatch() {
        $batch = $this->session->userdata('batch');

        $this->db->where('subject.batch', $batch);
        $this->db->join('quiz', 'subject.code = quiz.subject');
        $rs = $this->db->get('subject');
        return $rs;
    }

    function addQuiz() {
        $subject = $this->input->post('subjectCode', TRUE);
        $time = $this->input->post('time', TRUE);

        $data1 = array(
            'quizName' => $this->input->post('quizName', TRUE),
            'lecturer' => $this->session->userdata('email'),
            'subject' => $subject,
            'time' => $time
        );

        $rs1 = $this->db->insert('quiz', $data1);
        $insert_id = $this->db->insert_id();

        foreach ($this->input->post('q[]') as $value) {

            $data2 = array(
                'question_no' => $value,
                'quiz_id' => $insert_id
            );
            $rs2 = $this->db->insert('quiz_question', $data2);
        }
        return $rs1 || $rs2;
    }
    
    function getQuizQuestions(){
        $quiz_id=  $this->input->post('quiz_id');
         $this->db->where('quiz_question.quiz_id', $quiz_id);
        $this->db->join('question', 'quiz_question.question_no = question.no');
        $rs = $this->db->get('quiz_question');

        return $rs;
    }
    
    function updateMarks(){
        $i=  $this->input->post('i');
        $marks=0;
        for($a=0; $a<$i; $a++ ){
            $temp1= $this->input->post('ans['.$a.']');
            $temp2=$this->input->post('ans2['.$a.']');
            if($temp1==$temp2){ $marks++;}
        }
        
        $data = array(
                'student' => $this->session->userdata('email'),
                'quizId' => $this->input->post('quizId'),
                'marks' => $marks
            );
         
            $rs = $this->db->insert('marks', $data);
        return $rs;
    }
    
    function showMarks(){
        $email = $this->session->userdata('email');
       
        $this->db->where('marks.student', $email);
        $this->db->join('quiz', 'marks.quizId = quiz.id');
        $rs = $this->db->get('marks');

        return $rs;
        
    }
    
    function showMarksByQuiz(){
        $email = $this->session->userdata('email');
       
        $this->db->where('quiz.lecturer', $email);
        $this->db->join('quiz', 'marks.quizId = quiz.id');
        $rs = $this->db->get('marks');

        return $rs;
        
    }

}
