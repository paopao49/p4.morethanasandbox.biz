<?php

class index_controller extends base_controller {
		
	# Need to check if user is logged in - if so, redirect to festivals/index
	public function index($error = NULL) {	
		
		$this->template->content = View::instance('v_index_index');
		$this->template->title = "EZFest";
		$this->template->content->error = $error;		

		echo $this->template;

	} # End of method
	
	
} # End of class
