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

        $client_files_head = Array(
            '/css/v_friends_index.css'
        );

        $this->template->client_files_head = Utils::load_client_files($client_files_head); 				

		$this->template->content = View::instance('v_friends_index');

		$this->template->title = 'Friends';

		$q = 'select first_name, last_name, user_id from users where user_id != '.$this->user->user_id;

		$friends_list = DB::instance(DB_NAME)->select_rows($q);

		$this->template->content->friends_list = $friends_list;

		echo $this->template;

	}

}