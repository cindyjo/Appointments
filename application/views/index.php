<!doctype html>
<html lang="en">
<head>
    <title>Login/Registration</title>

    <style type="text/css">
    	*{
    		font-family: sans-serif;
    	}
        #wrapper{
            padding: 0px 20px;
        }
    	fieldset {
    		width: 350px;
    		padding: 20px;
    	}
    	form {
    		margin-bottom: 20px;
    		display: inline-block;
    		vertical-align: top;
    		margin-right: 30px;
    	}
    	label {
    		display: block;
    		margin-bottom: 10px;
    	}
    	input {
    		width: 200px;
    	}
    	.head {
    		display: inline-block;
    		width: 100px;
    	}
    	p {
    		font-size: 12px;
    	}
    	#login_submit, #register_submit
    	{
    		width: 100px;
    		color: white;
    		background-color: black;
    		margin-left: 205px;
            padding: 5px;
    	}
    </style>

</head>

<body>
	<div id="wrapper"> 
    	<h1>Welcome!</h1>
<?php   if(!empty($this->session->flashdata('errors')))
        {
            echo $this->session->flashdata('errors');
        }
        if(!empty($this->session->flashdata('success')))
        {
            echo $this->session->flashdata('success');
        }
?>
    	<form action="/register" method="post">
    		<fieldset>
    			<legend>Register</legend>
    			<label><span class="head">Name: </span><input type="text" name="name"></label>
    			<label><span class="head">Email: </span><input type="email" name="email"></label>
    			<label><span class="head">Password: </span><input type="password" name="password"></label>
    			<p>*Password should be at least 8 characters</p>
    			<label><span class="head">Confirm PW: </span><input type="password" name="confirm_password"></label>
    			<label><span class="head">Date of Birth: </span><input type="date" name="date_of_birth"></label>
    			<input id = "register_submit" type="submit" value="Register">
    		</fieldset>
    	</form>
		<form action="/login" method="post">
			<fieldset> 
				<legend>Log In</legend>
				<label><span class="head">Email: </span><input type="text" name="email"></label>
				<label><span class="head">Password: </span><input type="password" name="password"></label>
				<input id = "login_submit" type="submit" value="Login">
			</fieldset>
		</form>
	</div>


</body>
</html>
