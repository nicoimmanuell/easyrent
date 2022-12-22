<html>
    <head>
        <title>Car List</title>
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
                background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url('../images/car.jpeg');
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
            .add-car a{
                background-color: rgba(255,255,255,0.1);
                padding: 10px;
                margin: 10px;
                border-radius: 5px;
                color: white;
                font-weight: bold;
                text-decoration: none; 
            }
            .add-car a:hover{
                background-color: rgba(255,255,255,0.6);
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <?php include '../navbar/adminnav.html';?>
        <div class="content-wrap">
            <div class="table-wrap">
                <h1>Car List</h1>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Vehicle Number</th>
                        <th>CC</th>
                        <th>Capacity</th>
                        <th>Transmission</th>
                        <th>Price per Day</th>
                        <th>Status</th>
                        <th>Edit or Delete</th>
                    </tr>
                    <?php
                        include '../connect.php';
                        $result = mysqli_query($conn,"SELECT * FROM tbcar");
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr id='content'>";
                            echo "<td>" . $row['CarID'] . "</td>";
                            echo "<td>" . $row['CarName'] . "</td>";
                            echo "<td>" . $row['CarPlat'] . "</td>";
                            echo "<td>" . $row['CarCC'] . "</td>";
                            echo "<td>" . $row['Capacity'] . "</td>";
                            echo "<td>" . $row['CarTM'] . "</td>";;
                            echo "<td> Rp. ". number_format($row['Price'],2,',','.') . "</td>";
                            echo "<td>" . $row['RentStat'] . "</td>";
                            echo "<td id='button'> 
                            <a href='../edit/car.php?carid=".$row['CarID']."'><button>Edit</button></a>
                            <a href='../delete/deletecar.php?deleteid=".$row['CarID']."'><button>Delete</button></a>
                            </td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
                <div class="add-car">
                    <a href="../adminform/admincar.php">Add Car</a>
                    <a href="../adminpage.php">Back</a>
                </div>
            </div>
        </div>
    </body>
</html>