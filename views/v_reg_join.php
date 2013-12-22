<?php if($error): ?>

	<p id='error_message'>Email is already registered.</p>

<?php endif; ?>

<form method='POST' action='/reg/p_join'>
	<p>Join EZFest!</p>
	<p>*All fields are mandatory.</p>

	First Name <input type='text' name='first_name'><br>
	Last Name <input type='text' name='last_name'><br>
	Email <input type='text' name='email'><br>
	Password <input type='password' name='password'><br>
	
	<input type='submit' value='Join'>
</form>