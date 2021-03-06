<?php

class festivals_controller extends base_controller {
	
	# Class is only accessible to users who are signed in
	public function __construct() {

		parent::__construct();

		if(!$this->user) {
			Router::redirect('/index/index/error');
		}

	} # End of method

	public function index($user_id = NULL) {			

        $client_files_body = Array(
            'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
            '/js/js_festivals_click_listener.js'
        );

        $this->template->client_files_body = Utils::load_client_files($client_files_body); 	

		$current_user_id = $this->user->user_id;
		$this->template->content = View::instance('v_festivals_index');

		# Festival index with no user_id selected (aka the home page)
		if(!$user_id) {

			# Different CSS based on method argument
	        $client_files_head = Array(
	            '/css/v_festivals_index.css'
	        );

	        $this->template->client_files_head = Utils::load_client_files($client_files_head); 			

			$q_home = '
				select 
					a.*,
					b.rsvp_id,
					b.user_id,
					b.status
				from festivals a
				left join rsvp b
					on (
					a.festival_id = b.festival_id
					and b.user_id = '.$current_user_id.'
					)
				order by a.title
			';

			$festival_list = DB::instance(DB_NAME)->select_rows($q_home);

			$this->template->content->festival_list = $festival_list;

			$this->template->title = 'Festivals!';

			$this->template->content->index_type = 'home';

			echo $this->template;

		} # End of if

		# Festival index with self selected
		if($user_id == $current_user_id) {

			# Different CSS based on method argument
	        $client_files_head = Array(
	            '/css/v_festivals_index.css'
	        );

	        $this->template->client_files_head = Utils::load_client_files($client_files_head); 			

			$q_self = '
				select 
					a.*,
					b.rsvp_id,
					b.user_id,
					b.status				
				from festivals a
				inner join rsvp b
					on (
					a.festival_id = b.festival_id
					and b.user_id = '.$current_user_id.'
					)
				order by a.title
			';

			$festival_list = DB::instance(DB_NAME)->select_rows($q_self);

			$this->template->content->festival_list = $festival_list;

			$this->template->title = 'My Festivals';

			$this->template->content->index_type = 'self';

			echo $this->template;

		} # End of if	

		# Festival index with friend selected
		if($user_id && (!($user_id == $current_user_id))) {

			# Different CSS based on method argument
	        $client_files_head = Array(
	            '/css/v_festivals_index_friend.css'
	        );

	        $this->template->client_files_head = Utils::load_client_files($client_files_head);			

			$q_friend = '
				select 
					a.*,
					b.rsvp_id,
					b.user_id,
					b.status				
				from festivals a
				inner join rsvp b
					on (
					a.festival_id = b.festival_id
					and b.user_id = '.$user_id.'
					)
				order by a.title
			';

			$festival_list = DB::instance(DB_NAME)->select_rows($q_friend);

			$this->template->content->festival_list = $festival_list;

			$q_title = 'select first_name, last_name from users where user_id = '.$user_id;

			$title = DB::instance(DB_NAME)->select_row($q_title);

			$this->template->content->user_info = $title;

			$this->template->title = $title['first_name'].' '.$title['last_name'];

			$this->template->content->index_type = 'friend';

			echo $this->template;

		} # End of if

	} # End of method

	public function event($fest_id = NULL) {

		if($fest_id == NULL) {

			Router::redirect('/festivals/index');

		}				

		$this->template->content = View::instance('v_festivals_event');

        $client_files_head = Array(
            '/css/v_festivals_event.css'
        );

        $this->template->client_files_head = Utils::load_client_files($client_files_head);			

		$current_user_id = $this->user->user_id;

		$q = '
			select 
				a.*,
				b.rsvp_id,
				b.user_id,
				b.status
			from festivals a
			left join rsvp b
				on (
				a.festival_id = b.festival_id
				and b.user_id = '.$current_user_id.'
				)
			where
				a.festival_id = '.$fest_id
		;

		$current_festival = DB::instance(DB_NAME)->select_row($q);

		if(!$current_festival) {

			Router::redirect('/festivals/index');

		}		

		$this->template->title = $current_festival['title'];

		$this->template->content->current_festival = $current_festival;

        $client_files_body = Array(
            'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
            '/js/js_festivals_click_listener.js'
        );

        $this->template->client_files_body = Utils::load_client_files($client_files_body); 		

		echo $this->template;

	} # End of method

	# If passed a festival_id, functions as an "Edit Festival" instead
	public function post($festival_id = NULL) {

        $client_files_head = Array(
            '/css/v_festivals_post.css',
            'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css'
        );

        $this->template->client_files_head = Utils::load_client_files($client_files_head); 	

        $client_files_body = Array(
        	'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
        	'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js',
        	'/js/jquery.form.js',
            '/js/js_festivals_post.js'
        );

        $this->template->client_files_body = Utils::load_client_files($client_files_body); 	        		

		$this->template->content = View::instance('v_festivals_post');

		$page_title = 'Post New Festival';

		# Check if passed argument returns a pre-existing festival and load pre-existing festival details for edit
		if($festival_id) {

			$q = '
				select 
					*				
				from festivals
				where
					festival_id = '.$festival_id
			;

			$festival = DB::instance(DB_NAME)->select_row($q);

			# If passed argument returns a pre-existing festival, load festival change header
			if($festival) {

				$this->template->content->festival = $festival;

				$page_title = 'Edit Festival Details';

			}

		}

		$this->template->title = $page_title;	

		echo $this->template;

	} # End of method

	public function p_post() {

		$_POST = DB::instance(DB_NAME)->sanitize($_POST);

		# Check for required fields
		if(!($_POST['title'] && $_POST['start_date'] && $_POST['end_date'] && $_POST['location'])) {

			echo 'Please fill in all required fields.';

		# Check if user is trying to edit an existing festival or post a new festival
		# $_POST['festival_id'] is only set when the post method loads a pre-existing festival
		} elseif(!($_POST['festival_id'] == '')) {

			$where_condition = 'WHERE festival_id = '.$_POST['festival_id'];

			DB::instance(DB_NAME)->update('festivals',$_POST,$where_condition);

			echo 'Changes successful! Redirecting to home page...';

		# Else case is when user is trying to post a new festival
		} else {

			DB::instance(DB_NAME)->insert('festivals',$_POST);

			echo 'Successful post! Redirecting to home page...';

		} # End of else

	} # End of method

	public function rsvp() {

		# Check if $_POST has required values
		#if($_POST['user_id'] && $_POST['festival_id']) {

		$_POST = DB::instance(DB_NAME)->sanitize($_POST);

		$_POST['user_id'] = $this->user->user_id;

		if($_POST['status'] == NULL) {

			$where_for_delete = 'WHERE festival_id = '.$_POST['festival_id'].' AND user_id = '.$this->user->user_id;

			DB::instance(DB_NAME)->delete('rsvp', $where_for_delete);

		} elseif($_POST['status'] == 'wishlist' || $_POST['status'] == 'confirmed') {

			# Delete previous rsvp if it exists
			$where_for_delete = 'WHERE festival_id = '.$_POST['festival_id'].' AND user_id = '.$this->user->user_id;

			DB::instance(DB_NAME)->delete('rsvp', $where_for_delete);			
		
			# Insert new rsvp
			DB::instance(DB_NAME)->insert('rsvp',$_POST);

		} # End of if

	} # End of method

	public function plan($fest_id = NULL) {

		if(!$fest_id) {

			Router::redirect('/festivals/index');

		}			

		$this->template->content = View::instance('v_festivals_plan');

        $client_files_head = Array(
            '/css/v_festivals_plan.css'
        );

        $this->template->client_files_head = Utils::load_client_files($client_files_head); 			

        $client_files_body = Array(
            'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
            '/js/js_festivals_plan.js'
        );

        $this->template->client_files_body = Utils::load_client_files($client_files_body); 			

		$q_fest = '
			select 
				*				
			from festivals
			where
				festival_id = '.$fest_id
		;

		$current_festival = DB::instance(DB_NAME)->select_row($q_fest);

		if(!$current_festival) {

			Router::redirect('/festivals/index');

		}			

		$this->template->content->current_festival = $current_festival;

		$current_user_id = $this->user->user_id;

		$q_plan = '
			select 
				*				
			from plans
			where
				festival_id = '.$fest_id.'
				and user_id = '.$current_user_id
		;

		$current_plan = DB::instance(DB_NAME)->select_row($q_plan);

		$this->template->content->current_plan = $current_plan;

		$this->template->title = $current_festival['title'];

		echo $this->template;

	} # End of method

	public function p_plan($error = NULL) {

		$_POST = DB::instance(DB_NAME)->sanitize($_POST);		

		$_POST['user_id'] = $this->user->user_id;

		# Delete previous plan if it exists
		$where_for_delete = 'WHERE festival_id = '.$_POST['festival_id'].' AND user_id = '.$this->user->user_id;

		DB::instance(DB_NAME)->delete('plans', $where_for_delete);			
	
		# Insert new plan
		DB::instance(DB_NAME)->insert('plans',$_POST);

		echo 'Save successful!';

	} # End of method

} # End of controller