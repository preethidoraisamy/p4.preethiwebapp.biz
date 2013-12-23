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
		
		$this->template->content = View::instance("v_employee_editprofile");

		$this->template->title   = "Employee profile";

		$q = 
			'SELECT * 
			FROM employee
			WHERE user_id = '.$this->user->user_id;

		$post = DB::instance(DB_NAME)->select_row($q);

        # Pass data to the view
        $this->template->content->post = $post;
		
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
			

			DB::instance(DB_NAME)->update('employee', $_POST, 'WHERE user_id = '.$this->user->user_id);

		}
		else
		{

			$user_ids = DB::instance(DB_NAME)->insert('employee', $_POST);

		}

		$q = 
			'SELECT * 
			FROM employee
			WHERE user_id = '.$this->user->user_id;

		# If there was, this will return the token	   
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
			die("Some problem with the data");
		}

	
	}
	
	
/*-------------------------------------------------------------------------------------------------
Display a new post form
-------------------------------------------------------------------------------------------------*/
public function display() {
	
	

	# Set up query
		$q = 'SELECT 
			    *
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

public function searchemployer() {
	

	$this->template->content = View::instance("v_employee_searchemployer");

	$this->template->title   = "Search Employer";
	
	echo $this->template;

	
}

public function p_searchemployer() {
	
	$q = "SELECT employer_job.id,
				 employer_job.job_title,
				 employer_job.location,
				 employer_job.modified,
				 employer_job.telecommute,
				 employer_job.skills,
				 employer.companyName
        		FROM employer_job
        		INNER JOIN employer 
			    ON employer_job.user_id = employer.user_id
        		WHERE skills 
        		like '%".$_POST['skills']."%'";

 

        $listedJobData = DB::instance(DB_NAME)->select_rows($q);

		if($listedJobData)
		{

			$this->template->content = View::instance("v_employee_searchresults");
			
			# Run query	
			

			# Variable to hold the number of posts 
			#$mycount = count($posts);
			
			# Pass $posts array to the view
			$this->template->content->listedJobData = $listedJobData;
			#echo $mycount;

			$this->template->title   = "Posted Jobs";
			
			echo $this->template;
		}
		else
		{
			die("No jobs posted");
		}

	
}	
	
	
} # eoc
