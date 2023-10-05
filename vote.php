<?php 
session_start();
include('connect.php');

$votes = $_POST['gvotes'];
$total_votes=intval($votes)+1;
$gid=$_POST['gid'];
$uid=$_SESSION['userdata']['id'];

$update=mysqli_query($conn,"UPDATE voting SET votes=$total_votes WHERE id='$gid'");
$update_user_status=mysqli_query($conn,"UPDATE voting SET status=1 WHERE id='$uid'");

if($update and $update_user_status){
   $groups =mysqli_query($conn,"SELECT * FROM voting WHERE role=2");
   $groupdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);

   $_SESSION['userdata']['status']=1;
   $_SESSION['groupsdata']=$groupdata;

   echo'
   <script>
    alert("Voting sucessful");
    window.location="dashboard.php";
   </script>
  ';
}
else{
    echo'
    <script>
     alert("Some error occured!!");
     window.location="dashboard.php";
    </script>
   ';
}


?>