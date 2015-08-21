<!doctype html>
<html lang="en">
<head>
    <title>What's Up</title>

    <style type="text/css">
        *{
            font-family: sans-serif;

        }
        #wrapper {
            padding: 0px 30px;
        }
        label {
            display: block;
        }
        .input_name {
            display: inline-block;
            width: 70px;
        }
        input{
            width: 150px;
            margin-bottom: 10px;
        }
        button{
            color: white;
            background-color: black;
            width: 50px;
            padding: 5px;
            margin-left: 175px;
            display: block;
        }
        p{
            font-size: 12px;
        }
    </style>

</head>
	<div id="wrapper"> 
        <a href="/appointments">Go back</a> <a id="logout" href="/logout">Logout</a> 
        <h1><?=$this->session->userdata['logged_in_user']['name']?></h1>
        <h3>Edit Appointment</h3>
<?php   if(!empty($this->session->flashdata('errors')))
        {
            echo $this->session->flashdata('errors');
        }?>

        <form action="/edit/appointment" method="post">
            <label><span class="input_name">Date: </span><input type = "date" name="date"></label>
            <label><span class="input_name">Time: </span><input type = "time" name="time"></label>
            <label><span class="input_name">Tasks: </span><input type = "text" name = "tasks"></label>
            <span class="input_name">Status: </span>
            <select name="status">
                <option value =""></option>
                <option value = "Pending">Pending</option>
                <option value = "Done">DONE</option>
                <option value = "Missed">Missed</option>
            </select>
            <input type="hidden" name="id" value = "<?=$id?>">
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
