<?php
ob_start(); // needs to be added here

include('config.ini.php');

$cn = new Configuration();
$conn = $cn->getConnection();
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>

    <title>Welcome to dot net guy</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Oswald Font -->

    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="css/tooltipster.css" />

    <!-- home slider-->

    <link href="css/pgwslider.css" rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link href="style.css" rel="stylesheet" media="screen">

    <link href="responsive.css" rel="stylesheet" media="screen">

</head>



<body>



    <section id="header_area">

        <div class="wrapper header">

            <div class="clearfix header_top">

                <div class="clearfix logo floatleft">

                    <a href="index.php">
                        <h1><span>Dot Net</span> Guy (Humayoun)</h1>
                    </a>

                </div>

                <div class="clearfix search floatright">

                    <form>

                        <input type="text" placeholder="Search" />

                        <input type="submit" />

                    </form>

                </div>

            </div>

            <div class="header_bottom">

                <nav>

                    <ul id="nav">

                        <li><a href="index.php">Home</a></li>
                        <?php            
            			$sql = "SELECT categoryid, category_name FROM category";
            			$result = $conn->query($sql);
            			if ($result->num_rows > 0) {
                			// output data of each row
                			while($row = $result->fetch_assoc()) {
								echo "<li><a href='index.php?cat={$row['category_name']}'>{$row['category_name']}</a></li>";
                			}
            			}
            			?>
                        

                        <!-- <li id="dropdown"><a href="">Drop Down</a>

								<ul>

									<li><a href="">Home</a></li>

									<li><a href="">Category</a></li>

									<li><a href="">Category</a></li>

									<li><a href="">Category</a></li>

									<li><a href="">Category</a></li>

									<li><a href="">Category</a></li>

									<li><a href="">Category</a></li>

									<li><a href="">Category</a></li>

									<li><a href="">Category</a></li>

									<li><a href="">About us</a></li>

									<li><a href="">Contact us</a></li>

								</ul>

							</li> -->

                        <li><a href="works.php">About Me</a></li>

                        <li><a href="contact.php">Contact</a></li>

                    </ul>

                </nav>

            </div>

        </div>

    </section>



    <section id="content_area">

        <div class="clearfix wrapper main_content_area">



            <div class="clearfix main_content floatleft">