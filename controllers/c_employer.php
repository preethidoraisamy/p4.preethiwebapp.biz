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
	Display a edit profile
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
	Creates new or edits the profile - employer table
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

		#Success - Update
		if($token)
		{
			
				DB::instance(DB_NAME)->update('employer', $_POST, 'WHERE user_id = '.$this->user->user_id);

		}
		#No record insert
		else
		{
			$_POST['no_job_posted'] = 0;
			$user_ids = DB::instance(DB_NAME)->insert('employer', $_POST);

		}

		# Get the edited value
		$q = 
			'SELECT * 
			FROM employer
			WHERE user_id = '.$this->user->user_id;

		# If there was, this will return the token	   
		$profileData = DB::instance(DB_NAME)->select_rows($q);

		#Display the edited values
		if($profileData)
		{

			$this->template->content = View::instance("v_employer_display");
			
			
			$this->template->content->profileData = $profileData;

			$this->template->title   = "Display profile";
			
			echo $this->template;
		}
		else
		{
			die("Some problem with the data");
		}

		// $this->template->content = View::instance("v_employer_display");
			
		// $this->template->title   = "Display profile";
			
		// echo $this->template;

	
	}
	
	
/*-------------------------------------------------------------------------------------------------
To display the profile details - if not added will display the entry form
-------------------------------------------------------------------------------------------------*/
public function display() {
	
	

	# Set up query
		$q = 'SELECT 
			    *
			FROM employer
			WHERE employer.user_id = '.$this->user->user_id;

		# Run query	
		$profileData = DB::instance(DB_NAME)->select_rows($q);

		# if already found in the database - just display with the EDIT option
		if($profileData)
		{

			$this->template->content = View::instance("v_employer_display");
			
			$this->template->content->profileData = $profileData;

			$this->template->title   = "Display profile";
			
			echo $this->template;
		}
		# if not found in the database - display the entry form
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

	$user_ids = DB::instance(DB_NAME)->insert('employer_job', $_POST);

	# after adding a job go to list jobs
	Router::redirect('/employer/listMyJob');
	
}

/*-------------------------------------------------------------------------------------------------
Display all the posted jobs
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

		#Run query
		$listedJobData = DB::instance(DB_NAME)->select_rows($q);

		# when 1 or more job posted
		if($listedJobData)
		{

			$this->template->content = View::instance("v_employer_listMyJob");
			
			$this->template->content->listedJobData = $listedJobData;

			$this->template->title   = "Posted Jobs";
			
			echo $this->template;
		}
		#when no jobs are posted by the employer
		else
		{
			die("No jobs posted, <a href='/users/profile/'>Home</a>");
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

/*-------------------------------------------------------------------------------------------------
Display the details of the selected job
-------------------------------------------------------------------------------------------------*/

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

/*-------------------------------------------------------------------------------------------------
Edit the selected job
-------------------------------------------------------------------------------------------------*/
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

/*-------------------------------------------------------------------------------------------------
Display the details of the selected job
-------------------------------------------------------------------------------------------------*/
    public function p_editdetails($post_id) {

       
        $_POST['user_id']  = $this->user->user_id;
		$_POST['modified'] = Time::now();
		

		DB::instance(DB_NAME)->update('employer_job', $_POST, 'WHERE id = '.$post_id);

		#Display the page after update
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

/*-------------------------------------------------------------------------------------------------
Display the view to search employees
-------------------------------------------------------------------------------------------------*/
    public function searchemployee() {

       
        $this->template->content = View::instance("v_employer_searchemployee");
               
       
        $this->template->title   ="Search for Candidates";
        
      
        echo $this->template;

    }

/*-------------------------------------------------------------------------------------------------
Display the suitable Candidates
-------------------------------------------------------------------------------------------------*/
     public function p_searchemployee($passed_value) {

     	$search_for = '';
     	$value_found = False;

     	$p  = 'SELECT current_search.user_id,
	    			  current_search.skills
	        		FROM current_search
	        		WHERE user_id = '.$this->user->user_id;

		$value = DB::instance(DB_NAME)->select_rows($p);

     	#To retain the search results - after the work done
     	if($passed_value != 'none')
     	{     		

		    # searches in the table to find the last search
		    if($value)
		    {
		    	$search_for = $value[0]['skills'];
		    	$value_found = True;
		    }
		    else
		    {
		    	$search_for = 'a';
		    }
		    $_POST['skills'] = $search_for;

		}
		# from user
		else
		{
			# when there already an entry
			if($value)
		    {
		    	$value_found = True;
		    }
		    
			$search_for = $_POST['skills'];
		}

		#Perform the search to display the results
     	$q = "SELECT *
        		FROM employee
        		WHERE skills 
        		like '%".$search_for."%'";

        $_POST['user_id'] = $this->user->user_id;

        if($value_found == True)
		 {
		 	DB::instance(DB_NAME)->update('current_search',$_POST, 'WHERE user_id ='. $this->user->user_id);
		 }
		 else
		 {
		 	$user_ids = DB::instance(DB_NAME)->insert('current_search', $_POST);
		 }

         $listedJobData = DB::instance(DB_NAME)->select_rows($q);

         # when search results found
		if($listedJobData)
		{

			$this->template->content = View::instance("v_employer_searchresults");
			
			$this->template->content->listedJobData = $listedJobData;

			$this->template->title   = "Posted Jobs";
			
			echo $this->template;
		}
		#No results returned
		else
		{
			die("No Candidates matching the required skills.<a href='/users/profile/'>Home</a>");
		}
	}

	/*-------------------------------------------------------------------------------------------------
	Display the selected candidate
	-------------------------------------------------------------------------------------------------*/
	public function candidatedetails($post_id) {

       
        
        # Set up query to get all users
        $q = 'SELECT *
        		FROM employee 
        		where id = '.$post_id;
         
        $profileData = DB::instance(DB_NAME)->select_rows($q);

		if($profileData)
		{
			$profileData['login'] = 2;

			$this->template->content = View::instance("v_employee_display");
				
			# Pass array to the view
			$this->template->content->profileData = $profileData;

			$this->template->title   = "Display profile";
			
			echo $this->template;
		}


    }

    /*-------------------------------------------------------------------------------------------------
	Display the applied candidates details witht  email and phone #
	-------------------------------------------------------------------------------------------------*/
	public function appliedjob() {

       
        
        # Set up query to get all users
        $q = 'SELECT employee_employer.employer_user_id,
        			 employee_employer.employee_user_id,
        			 employee_employer.employer_job_id,
        			 employee.fullname,
        			 employee.skills,
        			 employee.phone,
        			 employee.pemail,
        			 employer_job.job_title,
        			 employee.experience,
        			 employee_employer.created
        		FROM employee_employer
        		INNER JOIN employee
        		ON employee_employer.employee_user_id = employee.user_id
        		INNER JOIN employer_job
        		ON employee_employer.employer_user_id = employer_job.user_id
        		where employer_user_id = '.$this->user->user_id;

       	 $listedJobData = DB::instance(DB_NAME)->select_rows($q);

       	 # if any candidates applied
		if($listedJobData)
		{

			$this->template->content = View::instance("v_employer_jobsapplied");
			
			# Pass $posts array to the view
			$this->template->content->listedJobData = $listedJobData;

			$this->template->title   = "Applied Jobs";
			
			echo $this->template;
		}
		# no jobs are Candidates applied
		else
		{
			die("No Candidates applied, if you have posted any.<a href='/users/profile/'>Home</a>");
		}
         
    }

/*-------------------------------------------------------------------------------------------------
	delete the posted jobs
	-------------------------------------------------------------------------------------------------*/
    public function delete($delete_job_id)
    {

    	$where_condition = 'WHERE id = '.$delete_job_id;
	    
	 //    # Run the delete
	    DB::instance(DB_NAME)->delete('employer_job', $where_condition);

	    Router::redirect('/employer/listMyJob');
    }	
	
} # eoc
