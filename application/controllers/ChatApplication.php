<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatApplication extends CI_Controller {
	function __construct(){
		parent::__construct();
		date_default_timezone_set('America/Sao_Paulo'); // get UTF system
	}
	public function index()
	{
		if(empty($this->session->user)){
			redirect('signin','refresh');
		}
		$this->load->view('chat');
	}

	public function signin(){
		$this->load->view('auth/signin');
	}

	public function signin_action(){

		$signin = json_decode(file_get_contents("php://input"));
		$username = trim($signin->username);
		$password = trim($signin->password);

		$return = null;

		$this->db->where('username', $username);
		$this->db->where('password', sha1($password));
		$select = $this->db->get('users');

		if($select->num_rows() > 0){
		   foreach ($select->result() as $user) {
		   	 $this->session->set_userdata('user', $user->uid);
		   	 $return = array('auth' => true, 'user' => $user->uid);
		   }
		}else{
			$return = array('auth' => false);
		}

		echo json_encode($return);

	}

	public function signup_action(){

		$signup = json_decode(file_get_contents("php://input"));
		$nickname = trim($signup->nickname);
		$username = trim($signup->username);
		$password = trim($signup->password);

		$return = null;

		$insert = array(
			'nickname' => $nickname,
			'username' => $username,
			'password' => sha1($password),
			'date'	   => date('Y-m-d H:i:s'),
		);
		$select = $this->db->query("SELECT * FROM `users` WHERE `username`='$username' ");

		if($select->num_rows() < 1 ){
			$query = $this->db->insert('users', $insert);

			if($query){
				$return = array('signup' => true);
			}else{
				$return = array('signup' => false);
			}
		}else{
		   $return = array('signup' => false);
		}

		echo json_encode($return);

	}

	public function logout(){
		$this->session->unset_userdata('user');
		redirect('signin','refresh');
	}

	public function usersOnline(){

		$uid = $this->session->user;

		$post  = json_decode(file_get_contents("php://input"));
		$users = array_unique($post->users);
		
		$this->db->where_in('uid', $users);
		$query = $this->db->get('users');

		$arr = array();

		foreach ($query->result() as $request) {

		 if($uid <> $request->uid):
		 	$picture = ($request->picture != null) ? $request->picture : 'avatar.jpg';
			$arr[] = array(
				'uid' => $request->uid,
				'nickname' => $request->nickname,
				'picture' => $picture,
				'status' => 'connected'
			);

		  endif;
		}

		echo json_encode($arr);


	}

	public function getMessages(){
		$post = json_decode(file_get_contents("php://input"));

		$uid  = $this->session->user;
		$id   = $post->user;

		$query = $this->db->query("SELECT * FROM `messages` 
		WHERE (`sender` = '$uid' AND `receiver` = '$id') OR (`sender` = '$id' AND `receiver` = '$uid') ORDER by `date` ASC ");

		$allMessages = array();

		if($query->num_rows() > 0){

			foreach ($query->result() as $msg) {
				$user_id  = isset($msg->sender) ? $msg->sender : $msg->receiver;

				$this->db->where('uid', $user_id);
				$users = $this->db->get('users')->row();

				$position = ($users->uid == $uid) ? 'base-sender' : 'base-receiver';

				$allMessages[] = array(
					'message_id' => $msg->id,
					'uid'        => $users->uid,
					'nickname'   => $users->nickname,
					'picture'    => $users->picture,
					'message'    => $msg->message,
					'date'	     => $msg->date,
					'status'	 => $msg->status,
					'position'   => $position
				);

			}

		}

		echo json_encode(array('chatID' => $id,'messages' => $allMessages));


	}

	public function deleteMessage(){
		$post = json_decode(file_get_contents("php://input"));
		$type		= $post->type;
		$message_id	= $post->message_id;

		$return = array();

		if($type == 'single'){
			$this->db->where('id', $message_id);
			$delete = $this->db->delete('messages');
			$return[] = array('deleteSingle' => true);
		}

		echo json_encode($return);

	}

	public function updateProfile(){

		$nickname = $_POST['InputNickname'];
		$username = $_POST['InputUsername'];
		$password = isset($_POST['InputPassword']) ? $_POST['InputPassword'] : '';

		if($password != ''){
			$this->db->set('password', sha1($password));
		}
		if(!empty($_FILES)){

			$ext = strtolower(substr($_FILES['InputPicture']['name'],-4));
	        $picture_hash = sha1(time()) . $ext; 
	        $dir = 'assets/uploads/';
	        
	        if(move_uploaded_file($_FILES['InputPicture']['tmp_name'], $dir.$picture_hash)){
	        	$this->db->set('picture', $picture_hash);
	        }
		}

		$this->db->set('nickname', $nickname);

		$this->db->where("username", $username);
		$check = $this->db->update('users');

		if($check){
			$this->db->where('username', $username);
			$user = $this->db->get('users')->row();
			
			echo json_encode(array('update' => true, 'uid' => $user->uid));
		}else{
			echo json_encode(array('update' => false));
		}


	}

}
