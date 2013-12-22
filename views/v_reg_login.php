<?php if($error == 'no_email'): ?>

	<p id='error_message'>Email hasn't been registered yet.</p>

<?php endif; ?>

<?php if($error == 'no_token'): ?>

	<p id='error_message'>Incorrect password.</p>

<?php endif; ?>

<form method='POST' action='/reg/p_login'>
	<p>Sign in to EZFest!</p>	

	Email <input type='text' name='email'><br>
	Password <input type='password' name='password'><br>
	
	<input type='submit' value='Sign In'>
</form>