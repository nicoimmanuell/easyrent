<html>
    <head>
        <title>Customer List</title>
        <style>
            @keyframes fade { 
                0% {
                    opacity: 0;
                }

                100% {
                    opacity: 1;
                }
            }
            * {
                font-family: 'Candara';
            }
            html, body {
                animation: fade 2s;
                width: 100%;
                height: 100%;
                margin: 0;
                scroll-behavior: smooth;
            }
            body{
                background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url('../images/customer.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
            }

            .content-wrap {
                display: flex;
                justify-content: center;
                margin: auto;
                width: 90%;
                padding: 20px;
                top: 20%;
                position: relative;
            }
            .table-wrap, .form-wrap {
                padding: 20px;
                margin: 20px;
                border-radius: 15px;
                background-color: rgba(0,0,0,0.8);
            }
            h1 {
                font-size: 20px;
                color: white;
                font-family: "Candara"
            }
            table {
                margin: 20px;
                color: white;
                border-collapse: collapse;
            }
            th, tr, td{
                border-bottom: 0.5px solid white;
                width: 250px;
                text-align: left;
                padding: 10px;
            }
            a{
                text-decoration: none; 
            }
            .back a{
                background-color: rgba(255,255,255,0.1);
                padding: 10px;
                margin: 10px;
                border-radius: 5px;
                color: white;
                font-weight: bold;
                text-decoration: none; 
            }
            .back a:hover{
                background-color: rgba(255,255,255,0.6);
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <?php include '../navbar/adminnav.html';?>
        <div class="content-wrap">
            <div class="table-wrap">
                <h1>Customer List</h1>
                <table>
                    <tr>
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        include '../connect.php';
                        $result = mysqli_query($conn,"SELECT * FROM tbcustomer");
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr id='content'>";
                            echo "<td>" . $row['CustomerID'] . "</td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Gender'] . "</td>";
                            echo "<td>" . $row['BirthDate'] . "</td>";
                            echo "<td>" . $row['Address'] . "</td>";
                            echo "<td>" . $row['PhoneNumber'] . "</td>";
                            echo "<td id='button'> 
                            <a href='../delete/deletecustomer.php?deleteid=".$row['CustomerID']."'><button>Delete</button></a>
                            </td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
                <div class="back">
                    <a href="../adminpage.php">Back</a>
                </div>
            </div>
        </div>
    </body>
</html>