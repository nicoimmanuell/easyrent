<DOCTYPE! html>
    <html>
        <head>
            <title>Easy Rent</title>
            <style>
                @keyframes fade { 
                    0% {
                        opacity: 0;
                    }

                    100% {
                        opacity: 1;
                    }
                }
                html, body {
                    animation: fade 1s;
                    width: 100%;
                    height: 100%;
                    margin: 0;
                    scroll-behavior: smooth;
                }
                .content-wrap{
                    display: block;
                }
                .landing-page{
                    width: 100%;
                    height: 100%;
                    background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)),url('images/landingpage.jpg');
                    background-repeat: no-repeat;
                    background-size: 100%;
                    background-position: fixed;
                }
                .menu-page{
                    width: 100%;
                    height: 100%;
                    background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),url('images/menupage.jpg');
                    background-repeat: no-repeat;
                    background-size: 100%;
                    background-position: fixed;
                }
                .banner{
                    width: 500px;
                    margin: auto;
                    position: relative;
                    top: 40%;
                    left: 17%;
                }
                h1 {
                    justify-content: left;
                    color: white;
                    font-family: 'Gotham';
                    font-size: 75px;
                    margin: 0;
                }
                p {
                    font-family: 'Verdana';
                    color: white;
                    padding-left: 3px;
                }
                button {
                    padding: 10px;
                    width: 100px;
                    border-radius: 10px;
                    font-family: 'Calibri';
                    font-weight: bold;
                    color: black;
                    padding-left: 3px;
                }
                button:hover {
                    transform: scale(1.1);
                    transition: all .2s ease-in-out;
                    border: 1px solid darkblue;
                }
                button a {
                    text-decoration: none;
                    color: black;
                }
                .menu-wrap{
                    margin: auto;
                    width: 1000px;
                    padding: 20px;
                    top: 20%;
                    position: relative;
                }
                .menu-content{
                    display:flex;
                    justify-content: center;
                }
                .menu{
                    filter: brightness(85%);
                    width: 400px;
                    height: 200px;
                    margin: 50px 20px 50px 20px;
                }
                .menu, img{
                    border-radius: 10px;
                }
                h2 {
                    font-family: 'Gotham';
                    color: white;
                    font-size: 20px;
                }
                h3 {
                    font-family: 'Arial';
                    margin: 0px 0px 0px 0px;
                    color: white;
                    font-size: 12px;
                }
                img {
                    width: 100%;
                    height: 100%;
                }
                .desc {
                    width: 100%;
                    color: white;
                    opacity: 0;
                    text-align: center;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    font-size: 22px;
                    font-family: 'Gotham';
                }

                .menu:hover .desc{
                    transition: all .2s ease-in-out;
                    opacity: 1;
                }
                .menu:hover img{
                    transition: all .2s ease-in-out;
                    filter: brightness(50%);
                    transform: scale(1.05);
                }
            </style>
        </head>
        <body>
            <?php include 'navbar/navbar.html';?>
            <div class="container">
                <div class='content-wrap'>
                    <div class='landing-page' id='landing-page'>
                        <div class='banner'>
                            <h1>EasyRent</h1>
                            <p>Your solution for car and motorcycle rental needs</p>
                            <a href="#menu-page"><button>Get Started</button></a>
                        </div>
                    </div>
                </div>
                <div class='content-wrap'>
                    <div class='menu-page' id="menu-page">
                        <div class="menu-wrap">
                            <h2>Welcome to EasyRent!</h2>
                            <h3>Please start by choosing the vehicle type that you want to rent</h3>
                            <div class='menu-content'>
                                <div class="menu">
                                    <a href="motorcycle.php">
                                        <img src="images/motorcycle.jpg" alt="">
                                        <div class="desc">Motorcycle</div>
                                    </a>
                                </div>
                                <div class="menu">
                                    <a href="car.php">
                                        <img src="images/car.jpeg" alt="">
                                        <div class="desc">Car</div>
                                    </a>
                                </div>
                                <div class="menu">
                                    <a href="bus.php">
                                        <img src="images/bus.jpg" alt="">
                                        <div class="desc">Bus</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
<?php

?>