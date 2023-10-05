<?php 
    include("connect.php");
    
    $name =$_POST ['name'];
    $mobile =$_POST ['mobile'];
    $password =$_POST ['password'];
    $cpassword =$_POST ['cpassword'];
    $address=$_POST ['address'];
    $image=$_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    $role=$_POST['role'];

    if($password == $cpassword){
      move_uploaded_file($temp_name, "./uploads/$image");


        $insert = mysqli_query($conn ,"INSERT INTO voting(name,mobile,address,password,image,role,status,votes) VALUES('$name','$mobile','$address','$password','$image','$role','0','0')");
    if($insert){
        echo '
        
        <script>
            alert("Registration successful");
            window.location="../";
          </script>
        ';
       }
       else{
        echo '
         <script>
            alert("Some error occured");
            window.location="register.html";
          </script>
        ';
        }}
      else{
        echo '
         <script>
            alert("Password doesnot match");
            window.location="register.html";
          </script>
        ';
      
      
    }

?>