<?php 
session_start();

// Redirect if userdata is set
if (!isset($_SESSION['userdata'])) {
    header("Location: dashboard.php");
    exit; //  exit after redirection
}

$userdata = isset($_SESSION['userdata']) ? $_SESSION['userdata'] : array();
$groupsdata = isset($_SESSION['groupsdata']) ? $_SESSION['groupsdata'] : array();

$status = isset($userdata['status']) && $userdata['status'] == 0 ? '<b style="color:red">Not voted</b>' : '<b style="color:green">Voted</b>';


?>

<!DOCTYPE html>
<html>
<head>
    <title>Online voting dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="mainsection">
        <center>
            <div id="headersection">
                <a href="../"><button id="backbtn">Back</button></a>
                <a href="logout.php"><button id="logoutbtn">Logout</button></a>
                <h1>Online voting system</h1>
            </div>
        </center>
        <hr>
    </div>
    <div id="mainpanel">
        <div id="Profile">
            <center>
                <img src="./uploads/<?php echo $userImage = isset($userdata['image']) ? $userdata['image'] : 'd'; // Use a default image if not set
?>" height="100" width="100">
            </center><br><br>
            <b>Name:</b> <?php echo isset($userdata['name']) ? $userdata['name'] : ''; ?><br><br>
<b>Mobile:</b> <?php echo isset($userdata['mobile']) ? $userdata['mobile'] : ''; ?><br><br>
<b>Address:</b> <?php echo isset($userdata['address']) ? $userdata['address'] : ''; ?><br><br>

            <b>Status:</b> <?php echo $status ?><br><br>
        </div>
        <div id="Group">
            <?php
            foreach ($groupsdata as $group) {
                ?>
                <div>
                    <img src="./uploads/<?php echo $group['image'];?>" height="100" width="100">
                    <b>Candidate:</b> <?php echo $group['name'] ?><br><br>
                    <b>Votes:</b> <?php echo $group['votes'] ?><br><br>
                    <form action="vote.php" method="POST">
                        <input type="hidden" name="gvotes" value="<?php echo $group['votes'] ?>">
                        <input type="hidden" name="gid" value="<?php echo $group['id'] ?>">
                        <?php
                        if ($userdata['status'] == 0) {
                            ?>
                            <input type="submit" name="votebtn" value="Vote" id="votebtn">
                        <?php
                        } else {
                            ?>
                            <button disabled type="button" name="votebtn" id="voted">Voted</button>
                        <?php
                        }
                        ?>
                    </form>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
