<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
   
    $con = Mysqli_Connect("localhost","root","","library_management");
    if(!$con){
        echo "Connection error !";
    }

$result = mysqli_query($con, "SELECT * FROM book_issue");
?>
 
<html>
<head>    
    <title>book issue statements</title>
    <link href="library/table.css" type="text/css" rel="stylesheet">
    <style>
        .odd{
            background-color: lightgrey;
        }
        .even{
            background-color: white;
        }
        table{
            margin-top:3em;
        }
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
    </style>
</head>
 

<body>
    <h2 class="main-head"><b class="b-head">Book Transactions</b></h2>
    <table>
        <tr bgcolor='lightpink'>
            <td>Ref. NO</td>
            <td>User Name</td>
            <td>Book ID</td>
            <td>Issue Date</td>
            <td>Return Date</td>
            <td>Status</td>
        </tr>
        <?php 
            $i = 0;
        while($res = mysqli_fetch_array($result)) {         
            if($i % 2 != 0){
                $classes = "odd";
            }
            else{
                $classes = "even";
            }
            echo "<tr class=".$classes.">";
            echo "<td>".$res['no']."</td>";
            echo "<td>".$res['user_name']."</td>";
            echo "<td>".$res['book_id']."</td>";    
            echo "<td>".$res['issue_date']."</td>";
            echo "<td>".$res['return_date']."</td>"; 
            if($res['status']==0){
                echo "<td style=\"color:green\">closed</td>"; 
              }
              else{
                echo "<td style=\"color:red\">open</td>"; 
              }
                   
            $i++;
        }
        ?>
    </table>
</body>
</html>
