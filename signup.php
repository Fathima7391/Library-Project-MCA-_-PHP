
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

   body
    {
    height: 100%;
    width:100%;
    background: url(images/bg.jpg);
    background-position:center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-color: #464646;
    
    }
    .sb-btn{
            background-color:green;
            border:none;
            padding:7px;
            border-radius:3px;
            color:white;
            
            font-size:12px;
            
        }
        .sb-btn:hover{
            color:whit;
            background:red;
        }
</style>
<body>
   
    <form name="form" action="#" method="POST">
        <table>
            <tr>
               <th colspan="2" style="text-align:center;color:red">SIGN UP</th>
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
                <th colspan="2"><input class="sb-btn" type="submit" value="Sign Up" name="submit"></th>
            </tr>
            <tr class="center">
                <th colspan="2"><a href="login.php" style="color:red;text-decoration:none;">Login instead ? </a></th>
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

            $query = "insert into user_approve values('$name','$email','$mobile','$user','$password','$passid')";

            $check_login_query="select * from user_login where user_id='$user'";
            $result = mysqli_query($con,$check_login_query);
            $count = mysqli_num_rows($result);

            $check_login_query_a="select * from user_approve where user='$user'";
            $result_a = mysqli_query($con,$check_login_query_a);
            $count_a = mysqli_num_rows($result_a);

            if($count <= 0 && $count_a <=0){
                if(mysqli_query($con,$query)){
                    echo "<script>alert('success');</script>";
                }
                else{
                    echo "error".$query.mysqli_error($con);
                }
            }

            else{
                echo "<script>alert('Try another username !!!');</script>";
            }
    }
?>
   
</body>
</html>