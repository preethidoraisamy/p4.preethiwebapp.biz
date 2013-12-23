<?php

class employer_controller extends base_controller {
	
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
		
		$this->template->content = View::instance("v_employer_editprofile");

		$this->template->title   = "Employer profile";

		$q = 
			'SELECT * 
			FROM employer
			WHERE user_id = '.$this->user->user_id;

		$post = DB::instance(DB_NAME)->select_row($q);

        # Pass data to the view
        $this->template->content->post = $post;

       // echo $post['zipcode'];
		
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
			FROM employer
			WHERE user_id = '.$this->user->user_id;

		# If there was, this will return the token	   
		$token = DB::instance(DB_NAME)->select_field($q);

		
		if($token)
		{
			
				DB::instance(DB_NAME)->update('employer', $_POST, 'WHERE user_id = '.$this->user->user_id);

		}
		else
		{
			$_POST['no_job_posted'] = 0;
			$user_ids = DB::instance(DB_NAME)->insert('employer', $_POST);

		}

		$q = 
			'SELECT * 
			FROM employer
			WHERE user_id = '.$this->user->user_id;

		# If there was, this will return the token	   
		$profileData = DB::instance(DB_NAME)->select_rows($q);

		if($profileData)
		{

			$this->template->content = View::instance("v_employer_display");
			
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

		$this->template->content = View::instance("v_employer_display");
			
		$this->template->title   = "Display profile";
			
		echo $this->template;

	
	}
	
	
/*-------------------------------------------------------------------------------------------------
Display a new post form
-------------------------------------------------------------------------------------------------*/
public function display() {
	
	

	# Set up query
		$q = 'SELECT 
			    *
			FROM employer
			WHERE employer.user_id = '.$this->user->user_id;

		$profileData = DB::instance(DB_NAME)->select_rows($q);

		if($profileData)
		{

			$this->template->content = View::instance("v_employer_display");
			
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
			$this->template->content = View::instance("v_employer_profile");

			$this->template->title   = "Display profile";
			
			echo $this->template;
		}
	
}	


/*-------------------------------------------------------------------------------------------------
Display a form to post a new job
-------------------------------------------------------------------------------------------------*/
public function postJob() {
		

		$this->template->content = View::instance("v_employer_postJob");

		$this->template->title   = "Post job";
		
		echo $this->template;
	
}	

/*-------------------------------------------------------------------------------------------------
Display a form to post a new job
-------------------------------------------------------------------------------------------------*/
public function p_postJob() {
		
	$_POST['user_id']  = $this->user->user_id;
	$_POST['created']  = Time::now();
	$_POST['modified'] = Time::now();

	$q = 
		'SELECT user_id 
		FROM employer_job
		WHERE user_id = '.$this->user->user_id;

	# If there was, this will return the token	   
	$token = DB::instance(DB_NAME)->select_field($q);

	echo $token;

	if($token)
	{
		
			DB::instance(DB_NAME)->update('employer_job', $_POST, 'WHERE user_id = '.$this->user->user_id);

	}
	else
	{
		$user_ids = DB::instance(DB_NAME)->insert('employer_job', $_POST);

	}
	
}

/*-------------------------------------------------------------------------------------------------
Display a new post form
-------------------------------------------------------------------------------------------------*/
public function listMyJob() {
	
	

	# Set up query
		$q = 'SELECT
				employer_job.id, 
			    employer_job.job_title,
			    employer_job.modified,
			    employer_job.location,
			    employer_job.skills
			    FROM employer_job
			WHERE employer_job.user_id = '.$this->user->user_id;

		$listedJobData = DB::instance(DB_NAME)->select_rows($q);

		if($listedJobData)
		{

			$this->template->content = View::instance("v_employer_listMyJob");
			
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

/*-------------------------------------------------------------------------------------------------
Display the selected job
-------------------------------------------------------------------------------------------------*/
public function viewJob($post_id) {

       
        
        # Set up query to get all users
        $q = 'SELECT employer_job.id,
        			employer_job.job_title,
        			employer_job.position_duties 
        		FROM employer_job 
        		where id = '.$post_id;
         
         # Set up view
        $this->template->content = View::instance("v_employer_viewJob");

        # Run query
        $post = DB::instance(DB_NAME)->select_row($q);


        # Pass data to the view
        $this->template->content->post = $post;

        $this->template->title   = $post['job_title'];
        
        # Render view
        echo $this->template;


    }


public function p_viewJob($post_id) {

       
        

    }


    public function details($post_id) {

       
        
        # Set up query to get all users
        $q = 'SELECT employer_job.id,
        			employer_job.job_title,
        			employer_job.position_duties,
        			employer_job.location,
        			employer_job.requirement,
        			employer_job.responsibilities,
        			employer_job.telecommute,
        			employer_job.payrate,
        			employer_job.position_id,
        			employer_job.tax_term,
        			employer_job.travel_requirement,
        			employer_job.skills,
        			employer_job.work_authorization 
        		FROM employer_job 
        		where id = '.$post_id;
         
         # Set up view
        $this->template->content = View::instance("v_employer_details");
               
        # Run query
        $post = DB::instance(DB_NAME)->select_row($q);


        # Pass data to the view
        $this->template->content->post = $post;

        $this->template->title   = $post['job_title'];
        
        # Render view
        echo $this->template;


    }	

    public function editdetails($post_id) {

       
        
        # Set up query to get all users
        $q = 'SELECT employer_job.id,
        			employer_job.job_title,
        			employer_job.position_duties,
        			employer_job.location,
        			employer_job.requirement,
        			employer_job.responsibilities,
        			employer_job.telecommute,
        			employer_job.payrate,
        			employer_job.position_id,
        			employer_job.tax_term,
        			employer_job.travel_requirement,
        			employer_job.skills,
        			employer_job.work_authorization 
        		FROM employer_job 
        		where id = '.$post_id;
         
         # Set up view
        $this->template->content = View::instance("v_employer_editdetails");
               
        # Run query
        $post = DB::instance(DB_NAME)->select_row($q);


        # Pass data to the view
        $this->template->content->post = $post;

        $this->template->title   = $post['job_title'];
        
        # Render view
        echo $this->template;


    }

    public function p_editdetails($post_id) {

       
        $_POST['user_id']  = $this->user->user_id;
		$_POST['modified'] = Time::now();
		

		DB::instance(DB_NAME)->update('employer_job', $_POST, 'WHERE id = '.$post_id);

		//Display the page after update
		# Set up query to get all users
        $q = 'SELECT employer_job.id,
        			employer_job.job_title,
        			employer_job.position_duties,
        			employer_job.location,
        			employer_job.requirement,
        			employer_job.responsibilities,
        			employer_job.telecommute,
        			employer_job.payrate,
        			employer_job.position_id,
        			employer_job.tax_term,
        			employer_job.travel_requirement,
        			employer_job.skills,
        			employer_job.work_authorization 
        		FROM employer_job 
        		where id = '.$post_id;
         
         # Set up view
        $this->template->content = View::instance("v_employer_details");
               
        # Run query
        $post = DB::instance(DB_NAME)->select_row($q);


        # Pass data to the view
        $this->template->content->post = $post;

        $this->template->title   = $post['job_title'];
        
        # Render view
        echo $this->template;

    }	

    public function searchemployee() {

       
        $this->template->content = View::instance("v_employer_searchemployee");
               
       
        $this->template->title   ="Search for Candidates";
        
      
        echo $this->template;

    }

     public function p_searchemployee() {

     	$q = "SELECT *
        		FROM employee
        		WHERE skills 
        		like '%".$_POST['skills']."%'";

 
        $listedJobData = DB::instance(DB_NAME)->select_rows($q);

		if($listedJobData)
		{

			$this->template->content = View::instance("v_employer_searchresults");
			
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

	/*-------------------------------------------------------------------------------------------------
	Display a new post form
	-------------------------------------------------------------------------------------------------*/
	public function candidatedetails($post_id) {

       
        
        # Set up query to get all users
        $q = 'SELECT *
        		FROM employee 
        		where id = '.$post_id;
         
        $profileData = DB::instance(DB_NAME)->select_rows($q);

		if($profileData)
		{
			#$profileData['login'] = 2;

			$this->template->content = View::instance("v_employee_display");
				
			# Pass $posts array to the view
			$this->template->content->profileData = $profileData;

			$this->template->title   = "Display profile";
			
			echo $this->template;
		}


    }	
	
} # eoc
