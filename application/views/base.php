<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" >
<head>
	<title>NBOS</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <!-- Angular Material style sheet -->
	  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.9/angular-material.min.css">
	  <!-- Fonts -->
	  <!-- <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet"> -->
	  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <!-- Customs -->
	  <link rel="stylesheet" href="<?php echo base_url('assets/css/master.css'); ?>" media="screen" title="no title" charset="utf-8">
</head>
<body>
<body ng-app="inbos" layout="column" flex ng-cloak>
    <div class="side-menu" ui-view="header"></div>
    <div class="main-body" ui-view="main" flex></div>
</body>

	<!-- Angular Material requires Angular.js Libraries -->
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-animate.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-aria.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-messages.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-route.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-sanitize.js"></script>

	<!-- Angular Material Library -->
	<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.9/angular-material.min.js"></script>

	<!-- Angular UI Router -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.3.0/angular-ui-router.min.js"></script>

	<!-- Angular Moment -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-moment/0.10.1/angular-moment.min.js"></script>

	<!-- md-data-table -->
    <!-- style sheet -->
    <link href="<?php echo base_url('src/libs/angular-material-data-table/dist/md-data-table.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <!-- module -->
    <script type="text/javascript" src="<?php echo base_url('src/libs/angular-material-data-table/dist/md-data-table.min.js'); ?>"></script>

	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

	<!-- Your application bootstrap  -->
    <script src="<?php echo base_url('assets/angular/app.min.js'); ?>"></script>
	<script src="<?php echo base_url('src/libs/base64/angular-base64-upload.js'); ?>"></script>



</html>
