<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        $this->load->library('form_validation');
        $username = $this->input->post('username');
    }



    public function index()
    {
        if($this->session->userdata('username') && $this->session->userdata('id_level') == 1){
            redirect('Dashboard');
        } elseif ($this->session->userdata('username') && $this->session->userdata('id_level') == 2){
            redirect('Userpage');
        } elseif ($this->session->userdata('username') && $this->session->userdata('id_level') == 3){
            redirect('Guestpage');
        } elseif ($this->session->userdata('username') && $this->session->userdata('id_level') == 4){
            redirect('Kepala');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            view('auth', $data);
        } else {
            // validasinya success
            $this->_login();
        }
    }


    


    private function _login()
    {


        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

        // jika usernya ada
        if ($user) {
                // cek password
                // if (password_verify($password, $user['password'])) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'id_opd' => $user['id_opd'],
                        'nama' => $user['nama'],
                        'id_level' => $user['id_level']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_level'] == 1) {
                        helper_log("login", "Logged in");
                        redirect('Dashboard');
                    } elseif ($user['id_level'] == 2) {
                        helper_log("login", "Logged in");
                        redirect('Userpage');  
                    } elseif ($user['id_level'] == 3) {
                        helper_log("login", "Logged in");
                        redirect('Guestpage');  
                    } elseif ($user['id_level'] == 4) {
                        helper_log("login", "Logged in");
                        redirect('Kepala');  
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                } 
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        helper_log("logout", "Logged Out");
        // $this->session->unset_userdata('username');
        // $this->session->unset_userdata('id_level');
        $this->session->sess_destroy();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

    public function forgotPassword()
    {
        $data['title'] = 'Forgot Password';
        view('forgotpassword', $data);


    }


    public function resetPassword()
    {
        // $data['title'] = 'Reset Password';
        $username = $this->input->post('username');

        $user = $this->db->get_where('tb_user', ['username' => $username]);
        if ($user->num_rows() > 0) {
            $data['user'] = $user->result();
            view('resetpassword', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
            redirect('auth/forgotPassword');
        }
    }


    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $data = array(
            'username' => $username,
            'password' => $password
        );

        echo ($data);

        $this->db->where('username', $username)->update('tb_user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success. Please login with your new password</div>');
        redirect('auth');

    }
}
