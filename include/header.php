<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost/career-hunt/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/img/favicon.png" type="image/png" sizes="16x16">
    <meta property="og:image" content="assets/img/seo-icon.jpg" />
    <title>Career Hunt</title>
    <link rel="stylesheet" href="assets/css/custom-bootstrap-margin-padding.css">
    <link rel="stylesheet" href="assets/css/utility-classes.css">
    <link rel="stylesheet" href="assets/css/main.css?var=1.33">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/lightbox/jquery.lightbox.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <!-- Google Analytics Tags -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WMW84VFGJS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-WMW84VFGJS');
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HNE6BJ3VPM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-HNE6BJ3VPM');
    </script>
</head>

<body class="gray-light-bg">

    <!-- Optional Preloader -->
    <!--
    <div id="preloader">
        <div class="preloader-wrap">
            <div class="thecube">
                <div class="cube c1"></div>
                <div class="cube c2"></div>
                <div class="cube c4"></div>
                <div class="cube c3"></div>
            </div>
        </div>
    </div>
    -->

    <!-- Header Section Start -->
    <a href="#Modal_from" class="side_btn" data-toggle="modal" data-target="#Modal_from">Apply Here</a>

    <header class="header">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?php echo SITE_URL; ?>">
                    <img src="assets/img/footer-logo.png" alt="logo" class="img-fluid" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>

                <div class="collapse navbar-collapse h-auto" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto menu">
                        <li><a href="<?php echo SITE_URL; ?>">HOME</a></li>
                        <li><a href="about.php">ABOUT</a></li>

                        <li><a href="#" class="dropdown-toggle">UNIVERSITIES</a>
                            <ul class="sub-menu">
                                <?php
                                $schoolarray = runloopQuery("select * from school order by school_id desc limit 0,20");
                                foreach ($schoolarray as $school) { ?>
                                    <li><a href="college-list/<?php echo $school['slug']; ?>">Institute of
                                            <?php echo $school['school_name']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>

                        <li><a href="news.php">NEWS</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                    </ul>

                    <!-- Right Side (Login/Profile/Logout Buttons) -->
                    <ul class="navbar-nav ml-auto menu">
                        <?php if (!empty($_SESSION['student_id'])) { ?>
                            <li>
                                <a href="profile.php"
                                    class="btn-warning mt-2 pt-0 pb-0 pl-15 pr-15 btn-rounded text-dark font-18 glow">View
                                    Profile</a>

                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="#Modal_from"
                                    class="btn-warning mt-2 pt-0 pb-0 pl-15 pr-15 btn-rounded text-dark font-18 glow"
                                    data-toggle="modal" data-target="#Modal_from">Apply Here</a>
                            </li>
                        <?php } ?>
                        <?php

                        if (isset($_SESSION['userid'])) {
                            echo '<li>
                                <a href="logout.php" class="btn-danger mt-2 pt-0 pb-0 pl-15 pr-15 btn-rounded text-white font-18 glow ml-2">Logout</a>
                            </li>';

                        } else {
                            echo '<li>
                                <a href="./signinform.php" class="btn-danger mt-2 pt-0 pb-0 pl-15 pr-15 btn-rounded text-white font-18 glow ml-2">Login</a>
                            </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header Section End -->