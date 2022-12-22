<?php
    include '../connect.php';
    if(isset($_GET['deleteid'])){
        $customerid = $_GET['deleteid'];
        $sql = "DELETE FROM tbcustomer WHERE CustomerID = $customerid";
        $result = mysqli_query($conn, $sql);
        echo mysqli_error($conn);
        if($result){
            header("location:../admintables/showcustomer.php");
        }
    }
?>