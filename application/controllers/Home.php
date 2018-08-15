<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function _remap($id, $name) {
        $this->redirect = base_url();
        $this->login_url = base_url().'login/';

        if(!isset($_SESSION['user']))
        	redirect($this->login_url);

        if($id == 'index')
        	$this->index();
    }

	public function index(){
		echo $this->sg->app(array());
	}
}
