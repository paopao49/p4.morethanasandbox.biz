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
            '/js/js_festivals_index.js'
        );

        $this->template->client_files_body = Utils::load_client_files($client_files_body); 	

		$current_user_id = $this->user->user_id;
		$this->template->content = View::instance('v_festivals_index');

		# Festival index with no user_id selected (aka the home page)
		if(!$user_id) {

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
			';

			$festival_list = DB::instance(DB_NAME)->select_rows($q_home);

			$this->template->content->festival_list = $festival_list;

			$this->template->title = 'Festivals!';

			$this->template->content->index_type = 'home';

			echo $this->template;

		} # End of if

		# Festival index with self selected
		if($user_id == $current_user_id) {

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
			';

			$festival_list = DB::instance(DB_NAME)->select_rows($q_self);

			$this->template->content->festival_list = $festival_list;

			$this->template->title = 'My Festivals';

			$this->template->content->index_type = 'self';

			echo $this->template;

		} # End of if	

		# Festival index with friend selected
		if($user_id && (!($user_id == $current_user_id))) {

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

	# Need to implement error checking if no fest_id entered
	public function event($fest_id = NULL) {

		$this->template->content = View::instance('v_festivals_event');

		$q = 'select * from festivals where festival_id = '.$fest_id;

		$current_festival = DB::instance(DB_NAME)->select_row($q);

		$this->template->title = $current_festival['title'];

		$this->template->content->current_festival = $current_festival;

		echo $this->template;

	} # End of method

	# Need to implement form validation (check for required fields)
	public function post() {

		$this->template->content = View::instance('v_festivals_post');

		$this->template->title = 'Post New Festival';

		echo $this->template;

	} # End of method

	public function p_post() {

		# Check for required fields
		if($_POST['title'] && $_POST['start_date'] && $_POST['end_date'] && $_POST['location']) {

			DB::instance(DB_NAME)->insert('festivals',$_POST);

			Router::redirect('/festivals/index');

		} else {

			Router::redirect('/festivals/post');
		}

	} # End of method

	public function rsvp() {

		# Check if $_POST has required values
		#if($_POST['user_id'] && $_POST['festival_id']) {

		$_POST['user_id'] = $this->user->user_id;

		if($_POST['status'] == NULL) {

			$where_for_delete = 'WHERE festival_id = '.$_POST['festival_id'].' AND user_id = '.$this->user->user_id;

			DB::instance(DB_NAME)->delete('rsvp', $where_for_delete);

		} elseif($_POST['status'] == 'wishlist' || $_POST['status'] == 'confirmed') {

			$where_for_delete = 'WHERE festival_id = '.$_POST['festival_id'].' AND user_id = '.$this->user->user_id;

			DB::instance(DB_NAME)->delete('rsvp', $where_for_delete);			
		
			DB::instance(DB_NAME)->insert('rsvp',$_POST);

		} # End of if

	} # End of method

	# Need to:
		# create new table that stores user-specific festival plans
		# update function to display user-specific festival plans AND filter to only festival identified by $fest_id
	public function plan($fest_id = NULL) {

		$this->template->content = View::instance('v_festivals_plan');
		$this->template->title = 'Title';

	} # End of method

}