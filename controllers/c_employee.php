<?php

class employee_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		
		# Make sure the base controller construct gets called
		parent::__construct();
		
		# Only let logged in users access the methods in this controller
		if(!$this->user) {
			die("Members only");
		}
		
	} 
	
	 
	/*-------------------------------------------------------------------------------------------------
	Display a new post form
	-------------------------------------------------------------------------------------------------*/
	public function profile() {
		
		$this->template->content = View::instance("v_employee_profile");

		$this->template->title   = "Employee profile";
		
		echo $this->template;
		
	}	
	
	
	/*-------------------------------------------------------------------------------------------------
	Process new posts
	-------------------------------------------------------------------------------------------------*/
	public function p_profile() {
		
		$_POST['user_id']  = $this->user->user_id;
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();

		$q = 
			'SELECT user_id 
			FROM employee
			WHERE user_id = '.$this->user->user_id;

		# If there was, this will return the token	   
		$token = DB::instance(DB_NAME)->select_field($q);

		if($token)
		{
			if($_FILES['data']['size'] > 0)
			{
				$fileName = $_FILES['data']['name'];
				$tmpName  = $_FILES['data']['tmp_name'];
				$fileSize = $_FILES['data']['size'];
				$fileType = $_FILES['data']['type'];

				$fp      = fopen($tmpName, 'r');
				$content = fread($fp, filesize($tmpName));
				$content = addslashes($content);
				fclose($fp);

				$data    = Array('data' => $content, 'user_id' => $_POST['user_id'], 'filename' => $tmpName, 'filesize' => $fileSize, 'filetype' => $fileType, 'description' =>$_POST['description'], 'created' => $_POST['created'], 'modified'=> $_POST['modified'], 'skills'=>$_POST['skills']);
				

				DB::instance(DB_NAME)->update('employee', $data, 'WHERE user_id = '.$this->user->user_id);


			}
		}
		else
		{

			if($_FILES['data']['size'] > 0)
			{
				$fileName = $_FILES['data']['name'];
				$tmpName  = $_FILES['data']['tmp_name'];
				$fileSize = $_FILES['data']['size'];
				$fileType = $_FILES['data']['type'];

				$fp      = fopen($tmpName, 'r');
				$content = fread($fp, filesize($tmpName));
				$content = addslashes($content);
				fclose($fp);

				$data    = Array('data' => $content, 'user_id' => $_POST['user_id'], 'filename' => $tmpName, 'filesize' => $fileSize, 'filetype' => $fileType, 'description' =>$_POST['description'], 'created' => $_POST['created'], 'modified'=> $_POST['modified'], 'skills'=>$_POST['skills']);
				$user_ids = DB::instance(DB_NAME)->insert('employee', $data);


			}
		}

	
	}
	
	
/*-------------------------------------------------------------------------------------------------
Display a new post form
-------------------------------------------------------------------------------------------------*/
public function display() {
	
	

	# Set up query
		$q = 'SELECT 
			    employee.description,
			    employee.data,
			    employee.filename,
			    employee.skills
			FROM employee
			WHERE employee.user_id = '.$this->user->user_id;

		$profileData = DB::instance(DB_NAME)->select_rows($q);

		if($profileData)
		{

			$this->template->content = View::instance("v_employee_display");
			
			# Run query	
			

			# Variable to hold the number of posts 
			#$mycount = count($posts);
			
			# Pass $posts array to the view
			$this->template->content->profileData = $profileData;
			#echo $mycount;

			$this->template->title   = "Display profile";
			
			echo $this->template;
		}
		else
		{
			$this->template->content = View::instance("v_employee_profile");

			$this->template->title   = "Display profile";
			
			echo $this->template;
		}
	
}	
	
	
} # eoc
