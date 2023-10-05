<?php
session_start();

include("connect.php");

if(isset($_POST['mobile']) && isset($_POST['password']) && isset($_POST['role'])) {
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $role = $_POST['role'];



    $check = mysqli_query($conn, "SELECT * FROM voting WHERE mobile='$mobile' AND password='$password'");

    if ($check) {
        if (mysqli_num_rows($check) > 0) {
            $userdata = mysqli_fetch_array($check);

            $groups = mysqli_query($conn, "SELECT * FROM voting WHERE role='2'");

            if ($groups) {
                $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

                $_SESSION['userdata'] = $userdata;
                $_SESSION['groupsdata'] = $groupsdata;

                header("Location: dashboard.php");
                exit();
            } else {
                echo '
                    <script>
                        alert("Error fetching group data");
                        window.location="../";
                    </script>';
            }
        } else {
            echo '
                <script>
                    alert("User not found");
                    window.location="../";
                </script>';
        }
    } else {
        echo '
            <script>
                alert("Database error: ' . mysqli_error($conn) . '");
                window.location="../";
            </script>';
    }

    mysqli_close($conn);
} else {
    echo '
        <script>
            alert("Form data not properly submitted");
            window.location="../";
        </script>';
}
?>
