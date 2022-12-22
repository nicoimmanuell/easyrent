<DOCTYPE! html>
    <html>
        <head>
            <title>
                Bus Rental Page
            </title>
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
                    background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url('images/bus.jpg');
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-attachment: fixed;
                }
                .container {
                    display: flex;
                    justify-content: center;
                    margin: auto;
                    width: 90%;
                    padding: 20px;
                    top: 20%;
                    position: relative;
                }
                .content-wrap {
                    margin: 20px;
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
                label {
                    color: white;
                    text-align: left;
                }
                input {
                    margin: 10px;
                }
                textarea {
                    margin: 10px;
                    padding: 10px;
                    border-radius: 5px;
                    resize: none;
                }
                input[type="text"] {
                    width: 300px;
                    height: 40px;
                    padding: 10px;
                    border-radius: 5px;
                }
                ::placeholder {
                    font-weight: bold;
                }
                input[type="date"] {
                    padding: 5px;
                    border-radius: 5px;
                }
                input[type="radio"] {
                    color: white;
                }
                form {
                    margin: 20px;
                }
                .input-form{
                    text-align: center;
                }
                input[type="submit"] {
                    background-color: white;
                    margin-top: 20px;
                    width: 150px;
                    height: 40px;
                    border: none;
                    border-radius: 5px;
                    font-weight: bold;
                    font-size: 16px;
                }

            </style>
        </head>
        <body>
            <?php include 'navbar/navbar.html'?>
            <div class="container">
                <div class="content-wrap">
                    <div class="table-wrap">
                    <h1>Bus List</h1>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Vehicle Number</th>
                            <th>Capacity</th>
                            <th>Price per Day</th>
                            <th>Status</th>
                        </tr>
                        <?php
                            include 'connect.php';
                            $result = mysqli_query($conn,"SELECT * FROM tbbus");
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr id='content'>";
                                echo "<td>" . $row['BusID'] . "</td>";
                                echo "<td>" . $row['BusName'] . "</td>";
                                echo "<td>" . $row['BusPlat'] . "</td>";
                                echo "<td>" . $row['Capacity'] . "</td>";
                                echo "<td> Rp. ". number_format($row['Price'],2,',','.') . "</td>";
                                echo "<td>" . $row['RentStat'] . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                    </div>
                </div>
                <div class="content-wrap">
                    <div class="form-wrap">
                        <h1>Rental Form</h1>
                        <form action="" method="POST">
                            <div class="input">
                                <label for="nama">Name</label> <br>
                                <input type="text" name="name" id="nama" placeholder="Please input your name..." required>
                            </div>
                            <div class="input">
                                <label for="gender">Gender</label> <br>
                                <input type="radio" name="gender" id="gender" value="Male">
                                <label for="gender">Male</label>
                                <input type="radio" name="gender" id="gender" value="Female">
                                <label for="gender">Female</label>
                            </div>
                            <div class="input">
                                <label for="date">Date of Birth</label> <br>
                                <input type="date" name="bdate" id="bdate" max="2006-01-01" placeholder="Please input your birth date..." required>
                            </div>
                            <div class="input">
                                <label for="address">Address</label> <br>
                                <textarea name="address" id="address" cols="40" rows="7" placeholder="Please input your address..." required></textarea>
                            </div>
                            <div class="input">
                                <label for="nama">Phone Number</label> <br>
                                <input type="text" name="phone" id="phone" placeholder="Please input your phone number..." required>
                            </div>
                            <div class="input">
                                <label for="busid">Bus ID</label> <br>
                                <input type="text" name="busid" id="busid" placeholder="Please input bus ID..." required>
                            </div>
                            <div class="input">
                                <label for="rentdate">Rent Date</label> <br>
                                <input type="date" name="rentdate" id="rentdate" min="<?= date('Y-m-d'); ?>" placeholder="Please input your birth date..." required>
                            </div>
                            <div class="input">
                                <label for="returndate">Return Date</label> <br>
                                <input type="date" name="returndate" id="returndate" min="<?= date('Y-m-d'); ?>" placeholder="Please input your birth date..." required>
                            </div>
                            <div class="input-form">
                                <input type="Submit" name="submit" id="submit" value="Rent">
                            </div>
                        </form>
                        <?php
                            $rentvalid = false;
                            $idvalid = false;
                            $avail = false;
                            $nodupephone = true;
                            if(isset($_POST['submit'])){
                                $name = $_POST['name'];
                                $gender = $_POST['gender'];
                                if(empty($gender)){
                                    echo '<script>';
                                    echo 'alert("Please select your gender")';
                                    echo '</script>';
                                    die;
                                }
                                $bdate = $_POST['bdate'];
                                $address = $_POST['address'];
                                $phone = $_POST['phone'];
                                $resultphone = (mysqli_query($conn, "SELECT * FROM tbcustomer WHERE PhoneNumber = '$phone'"));
                                $row = mysqli_fetch_array($resultphone);
                                if ($row > 0){
                                    $nodupephone = false;
                                    if ($name != $row[1]){
                                        echo '<script>';
                                        echo 'alert("Please input name that registered with this phone number!")';
                                        echo '</script>';
                                        die;
                                    }
                                }
                                $busid = $_POST['busid'];
                                $rentdate = $_POST['rentdate'];
                                $returndate = $_POST['returndate'];
                                $date1 = new DateTime($rentdate);
                                $date2 = new DateTime($returndate);
                                $busname = null;
                                $busplat = null;
                                $daydiff = null;
                                $price = null;
                                $rentprice = null;
                                $rentavail = null;
                                $result = mysqli_query($conn, "SELECT BusID FROM tbbus WHERE BusID = '$busid'");
                                $row = mysqli_fetch_array($result);
                                if ($row > 0){
                                    $idvalid = true;
                                    $bus_sql = "SELECT BusID, BusName, BusPlat, Price, RentStat FROM tbbus WHERE BusID = '$busid'";
                                    $result= mysqli_query($conn, $bus_sql);
                                    $row = mysqli_fetch_array($result);
                                    $busname = $row[1];
                                    $busplat = $row[2];
                                    $price = $row[3];
                                    $rentavail = $row[4];
                                    if ($rentavail == 'AVAILABLE'){
                                        $avail = true;
                                    }
                                    else{
                                        echo '<script>';
                                        echo 'alert("Bus is not available!")';
                                        echo '</script>';
                                    }
                                }
                                else{
                                    echo '<script>';
                                    echo 'alert("Bus ID not founded!")';
                                    echo '</script>';
                                }
                                if ($returndate > $rentdate){
                                    $rentvalid = true;
                                }

                                else{
                                    echo '<script>';
                                    echo 'alert("Rent date must be earlier than return date!")';
                                    echo '</script>';
                                }
                                if(!empty($name) && !empty($gender) && !empty($bdate) && !empty($address) && !empty($phone) && !empty($busid) && !empty($rentdate) && !empty($returndate) && $idvalid && $rentvalid && $avail){
                                    $daydiff = abs($date1->diff($date2)->format("%r%a"));
                                    $rentprice = $price * $daydiff;
                                    $cust_sql = "INSERT INTO tbcustomer VALUES (NULL,'$name','$gender','$bdate','$address', '$phone')";
                                    $order_sql = "INSERT INTO tborder VALUES (NULL, '$name','$phone', '$busid','$busname','$busplat','$rentdate','$returndate','$rentprice')";
                                    $bus_sql = "UPDATE tbbus SET RentStat = 'NOT AVAILABLE' WHERE BusID = '$busid'";
                                    if ($nodupephone){
                                        mysqli_query($conn, $cust_sql);
                                    }
                                    mysqli_query($conn, $order_sql);
                                    mysqli_query($conn, $bus_sql);

                                    echo '<script>';
                                    echo 'alert("Rental successful!")
                                    window.location.replace("rentdetail.php")';
                                    echo '</script>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </body>
    </html>