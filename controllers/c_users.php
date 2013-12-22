<?php
class users_controller extends base_controller {

	

	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
    public function __construct() {
    
    	# Make sure the base controller construct gets called
		parent::__construct();
    } 


	/*-------------------------------------------------------------------------------------------------
	Display a form so users can sign up	
	-------------------------------------------------------------------------------------------------*/
    public function signup() {
       
       # Set up the view
       $this->template->content = View::instance('v_users_signup');
       $this->template->title   = "Sign Up";
       
       # Render the view
       echo $this->template;
       
    }
    
    
    /*-------------------------------------------------------------------------------------------------
    Process the sign up form
    -------------------------------------------------------------------------------------------------*/
    public function p_signup() {

    	$login_array = [
	    "employee" => 1,
	    "employer" => 2,
		];

    	#To check whether the email is already registered
    	$q = 
			'SELECT token 
			FROM users
			WHERE email = "'.$_POST['email'].'"';		
		
		# Valid the email address
		if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $_POST['email']))
		{
			die('Not a Valid email address. <a href="/users/signup">Sign up</a>');
		}
		else
		{
			# If there was, this will return the token	   
			$token = DB::instance(DB_NAME)->select_field($q);


			
			# Success
			if($token) {
			
				# Display to user that we already have this user registered
				die('Already user registered. <a href="/users/login">Log in</a>');
			}
			# Fail
			else {			
		    	    
			    # Mark the time
			    $_POST['created']  = Time::now();
			    
			    # Hash password
			    $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
			    
			    # Create a hashed token
			    $_POST['token']    = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

			   // echo $_POST['logintype'];

			    $_POST['login_type'] =  $login_array[$_POST['login_type']];

			    echo $_POST['login_type'];
		    
			    # Insert the new user    
			    DB::instance(DB_NAME)->insert_row('users', $_POST);
	 
			    # Send them to the login page
			    Router::redirect('/users/login');
		}
	}
	    
    }

    
	/*-------------------------------------------------------------------------------------------------
	Display a form so users can login
	-------------------------------------------------------------------------------------------------*/
    public function login() {
    	# Display the Login page
    
    	$this->template->content = View::instance('v_users_login');  
    	$this->template->title   = "Login";  	
    	echo $this->template;   
       
    }
    
    
    /*-------------------------------------------------------------------------------------------------
    Process the login form
    -------------------------------------------------------------------------------------------------*/
    public function p_login() {
	   	   
	   	# Hash the password they entered so we can compare it with the ones in the database
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		# Set up the query to see if there's a matching email/password in the DB
		$q = 
			'SELECT token 
			FROM users
			WHERE email = "'.$_POST['email'].'"
			AND password = "'.$_POST['password'].'"';
		
		
		
		# If there was, this will return the token	   
		$token = DB::instance(DB_NAME)->select_field($q);
		
		# Success
		if($token) {
		
			# Don't echo anything to the page before setting this cookie!
			setcookie('token',$token, strtotime('+1 year'), '/');
			
			# Send them to the homepage
			Router::redirect('/users/profile');
		}
		# Fail
		else {
			echo "Login failed! <a href='/users/login'>Try again?</a>";
		}
	   
    }


	/*-------------------------------------------------------------------------------------------------
	No view needed here, they just goto /users/logout, it logs them out and sends them
	back to the homepage.	
	-------------------------------------------------------------------------------------------------*/
    public function logout() {
       
       # Generate a new token they'll use next time they login
       $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
       
       # Update their row in the DB with the new token
       $data = Array(
       	'token' => $new_token
       );
       DB::instance(DB_NAME)->update('users',$data, 'WHERE user_id ='. $this->user->user_id);
       
       # Delete their old token cookie by expiring it
       setcookie('token', '', strtotime('-1 year'), '/');
       
       # Send them back to the homepage
       Router::redirect('/');
       
    }

	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
    public function profile($user_name = NULL) {
		
		# Only logged in users are allowed...
		if(!$this->user) {
			die('Members only. <a href="/users/login">Login</a>');
		}
		
		# Set up the View
		$this->template->content = View::instance('v_users_profile');
		$this->template->title   = "Profile";

		$q='SELECT * 
			FROM users
			WHERE user_id="'.$this->user->email.'"';

		# Returns user details	   
		$users = DB::instance(DB_NAME)->select_field($q);
				
		# Pass the data to the View
		$this->template->content->users = $users;
		
		# Display the view
		echo $this->template;
				
    }

    /*-------------------------------------------------------------------------------------------------
	Change password validation
	-------------------------------------------------------------------------------------------------*/
	public function reset()
	{
		# Set up the View
		$this->template->content = View::instance('v_users_reset');
		$this->template->title   = "Change Password";
						
		# Display the view
		echo $this->template;
	}

	public function p_reset()
	{

		# Hash the password they entered so we can compare it with the ones in the database
		$_POST['oldpwd'] = sha1(PASSWORD_SALT.$_POST['oldpwd']);


		$q = 
			'SELECT token 
			FROM users
			WHERE email = "'.$this->user->email.'"
			AND password = "'.$_POST['oldpwd'].'"';
		
		#echo $q;	
		
		# If there was, this will return the token	   
		$token = DB::instance(DB_NAME)->select_field($q);
		
		# Success when the user entered password matchs with the system
		if($token) {

			$_POST['newpwd'] = sha1(PASSWORD_SALT.$_POST['newpwd']);
			$_POST['conpwd'] = sha1(PASSWORD_SALT.$_POST['conpwd']);

			# Success when New password matchs with Confirm password
			if($_POST['newpwd'] == $_POST['conpwd'])
			{
				# Update their row in the DB with the new token
		       $data = Array(
		       	'password' => $_POST['newpwd']
		       );
		       # Update the database with new password
		       DB::instance(DB_NAME)->update('users',$data, 'WHERE user_id ='. $this->user->user_id);

		       die('Password is successfully updated. <a href="/posts/mypost/">My posts</a>');
			}
			# When two new password does not match
			else
			{
				die('New password does not match. <a href="/users/reset/">Try again</a>');
				
			}
		}
		# Failure - password does not match
		else
		{
			die('Old password does not match. <a href="/users/reset/">Try again</a>');
			
		}
	}

} # end of the class










