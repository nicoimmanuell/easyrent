<?php
    include '../connect.php';
    if(isset($_GET['deleteid'])){
        $busid = $_GET['deleteid'];
        $sql = "DELETE FROM tbbus WHERE BusID = '$busid'";
        $result = mysqli_query($conn, $sql);
        echo mysqli_error($conn);
        if($result){
            header("location:../admintables/showbus.php");
        }
    }
?>