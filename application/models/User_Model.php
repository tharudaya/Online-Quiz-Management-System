<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Model
 *
 * @author Sachithre
 */
class User_Model extends CI_Model {

    public function insertUserData() {

        if ($this->input->post('role') == 'Student') {
            $data1 = array(
                'email' => $this->input->post('email', TRUE),
                'password' => sha1($this->input->post('password', TRUE)),
                'activated' => 0,
                'type' => 'student'
            );
            $data2 = array(
                'firstname' => $this->input->post('fname', TRUE),
                'lastname' => $this->input->post('lname', TRUE),
                'batch' => $this->input->post('batch', TRUE),
                'email' => $this->input->post('email', TRUE)
            );
            $this->db->trans_start();
            $rs1 = $this->db->insert('user', $data1);
            $rs2 = $this->db->insert('student', $data2);
            $this->db->trans_complete();
        } elseif ($this->input->post('role') == 'Lecturer') {
            $data1 = array(
                'email' => $this->input->post('email', TRUE),
                'password' => sha1($this->input->post('password', TRUE)),
                'activated' => 0,
                'type' => 'lecturer'
            );
            $data2 = array(
                'firstname' => $this->input->post('fname', TRUE),
                'lastname' => $this->input->post('lname', TRUE),
                'faculty' => $this->input->post('faculty', TRUE),
                'email' => $this->input->post('email', TRUE)
            );

            $this->db->trans_start();
            $rs1 = $this->db->insert('user', $data1);
            $rs2 = $this->db->insert('lecturer', $data2);
            $this->db->trans_complete();
        }
        return $rs1 || $rs2;
    }

    function activate() {
       $email = $this->input->post('email');
        $data = array(
            'activated' => 1
        );
        $this->db->where('email', $email);
        $rs = $this->db->update('user', $data);

        return $rs; 
    }

    function deactivate() {
        $email = $this->input->post('email');
        $data = array(
            'activated' => 0
        );
        $this->db->where('email', $email);
        $rs = $this->db->update('user', $data);

        return $rs;
    }

    function showdata() {
        if ($this->session->userdata('type') == 'student') {
            $email = $this->session->userdata('email');

            $this->db->where('user.email', $email);
            $this->db->join('student', 'user.email = student.email');
            $rs = $this->db->get('user');
        } elseif ($this->session->userdata('type') == 'lecturer') {
            $email = $this->session->userdata('email');

            $this->db->where('user.email', $email);
            $this->db->join('lecturer', 'user.email = lecturer.email');
            $rs = $this->db->get('user');
        }
        return $rs;
    }

    function updateData() {

        if ($this->session->userdata('type') == 'student') {
            $email = $this->session->userdata('email');
            $data2 = array(
                'firstname' => $this->input->post('fname', TRUE),
                'lastname' => $this->input->post('lname', TRUE),
                'batch' => $this->input->post('batch', TRUE)
            );
            $this->db->where('email', $email);
            $rs2 = $this->db->update('student', $data2);
        } elseif ($this->session->userdata('type') == 'lecturer') {
            $email = $this->session->userdata('email');
            $data2 = array(
                'firstname' => $this->input->post('fname', TRUE),
                'lastname' => $this->input->post('lname', TRUE),
                'faculty' => $this->input->post('faculty', TRUE)
            );

            $this->db->where('email', $email);
            $rs2 = $this->db->update('lecturer', $data2);
        }
        return $rs2;
    }

    function getStudents() {
        $this->db->join('student', 'user.email = student.email');
        $rs = $this->db->get('user');
        return $rs;
    }

    function getLecturers() {
        $this->db->join('lecturer', 'user.email = lecturer.email');
        $rs = $this->db->get('user');
        return $rs;
    }

    function LoginUser() {
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $respond1 = $this->db->get('user');
        if ($respond1->num_rows() == 1) {
            $user_U = $respond1->row(0);
            if ($user_U->activated == 1) {
                if ($user_U->type == 'student') {

                    $this->db->where('email', $email);
                    $respond2 = $this->db->get('student');
                    $user_S = $respond2->row(0);

                    $user_data = (object) array(
                                'email' => $user_U->email,
                                'type' => $user_U->type,
                                'fname' => $user_S->firstName,
                                'lname' => $user_S->lastName,
                                'batch' => $user_S->batch,
                                'faculty' => '',
                                'loggedin' => TRUE
                    );
                } elseif ($user_U->type == 'lecturer') {
                    $this->db->where('email', $email);
                    $respond2 = $this->db->get('lecturer');
                    $user_L = $respond2->row(0);

                    $user_data = (object) array(
                                'email' => $user_U->email,
                                'type' => $user_U->type,
                                'fname' => $user_L->firstName,
                                'lname' => $user_L->lastName,
                                'batch' => '',
                                'faculty' => $user_L->faculty,
                                'loggedin' => TRUE
                    );
                } elseif ($user_U->type == 'admin') {
                    $user_data = (object) array(
                                'email' => $user_U->email,
                                'type' => $user_U->type,
                                'fname' => "ADMIN",
                                'lname' => '',
                                'batch' => '',
                                'faculty' => '',
                                'loggedin' => TRUE
                    );
                }
                return $user_data;
            } else {

                return "1";
            }
        } else {
            return false;
        }
    }

}
