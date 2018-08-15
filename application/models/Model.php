<?php

class Model extends CI_Model
{
  public function __construct()
    {
        parent::__construct();
    }
	
	public function add($table,$data)
	{
	   $this->db->insert($table, $data); 
	   return $this->db->insert_id();
    
	}

	public function getsettings(){
		
		$query = $this->get_one("id","1","settings");
		return $query;

	}


	public function get($qry)
	{
	  $query=$this->db->query($qry);
	  if($query->num_rows()>0)
	    return $query->result();
	}
	
	public function count($qry)
	{
	  $query=$this->db->query($qry);
	  return $query->num_rows();
	}

	public function get_one($col_name, $col_data, $table){
		$this->db->where($col_name, $col_data);
		$query = $this->db->get($table);
	    if($query->num_rows()>0){
		   $data =  $query->result();
		   return $data[0];
	    }
	}


	public function remove($tbl,$data)
	{
	   $this->db->delete($tbl, $data);
	   
	}


	public function update($tbl,$set,$where)
	{
	   $this->db->update($tbl, $set,$where);
	   
	}



	public function dbtruncate($tbl)
	{
	 $this->db->truncate($tbl); 
	}


	public function getip(){
		if (isset($_SERVER)){
		    if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
		        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		        if(strpos($ip,",")){
		            $exp_ip = explode(",",$ip);
		            $ip = $exp_ip[0];
		        }
		    }else if(isset($_SERVER["HTTP_CLIENT_IP"])){
		        $ip = $_SERVER["HTTP_CLIENT_IP"];
		    }else{
		        $ip = $_SERVER["REMOTE_ADDR"];
		    }
		}else{
		    if(getenv('HTTP_X_FORWARDED_FOR')){
		        $ip = getenv('HTTP_X_FORWARDED_FOR');
		        if(strpos($ip,",")){
		            $exp_ip=explode(",",$ip);
		            $ip = $exp_ip[0];
		        }
		    }else if(getenv('HTTP_CLIENT_IP')){
		        $ip = getenv('HTTP_CLIENT_IP');
		    }else{
		        $ip = getenv('REMOTE_ADDR');
		    }
		}
		return $ip;
	}

	public function unique_id(){
     	return base_convert(microtime(false), 10, 36);
    }

    public function Arraymultisort($data, $options){

    	$element = $options['element'];
		if($data != ''){

			$index = array();
			foreach ($data as $key => $value) {
				$value = $this->json_toArray($value);
				array_push($index, $value[$element]);
			}

			array_multisort($index, $options['sort_by'], $data);
			return $data;
		}else
			return '';

	}


	public function json_toArray($data){

		$array = array();
		if($data != ''){
			foreach ($data as $key => $value) {
				$array[$key] = $value;
			}
			return $array;
		}else 
			return '';
	}

	public function _en_urlid($data,$en_de = 0){ // $en_de = 0  for encode 1 for decode
		$salt = 10000;
		if($en_de == 0) //encode
			return base_convert($data*$salt, 10, 36);
		else //decode
			return base_convert($data, 36, 10) / $salt;
	}

	public function timeMoment($timestamp){
		$datetime1=new DateTime("now");
    	$datetime2=date_create($timestamp);
    	$diff=date_diff($datetime1, $datetime2);
    	$timemsg='';
    	if($diff->y > 0){
        	$timemsg = $diff->y .' Year'. ($diff->y > 1?"s":'');

    	}
    	else if($diff->m > 0){
     		$timemsg = $diff->m .' Month'. ($diff->m > 1?"s":'');
    	}
    	else if($diff->d > 0){
     		$timemsg = $diff->d .' Day'. ($diff->d > 1?"s":'');
    	}
    	else if($diff->h > 0){
     		$timemsg = $diff->h .' Hour'.($diff->h > 1 ? "s":'');
    	}
    	else if($diff->i > 0){
     		$timemsg = $diff->i .' Minute'. ($diff->i > 1?"s":'');
    	}
    	else if($diff->s > 0){
     		$timemsg = $diff->s .' Second'. ($diff->s > 1?"s":'');
    	}

    	if($timestamp < date('Y-m-d H:i:s'))
			$timemsg = $timemsg.' Ago';
		elseif($timestamp == date('Y-m-d H:i:s'))
			$timemsg = 'Just Now';
		else
			$timemsg = $timemsg.' Left';		
		return $timemsg;
	}

	public function timeAgo($timestamp){
    	return $this->timeMoment($timestamp);
	}

	public function timeLeft($timestamp){
    	return $this->timeMoment($timestamp);
	}

	public function short_string($string,$length){
		$string = strlen($string) > $length ? substr($string, 0,$length).'...' : $string;
		return $string;
	}

	public function created_atDate(){
    	return date('Y-m-d H:i:s');
    }

    public function moddate(){
    	return date("Y-m-d H:i:s", strtotime(date('Y-m-d H:i:s'))+(30*60)); //current datetime + plus 30 mins
    }

	public function app($data, $cont_name = 'index') { //content name

		$data['short'] = function($text, $len){
			return $this->short_string($text, $len);
		};
		$data['compare'] = function($date){
			return $this->timeMoment($timestamp);
		};
		$data['get_unique'] = function(){
			return $this->unique_id();
		};
		$data['encode'] = function($id, $opt){
			return $this->_en_urlid($id, $opt);
		};
		$data['main'] = $this->load->view('front/'.$cont_name , $data, true);
		return $this->load->view('front/app', $data, true);

	}
}

?>