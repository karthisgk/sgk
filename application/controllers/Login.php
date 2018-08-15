<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->url = base_url().'login/';
		$m = $this->router->fetch_method();
		$allow = array('login','logout', 'not_found_404','checklogin');
		if (!in_array($m , $allow)) {	
		    $this->_checkuservalue();
		}
	}

	public function login(){
		if(!isset($_SESSION['user'])){
			$this->load->view('front/login');
		}
		else
			redirect(base_url());
	}

	public function _checkuservalue(){ //check user logged out
		if(!isset($_SESSION['user']))
			redirect($this->url.'Login');
	}

	public function logout(){
		unset($_SESSION['user']);
		redirect($this->url);
	}

	public function checklogin(){

		$username=$this->input->post('email');
		$password=$this->input->post('password');

		if($username!="" && $password!="") {	
			$query="select * from user where uname='".$username."' and password='".$password."' ";
			$users=$this->Model->get($query);
			$rows=$this->Model->count($query);
			if($rows > 0){
				$this->session->set_userdata('user',$users[0]->id);
				$this->session->set_flashdata('flash', 'Logged in Successfully');
				$this->session->set_flashdata('flashtype', 'success');
				redirect(base_url());
			}else{	
				$this->session->set_flashdata('flash', 'Invalid Username/Password.');
				$this->session->set_flashdata('flashtype', 'error');
				$this->session->set_flashdata('front_username', $username);
				redirect($this->url);
			}
		}else{
			$this->session->set_flashdata('flash', 'Invalid Username/Password.');
			$this->session->set_flashdata('flashtype', 'error');
			$this->session->set_flashdata('front_username', $username);
			redirect($this->url);
		}
	}
}
