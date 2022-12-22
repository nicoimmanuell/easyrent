<html>
    <head>
        <title>Motorcycle List</title>
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
                    background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url('../images/motorcycle.jpg');
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
                .add-motor a{
                    background-color: rgba(255,255,255,0.1);
                    padding: 10px;
                    margin: 10px;
                    border-radius: 5px;
                    color: white;
                    font-weight: bold;
                    text-decoration: none; 
                }
                .add-motor a:hover{
                    background-color: rgba(255,255,255,0.6);
                    text-decoration: underline;
                }
        </style>
    </head>
    <body>
        <?php include '../navbar/adminnav.html';?>
        <div class="content-wrap">
            <div class="table-wrap">
                <h1>Motorcycle List</h1>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Vehicle Number</th>
                        <th>CC</th>
                        <th>Transmission</th>
                        <th>Rent Price per Day</th>
                        <th>Status</th>
                        <th>Edit or Delete</th>
                    </tr>
                    <?php
                        include '../connect.php';
                        $result = mysqli_query($conn,"SELECT * FROM tbmotorcycle");
                        $count= 0;
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr id='content'>";
                            echo "<td>" . $row['MotorID'] . "</td>";
                            echo "<td>" . $row['MotorName'] . "</td>";
                            echo "<td>" . $row['MotorPlat'] . "</td>";
                            echo "<td>" . $row['MotorCC'] . "</td>";
                            echo "<td>" . $row['MotorTM'] . "</td>";
                            echo "<td> Rp. ". number_format($row['Price'],2,',','.') . "</td>";
                            echo "<td>" . $row['RentStat'] . "</td>";
                            echo "<td id='button'> 
                            <a href='../edit/motor.php?motorid=".$row['MotorID']."'><button>Edit</button></a>
                            <a href='../delete/deletemotor.php?deleteid=".$row['MotorID']."'><button>Delete</button></a>
                            </td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
                <div class="add-motor">
                <a href="../adminform/adminmotor.php">Add Motorcycle</a>
                <a href="../adminpage.php">Back</a>
                </div>
            </div>
        </div>
    </body>
</html>
