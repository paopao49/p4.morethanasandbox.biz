<?php

class index_controller extends base_controller {
		
	public function __construct() {

		parent::__construct();

		if($this->user) {
			Router::redirect('/festivals/index/');
		}

	}

	public function index($error = NULL) {			
		
		$this->template->content = View::instance('v_index_index');
		$this->template->title = "EZFest";		
		$this->template->content->error = $error;

	    $client_files_head = Array(
	        "/css/v_index_index.css"
	    );

	    $this->template->client_files_head = Utils::load_client_files($client_files_head);						

		echo $this->template;

	} # End of method
	
	
} # End of class
