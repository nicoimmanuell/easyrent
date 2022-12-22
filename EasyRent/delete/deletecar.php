<?php
    include '../connect.php';
    if(isset($_GET['deleteid'])){
        $carid = $_GET['deleteid'];
        $sql = "DELETE FROM tbcar WHERE CarID = '$carid'";
        $result = mysqli_query($conn, $sql);
        echo mysqli_error($conn);
        if($result){
            header("location:../admintables/showcar.php");
        }
    }
?>