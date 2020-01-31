<?php
    //Check if page title has been set and if not set a default.
    if(!isset($page_title)){
      $page_title = "Comunicación, diseño y estrategias para la cultura y el arte.";
    }
?>

<!doctype html>
<html class="no-js" lang="es">

  <head>
      <meta charset="utf-8">
      <meta name="language" content="es">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title><?php echo h($page_title); ?> - la baula</title>
      <meta name="description" content="Here a description of your website.">
      <meta name="keywords" content="Keyword 1, Keyword 2">
      <meta name="author" content="La baula www.labaula.net">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="robots" content="all">
      <meta name="theme-color" content="#2d2d2d">

      <!-- CSS -->
      <link rel="stylesheet" type="text/css" href="<?php echo url_for("_styles/normalize.min.css") ?>" >
      <link rel="stylesheet" type="text/css" href="<?php echo url_for("_styles/main.css") ?>" >

      <!-- Scripts -->
      <script type="text/javascript" src="<?php echo url_for("_scripts/vendor/tweenmax.min.js")?>"></script>
      <script type="text/javascript" src="<?php echo url_for("_scripts/vendor/jquery.min.js") ?>"></script>
  </head>

  <body id="body">
    <!--[if IE]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!--  Nav -->
    <nav id="main-menu">
      <ul>
        <li> <a href="<?php echo url_for("index.php")?>">Home</a> </li>
        <li><a href="<?php echo url_for("admin/index.php")?>">Admin login</a></li>
      </ul>
    </nav>
    <!-- Nav ends -->

    <!-- Main container -->
    <div id="main-container">