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
        #logout {
            margin-left: 800px;
        }
        table, td, th {
            border: 1px solid silver;
        }
        #today {
            width: 80%;
            margin-bottom: 30px;
        }
        #future {
            width: 58%;
            margin-bottom: 50px;
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
        }
        p{
            font-size: 12px;
        }

    </style>

</head>

  
	<div id="wrapper"> 
        <a id="logout" href="/logout">Logout</a>
    	<h1>Hello, <?=$this->session->userdata['logged_in_user']['name']?></h1>
        <h3>Here are your appoinments for today, <?=date('M j, Y')?>: </h3>
        <table id = "today">
            <tr>
                <th>Tasks</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
<?php       foreach ($today AS $row) 
            {?>
            <tr>
                <td><?=$row['tasks']?></td>
                <td><?=$row['time']?></td>
                <td><?=$row['status']?></td>
                <td><a href="/edit/<?=$row['id']?>">Edit</a> <a href="/delete/<?=$row['id']?>">Delete</a></td>
            </tr>
<?php       }?>            
        </table>

        <h3>Your Other appointments: </h3>
        <table id= "future">
            <tr>
                <th>Tasks</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
<?php       foreach ($future AS $row) 
            {?>
            <tr>
                <td><?=$row['tasks']?></td>
                <td><?=$row['date']?></td>
                <td><?=$row['time']?></td>
            </tr>
<?php       }?>               
        </table>
        <div id="add">
            <h3>Add Appointment</h3>
<?php       if(!empty($this->session->flashdata('errors')))
            {
                echo $this->session->flashdata('errors');
            }?>
            <form action="/new/appointment" method="post">
                <label><span class="input_name">Date: </span><input type = "date" name="date"></label>
                <label><span class="input_name">Time: </span><input type = "time" name="time"></label>
                <label><span class="input_name">Tasks: </span><input type = "text" name = "tasks"></label>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>
</body>
</html>
