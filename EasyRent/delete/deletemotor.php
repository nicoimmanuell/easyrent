<?php
    include '../connect.php';
    if(isset($_GET['deleteid'])){
        $motorid = $_GET['deleteid'];
        $sql = "DELETE FROM tbmotorcycle WHERE MotorID = '$motorid'";
        $result = mysqli_query($conn, $sql);
        echo mysqli_error($conn);
        if($result){
            header("location:../admintables/showmotor.php");
        }

    }
?>