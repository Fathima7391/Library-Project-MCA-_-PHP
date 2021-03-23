<?php
  session_start();
  if(!isset($_SESSION['username'])){
	  header("location:../login.php");
  }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student registration</title>
</head>
<style>
    table{
        background-color: white;
        margin-left: auto;
        margin-right: auto;
        margin-top:4em;
        padding:1em;
        box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2), 0 4px 20px 0 rgba(0,0,0,0.19);
        border-radius:15px;
    }
    tr,td,th{
        padding:1em;
        text-align: left;
    }
    .center th{
        text-align: center;
    }
    table input{
        border-radius:15px;
        border:1px solid black;
    }
    input:focus {
        border-radius:15px;
        border:1px solid red;
        outline:none;
    }

    body{
    background: url(../images/bg.jpg);
    background-position:center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-color: #464646;
    }
    .main-head{
  	    /*color:#00FFFF;
	    text-shadow:0 0 5px #000000, 0 0 5px #000000;
        font-family:Courier New;*/
  	    text-align:center;
        font-family:Courier New;
        margin-top:1em;
	    
	    font-size:20px;
        }
        .b-head{
            background:rgba(255,255,255,.5); 
            color:black;
            padding:3px;
            padding-left:10px;
            padding-right:10px;
            border-radius:15px;
            text-transform:uppercase;
            border-bottom:2px solid red;
        }
        .sb-btn{
            background-color:green;
            border:none;
            padding:5px;
            border-radius:3px;
            color:white;
            text-transform:uppercase;
        }
</style>
<body>
    <form name="form" action="#" method="POST">
        <table>
            <tr>
                <th colspan="2" style="text-align:center"><h2 class="main-head"><b class="b-head">Add student directly</b></h2></th>
            </tr>
            <tr>
                <th>Name</th>
                <td><input type="text" name="fname"> </td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email"> </td>
            </tr>
            <tr>
                <th>Mob NO </th>
                <td><input type="tel" name="mob"> </td>
            </tr>
            <tr>
                <th>Username </th>
                <td><input type="text" name="user"> </td>
            </tr>
            <tr>
                <th>Password </th>
                <td><input type="password" name="password"> </td>
            </tr>
            <tr>
                <th>PassID </th>
                <td><input type="password" name="passid"> </td>
            </tr>
            <tr class="center">
                <th colspan="2"><input class="sb-btn" type="submit" value="submit" name="submit"></th>
            </tr>
        </table>
    </form>
<?php
    $con = Mysqli_Connect("localhost","root","","library_management");
    if(!$con){
        echo "Connection error !";
    }

    if(isset($_POST['submit'])){
        $name = $_POST['fname'];  
        $email = $_POST['email'];  
        $mobile = $_POST['mob'];  
        $user = $_POST['user'];  
        $password = $_POST['password'];
        $passid = $_POST['passid'];

            $query = "insert into user_details values('$name','$email','$mobile','$user')";
            if(mysqli_query($con,$query)){
                echo "success";
            }
            else{
                echo "error".$query.mysqli_error($con);
            }
            $query_acc = "insert into user_login values('$user','$password','$passid','1001')";
            if(mysqli_query($con,$query_acc)){
                echo "success";
            }
            else{
                echo "error".$query.mysqli_error($con);
            }
    }
?>
   
</body>
</html>