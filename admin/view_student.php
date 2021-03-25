<?php
  session_start();
  if(!isset($_SESSION['username'])){
	  header("location:../login.php");
  }
?>

<html lang="en">
<head>
<link href="library/table.css" type="text/css" rel="stylesheet">
    <style>

    .main-head{
  	    /*color:#00FFFF;
	    text-shadow:0 0 5px #000000, 0 0 5px #000000;
        font-family:Courier New;*/
  	    text-align:center;
        font-family:Courier New;
        margin-top:1em;
	    
	    font-size:30px;
        }
        .b-head{
            background:rgba(255,255,255,.5);
            color:black;
            padding:3px;
            border-radius:15px;
            text-transform:uppercase;
            border-bottom:2px solid red;
        }
        .div-box{
            padding:5px;
            background:rgba(255,255,255,0);
            text-align:center;
            width:80%;
            margin:auto;
            border-radius:10px;
            
        }
        #main-tb tr{
           /* border-bottom:1px solid rgb(199, 116, 8);*/
            text-align:center;
        }
        #main-tb th{
            color:red;
            text-transform: uppercase;
            font-family: "Lucida Console", "Courier New", monospace;
            font-weight:normal;
        }
        th,tr,td{
           /* border:1px solid rgb(199, 116, 8);*/
           
            background-color:rgba(255,255,255,1);
            color:black;
            padding:15px;
           
        }
        table{
            background:none;
        }
        td:hover{
            color:white;
            background-color:gray;
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php
    $con = Mysqli_Connect("localhost","root","","library_management");
    if(!$con){
        echo "Connection error !";
    }
    else{
        echo "<div class=\"div-box\">";
        echo "<h2 class=\"main-head\"><b class=\"b-head\">Students registered</b></h2>";
        $query = "select * from user_details";
        $values = mysqli_query($con,$query);
        echo '<table id="main-tb" style="margin-left:auto;margin-right:auto;margin-top:3em;"><th>Name</th><th>Email</th><th>Mob NO</th><th>User Name</th>';
        if(mysqli_num_rows($values)){
                while($row=mysqli_fetch_assoc($values)){
                    echo '<tr>';
                        echo '<td>';
                            echo $row["name"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["email"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["mobile"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["user"];
                        echo '</td>';
                    echo '</tr>';
                }
                
        echo "</table><br><br>";
        echo "</div>";
        }
        else{
                echo "error".$query.mysqli_error($con);
        }
    }

?>