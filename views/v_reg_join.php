<?php if($error): ?>

	<p>Email is already registered.</p>

<?php endif; ?>

<form method='POST' action='/reg/p_join'>
	Sign Up for EZFest!<br>
	All fields are mandatory.<br>

	First Name <input type='text' name='first_name'><br>
	Last Name <input type='date' name='last_name'><br>
	Email <input type='date' name='email'><br>
	Password <input type='password' name='password'><br>
	
	<input type='submit' value='Register'>
</form>