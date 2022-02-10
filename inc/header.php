<!DOCTYPE html>

<html>
	<head>
        <!--use for dynamic title.-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <!-- <script src="js/interact.min.js.map"></script> -->
        <title>AI DOM</title>
        <link rel="icon" href="images/hero-logo.png" type="image/icon type">
        <link href="css/style.css" rel="stylesheet">
		<style type="text/css">
			/*demo page css*/			
        </style>       
	</head>
    <body>
    <button onclick="GoToTop()" id="backtotop" title="Go to top"><i class="fas fa-arrow-alt-circle-up"></i></button>
    <div id="container">
        <div id="wrapper">
            <div id="header" class="bg-white">
                <div class="header-content flex flex-between">
                    <div class="company-info">
                        <a href="index" class="company-link">
                            <img src="images/hero-logo.png" class="company-logo" width="70px"> <span>AI DOM</span>
                        </a>
                    </div>
                    <div id="main-nav">
                        <button class="mobile-icon btn btn-primary" onclick="myFunction()"><i class="fas fa-bars"></i></button>
                        <div class="topnav" id="myTopnav">
                            <ul>
                                <li><a href="demo-report">Demo</a></li>
                                <li><a href="about-us">About Us</a></li>
                                <li><a href="team">Team</a></li>
                                <li><a href="networking">Networking</a></li>
                                <!-- <li><a href="newsletter">News</a></li> -->
                                <li class="desktop">
                                    <a href="contact" class="btn btn-primary">Contact Us</a>
                                </li>
                                <li class="mobile-link"><a href="contact">Contact Us</a></li>
                                <li class="icon"></li>
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>