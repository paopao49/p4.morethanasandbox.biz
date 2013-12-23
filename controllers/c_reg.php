<?php

class reg_controller extends base_controller {

    public function join() {

        if(!$this->user) {

            $this->template->content = View::instance('v_reg_join');
            $this->template->title = "Join EZFest";

            $client_files_head = Array(
                "/css/v_login_or_join.css"
            );

            $this->template->client_files_head = Utils::load_client_files($client_files_head);    

            $client_files_body = Array(
                "https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js",
                "/js/jquery.form.js",
                "/js/js_reg_join.js"
            );

            $this->template->client_files_body = Utils::load_client_files($client_files_body);                                   
     
            echo $this->template;

        } else {

            Router::redirect('/festivals/index/');

        }
    } # End of method	

    public function p_join() {

        $_POST = DB::instance(DB_NAME)->sanitize($_POST);  	

        # Set up test case for existing email
        $q_email = "
            SELECT email
            FROM users
            WHERE
                email = '".$_POST['email']."'
        ";

        $existing_email = DB::instance(DB_NAME)->select_field($q_email);

        # Check if email is already in registered in database
        if($existing_email) {

            echo 'Email is already registered.';

        } elseif(!($_POST['first_name'] && $_POST['last_name'] && $_POST['email'] && $_POST['password'])) {

            echo 'All fields are mandatory.';

        } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            echo 'Must enter a valid email address';

        } else {    

    	    $_POST['created'] = Time::now();

    	    $_POST['modified'] = Time::now();

    	    $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

    	    $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

    	    $user_id = DB::instance(DB_NAME)->insert('users',$_POST);

    	    $q_token = "
    	        SELECT token
    	        FROM users
    	        WHERE
    	            user_id = ".$user_id
    	    ;

    	    $token = DB::instance(DB_NAME)->select_field($q_token);

    	    setcookie("token",$token,strtotime('+1 year'),'/');

            echo 'Registration successful!';
    	    //Router::redirect('/festivals/index/');
        }  

    } # End of method


    # Need to implement form validation
    public function login($error = NULL) {

        # Redirect users already logged in to home page
        if(!$this->user) {

            $this->template->content = View::instance('v_reg_login');
            $this->template->title = 'Log in to EZFest';
            $this->template->content->error = $error;        

            $client_files_head = Array(
                "/css/v_login_or_join.css"
            );

            $this->template->client_files_head = Utils::load_client_files($client_files_head);          

            echo $this->template;

        } else {

            Router::redirect('/festivals/index');

        }

    } # End of method
    
    public function p_login() {

        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Redirect to login if $_POST is null
        if(!($_POST['email'] && $_POST['password'])) {

        	Router::redirect('/reg/login');

        }        

        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Only get token if password matches
        $q_token = "
            SELECT token
            FROM users
            WHERE
                email = '".$_POST['email']."'
                AND password = '".$_POST['password']."'
        ";

        $q_email = "
            SELECT email
            FROM users
            WHERE
                email = '".$_POST['email']."'
        ";

        # Get token given user credentials
        $token = DB::instance(DB_NAME)->select_field($q_token);

        # Get email given user credentials
        $em = DB::instance(DB_NAME)->select_field($q_email);

        # No email error redirect
        if(!$em) {

            Router::redirect('/reg/login/no_email');

        # Wrong password redirect
        } elseif(!$token) {

            Router::redirect('/reg/login/no_token');

        # Successful login
        } else {

            setcookie("token",$token,strtotime('+1 year'),'/');

            Router::redirect('/festivals/index');
        }

    } # End of method


    public function logout() {
        
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        $data = Array("token" => $new_token);

        DB::instance(DB_NAME)->update("users",$data,"WHERE token = '".$this->user->token."'");

        setcookie("token","",strtotime('-1 year'),'/');

        Router::redirect('/');
    }    

}