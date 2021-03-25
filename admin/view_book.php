 <?php
  session_start();
  if(!isset($_SESSION['username'])){
	  header("location:../login.php");
  }
?>

<html lang="en">
<head>
    <link href="library/search.css" type="text/css" rel="stylesheet">
    <style>
    tr,td{
        padding:10px;
        text-align:center;
    }
    .odd{
        background-color: rgba(132, 133, 127,.5);
            ;
        }
    .even{
        background-color:rgba(96, 97, 93,.5);
        }
    th{
        background-color: rgba(0, 0, 0,.5);
        color:white;
        text-align:center;
        
    }
    .main-head{
  	/*background:black;*/
  	color:rgb(62, 62, 64);
  	text-align:center;
	font-family:Courier New;
	font-size:40px;
    }
    .delete-btn{
    text-decoration: none;
    background-color: gray;
    padding: 5px;
    color:black;
    border-radius:5px;
    }
    .delete-btn:hover{
        background-color:red;
        color:white;
    }
    </style>
</head>
<body><h2 class="main-head">BOOK DETAILS</h2>
<div class="shadow">
<div class="text-center search-div">
<h5 class="search-here">Search here</h5>
    </div>
<input type="text" name="search" id="myInput" onkeyup="myFunction()" placeholder="Search.." class="search-bar">
<?php
    $con = Mysqli_Connect("localhost","root","","library_management");
    if(!$con){
        echo "Connection error !";
    }
    else{
        $query = "select * from book_details";
        $values = mysqli_query($con,$query);
        echo '<table id="myTable" style="margin-left:auto;margin-right:auto;margin-top:3em;border-collapse:collapse;"><th>ID</th><th>TITLE</th><th>AUTHOR NO</th><th>EDITION</th><th>PUBLISHER</th>
		<th>AVAILABILITY</th><th>DELETE</th>';
        if(mysqli_num_rows($values)){
            $i = 1;
                while($row=mysqli_fetch_assoc($values)){
                    if($i % 2 != 0){
                        $classes = "odd";
                    }
                    else{
                        $classes = "even";
                    }
                    echo "<tr class=".$classes.">";
                        echo '<td>';
                            echo $row["book_id"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["book_name"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["book_author"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["book_edition"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["book_publisher"];
                        echo '</td>';
                        echo '<td>';
                        if($row["book_status"] == 0){
                            echo "<h4 style=\"color:green;\">Available</h4>";

                        }
                        else{
                            echo "<h4 style=\"color:red;\">Not Available</h4>";
                        }
                        echo '</td>';
						
						echo '<td>';
                            echo "<a class=\"delete-btn\" href=\"delete_book.php?id=$row[book_id]\"> Delete </a>";
							
                        echo '</td>';
                        
                    echo '</tr>';
                    $i++;
                }
        }
        else{
                echo "error".$query.mysqli_error($con);
        }
    }

?>
<script src="library/search.js"></script>
<div>
</body>
</html>

