<?php

class festivals_controller extends base_controller {
	
	# Class is only accessible to users who are signed in
	public function __construct() {

		parent::__construct();

		if(!$this->user) {
			Router::redirect('/index/index/error');
		}

	}

	public function index() {

		$this->template->content = View::instance('v_festivals_index');
		$this->template->title = 'Festival List';

		$q = 'select * from festivals';

		$festival_list = DB::instance(DB_NAME)->select_rows($q);

		$this->template->content->festival_list = $festival_list;

		echo $this->template;

	}

	# Need to implement error checking if no fest_id entered
	public function event($fest_id = NULL) {

		$this->template->content = View::instance('v_festivals_event');

		$q = 'select * from festivals where festival_id = '.$fest_id;

		$current_festival = DB::instance(DB_NAME)->select_row($q);

		$this->template->title = $current_festival['title'];

		$this->template->content->current_festival = $current_festival;

		echo $this->template;

	}

	# Need to implement form validation (check for required fields)
	public function post() {

		$this->template->content = View::instance('v_festivals_post');

		$this->template->title = 'Post New Festival';

		echo $this->template;
	}

	public function p_post() {

		# Check for required fields
		if($_POST['title'] && $_POST['start_date'] && $_POST['end_date'] && $_POST['location']) {

			DB::instance(DB_NAME)->insert('festivals',$_POST);

			Router::redirect('/festivals/index');

		} else {

			Router::redirect('/festivals/post');
		}

	}

	# Need to:
		# create new table that stores user-specific festival plans
		# update function to display user-specific festival plans AND filter to only festival identified by $fest_id
	public function plan($fest_id = NULL) {

		$this->template->content = View::instance('v_festivals_plan');
		$this->template->title = 'Title';

	}

}