<?php if($error): ?>

	<p id='error_message'>Email is already registered.</p>

<?php endif; ?>

<p id='message_holder'></p>

<form>
	<p>Join EZFest!</p>
	<p id='instructions'>*All fields are mandatory.</p>

	First Name <input type='text' name='first_name'><br>
	Last Name <input type='text' name='last_name'><br>
	Email <input type='text' name='email'><br>
	Password <input type='password' name='password'><br>
	
	<input type='submit' value='Join'>
</form>