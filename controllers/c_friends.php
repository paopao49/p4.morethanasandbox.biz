<?php

class friends_controller extends base_controller {
	
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

}