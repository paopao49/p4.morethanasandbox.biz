<?php if($error == 'no_email'): ?>

	<p>Email hasn't been registered yet.</p>

<?php endif; ?>

<?php if($error == 'no_token'): ?>

	<p>Incorrect password.</p>

<?php endif; ?>

<form method='POST' action='/reg/p_login'>
	Login EZFest!<br>

	Email <input type='date' name='email'><br>
	Password <input type='password' name='password'><br>
	
	<input type='submit' value='Log In'>
</form>