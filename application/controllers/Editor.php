<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor extends CI_Controller {


    public function __construct(){
        parent::__construct();
    }

	public function index(){
        $data = $this->Model->get("select * from sample");
        $id = $this->session->userdata('cur');
        $cur = $this->Model->get('select * from html where id="'.$id.'"');
        $d = array('data' => $data);
        $d['cur_name'] = !empty ($cur) ? $cur[0]->name : '';
        $d['cur_content'] = !empty ($cur) ? $cur[0]->content : '';
        $this->load->view('front/editor', $d);
    }

    public function upd(){
        $name = $this->input->post('inp_name');
        $this->Model->update('sample', array('name' => $name), array('id' => '1'));
        redirect(base_url());
    }

    public function save(){
        $up = array(
            'name'      => $this->input->post('file_name'),
            'content'   => $this->input->post('file_content')
        );
        $id = $this->session->userdata('cur');
        $d = $this->Model->get('select * from html where id="'.$id.'"');
        if(!empty ($d)){
            $up['name'] = isset($d[0]->name) ? $d[0]->name : '';
            $this->Model->update('html', $up, array('id' => $id));
        }else{
            $id = $this->Model->add('html', $up);
            $this->session->set_userdata('cur', $id);
        }
    }

    public function get_files(){
        $data = $this->Model->get("select * from html");
        echo json_encode($data);
    }

    public function get_single($id){
        $data = $this->Model->get('select * from html where id="'.$id.'"');
        if(!empty ($data)){
            $this->session->set_userdata('cur', $data[0]->id);
            echo json_encode($data[0]);
        }
        else
            echo '{}';
    }

    public function set_current(){
        $this->session->set_userdata('cur', $this->input->post('id'));
    }

    public function new_action(){
        $this->session->unset_userdata('cur');
    }
}
?>