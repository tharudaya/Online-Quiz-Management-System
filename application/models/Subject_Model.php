<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Subject_Model extends CI_Model {

    function showSubjects() {
        $email = $this->session->userdata('email');

            $this->db->where('lecturer', $email);
            $rs = $this->db->get('subject');
            return $rs;
            
    }
    
    function showSubjectsByBatch() {
        $batch = $this->session->userdata('batch');

            $this->db->where('subject.batch', $batch);
            $this->db->join('lecturer', 'subject.lecturer = lecturer.email');
            $rs = $this->db->get('subject');
            return $rs;
            
    }
    
    function addSubject() {

            $data = array(
                'code' => $this->input->post('code', TRUE),
                'subjectName' => $this->input->post('subjectName', TRUE),
                'lecturer' => $this->session->userdata('email'),
                'batch' => $this->input->post('batch', TRUE)
            );
         
            $rs = $this->db->insert('subject', $data);
        
      
        
        return $rs;
    }

}
