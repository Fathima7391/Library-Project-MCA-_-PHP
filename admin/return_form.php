<?php
  session_start();
  if(!isset($_SESSION['username'])){
	  header("location:../login.php");
  }
?>

<?php
 $con = Mysqli_Connect("localhost","root","","library_management");
 if(!$con){
     echo "Connection error !";
 }

if(isset($_POST['update']))
{
   $no = $_GET['id'];
   //$no = 3;
   //echo "<script>alert(\"start !!\");</script>";

    $name=$_POST['name'];
    $bookid = $_POST['bookid'];
    $issue_date=$_POST['issue'];
    $return_date=$_POST['return_date'];

    //$query = "insert into book_issue (book_id,user_name,issue_date,status) values ($bookid,'$uname','$issuedate',1)";
        $result_issue = mysqli_query($con, "UPDATE book_issue SET return_date='$return_date',status='0' WHERE no=$no");
        if(!$result_issue){
            echo "<script>alert(\"Book issue problem !!\");</script>";
            header("Location: return_book.php");
        }
        $result_book = mysqli_query($con, "UPDATE book_details SET book_status='0' WHERE book_id=$bookid");
        if(!$result_book){
            echo "<script>alert(\"Book Data not updated problem !!\");</script>";
        }
       
        echo "<script>alert(\"Return Succesfully .. \");</script>";
        header("Location: return_book.php");
    
}
?>

<?php
$no = $_GET['id'];
//$no = 3;

$result = mysqli_query($con, "SELECT * FROM book_issue WHERE no=$no");

while($res = mysqli_fetch_array($result)){

    $no= $res['no'];
    $name= $res['user_name'];
    $bookid=$res['book_id'];
    $issue_date= $res['issue_date'];
    $return_date_p= $res['return_date'];
}
?>


<html>
<head>
    <title>Return Book</title>
    <style>
    table{
        background-color: white;
        margin-left: auto;
        margin-right: auto;
        margin-top:4em;
        padding:1em;
        box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2), 0 4px 20px 0 rgba(0,0,0,0.19);
    }
    tr,td,th{
        padding:1em;
        text-align: left;
    }
    .center th{
        text-align: center;
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
 <h2 class="main-head"><b class="b-head">return date of books</b></h2>
    <form name="form1" method="POST" action="#">
        <table>
            <tr>
                <td>Ref. No</td>
                <td><input readonly type="text" name="no" value="<?php echo $no;?>"></td>
            </tr>
            <tr>
                <td>User Name</td>
                <td><input readonly type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr>
                <td>Book ID</td>
                <td><input readonly type="text" name="bookid" value="<?php echo $bookid;?>"></td>
            </tr>
            <tr>
                <td>Issue Date</td>
                <td><input readonly type="text" name="issue" value="<?php echo $issue_date;?>"></td>
            </tr>
            <tr>
                <td>Return Date</td>
                <td><input type="text" name="return_date" value="<?php echo $return_date_p;?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;"><input style="padding:5px;border:none;background-color:red;color:white" type="submit" name="update" value="UPDATE"></td>
            </tr>
        </table>
    </form>
</body>
</html>
