<?php
    include '../connect.php';
    if(isset($_GET['deleteid'])){
        $rentid = $_GET['deleteid'];
        $vehicleid = $_GET['vehicleid'];
        $sql = "DELETE FROM tborder WHERE OrderID = $rentid";
        $bus_sql = "UPDATE tbbus SET RentStat = 'AVAILABLE' WHERE BusID = '$vehicleid'";
        $car_sql = "UPDATE tbcar SET RentStat = 'AVAILABLE' WHERE CarID = '$vehicleid'";
        $motor_sql = "UPDATE tbmotorcycle SET RentStat = 'AVAILABLE' WHERE MotorID = '$vehicleid'";
        $result = mysqli_query($conn, $sql);
        echo mysqli_error($conn);
        mysqli_query($conn, $bus_sql);
        mysqli_query($conn, $car_sql);
        mysqli_query($conn, $motor_sql);
        if($result){
            header("location:../admintables/showrent.php");
        }
    }
?>