<?php

class employee_controller extends base_controller {

	
	protected static $globaldata = array();
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
	Display a new profile form
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
	Process new profile
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

		# if record found - update the record
		if($token)
		{
			

			DB::instance(DB_NAME)->update('employee', $_POST, 'WHERE user_id = '.$this->user->user_id);

		}
		#if no record found - insert 
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

		#after insert or update get the value to display
		if($profileData)
		{

			$this->template->content = View::instance("v_employee_display");
			
			$this->template->content->profileData = $profileData;

			$this->template->title   = "Display profile";
			
			echo $this->template;
		}
		else
		{
			die("Some problem with the data");
		}

	
	}
	
	
/*-------------------------------------------------------------------------------------------------
Display a new Profile edit form if not added before
-------------------------------------------------------------------------------------------------*/
public function display() {
	
	

	# Set up query
		$q = 'SELECT 
			    *
			FROM employee
			WHERE employee.user_id = '.$this->user->user_id;

		$profileData = DB::instance(DB_NAME)->select_rows($q);

		# when profile found display the values
		if($profileData)
		{

			$this->template->content = View::instance("v_employee_display");
			
			$this->template->content->profileData = $profileData;

			$this->template->title   = "Display profile";
			
			echo $this->template;
		}
		# when profile not found - shoe add window
		else
		{
			$this->template->content = View::instance("v_employee_profile");

			$this->template->title   = "Display profile";
			
			echo $this->template;
		}
	
}

/*-------------------------------------------------------------------------------------------------
Search for a suitable job
-------------------------------------------------------------------------------------------------*/
public function searchemployer() {


	$this->template->content = View::instance("v_employee_searchemployer");

	$this->template->title   = "Search Employer";
	
	echo $this->template;

	
}

/*-------------------------------------------------------------------------------------------------
Process the search results
-------------------------------------------------------------------------------------------------*/
public function p_searchemployer($passed_values) {

	$search_for = '';
	$value_found = False;
	# when passed APPLY/REMOVE function
	if($passed_values != 'none')
	{
		$p  = 'SELECT current_search.user_id,
	    			  current_search.skills
	        		FROM current_search
	        		WHERE user_id = '.$this->user->user_id;

	    $value = DB::instance(DB_NAME)->select_rows($p);


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
	#when passed ny the view
	else
	{

		$search_for = $_POST['skills'];
	}

	# get the Employeer with the jobs
	$q = "SELECT employer_job.id,
				 employer_job.job_title,
				 employer_job.location,
				 employer_job.modified,
				 employer_job.telecommute,
				 employer_job.skills,
				 employer.companyName,
				 employee_employer.job_id
        		FROM employer_job
        		INNER JOIN employer 
        		ON employer_job.user_id = employer.user_id
        		LEFT JOIN employee_employer
        		ON employer_job.user_id = employee_employer.employer_user_id
        		WHERE skills 
        		like '%".$search_for."%'";


	 $_POST['user_id'] = $this->user->user_id;

	 # insert in the table for retaining the windows
	 if($value_found == True)
	 {
	 	DB::instance(DB_NAME)->update('current_search',$_POST, 'WHERE user_id ='. $this->user->user_id);
	 }
	 else
	 {
	 	$user_ids = DB::instance(DB_NAME)->insert('current_search', $_POST);
	 }


	$listedJobData = DB::instance(DB_NAME)->select_rows($q);

	//When results found - display in a table
	if($listedJobData)
	{

		$this->template->content = View::instance("v_employee_searchresults");
			
		# Pass $posts array to the view
		$this->template->content->listedJobData = $listedJobData;
		#echo $mycount;

		$this->template->title   = "Posted Jobs";
		
		echo $this->template;
	}
	# no matching employer found
	else
	{
		die("No jobs posted. <a href='/users/profile/'>Home</a>");
	}

	
}

/*-------------------------------------------------------------------------------------------------
Apply for the selected job
-------------------------------------------------------------------------------------------------*/
public function apply($employer_job_id) {

	
	
	$_POST['employee_user_id']  = $this->user->user_id;
	$_POST['created']  = Time::now();
	$_POST['modified'] = Time::now();
	$_POST['employer_job_id']  = $employer_job_id;

	

	 $q = 'SELECT *
			FROM employer_job
			WHERE id = '.$employer_job_id;
         
       
               
        # Run query
     $post = DB::instance(DB_NAME)->select_row($q);

     if($post)
     {

     	$_POST['employer_user_id'] = $post['user_id'];
 	 }

 	 # Insert the new job    
    DB::instance(DB_NAME)->insert_row('employee_employer', $_POST);

    # redirect to search results
    Router::redirect('/employee/p_searchemployer/apply');        

}

/*-------------------------------------------------------------------------------------------------
Remove the applied job
-------------------------------------------------------------------------------------------------*/
public function remove($employer_job_id) {

	#Get the value before deleting 
	$p  = 'SELECT current_search.user_id
        		FROM current_search
        		WHERE user_id = '.$this->user->user_id;

    $value = DB::instance(DB_NAME)->select_rows($p);

	
	# Query to find whether the row is available in the table
	 $q = 'SELECT *
			FROM employee_employer
			WHERE employer_job_id = '.$employer_job_id.' and employee_user_id = '.$this->user->user_id;
         
       
               
        # Run query
     $post = DB::instance(DB_NAME)->select_row($q);

     if($post)
     {
 
 		 # Set up the where condition
	    $where_condition = 'WHERE job_id = '.$post['job_id'];
	    
	    # Run the delete
	    DB::instance(DB_NAME)->delete('employee_employer', $where_condition);
	}

	# redirect to search results
    Router::redirect('/employee/p_searchemployer/remove');        

}	
	
	
} # eoc
