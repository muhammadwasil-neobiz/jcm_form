<?php

	session_start();

	if(!isset($_SESSION['emp_user_id'])){

		header('location:login.php');

	}

?>
<!doctype html>
<html lang="en">

<head>
	<title>Preview Table</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!--link rel="stylesheet" href="assets/css/jquery-ui.theme.css"-->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body style="background-color: white;">
    <div class="container-fluid" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">JCMYearNew</th>
                            <th scope="col">JCMCodeNew</th>
                            <th scope="col">JCMCode</th>
                            <th scope="col">JCMDate</th>
                            <th scope="col">JCMRemarks</th>
                            <th scope="col">JCMSaveUser</th>
                            <th scope="col">JCMSaveDate</th>
                            <th scope="col">JCMUpdateUser</th>
                            <th scope="col">JCMUpdateDate</th>
                            <th scope="col">JCMCancel</th>
                            <th scope="col">JCMYourReference</th>
                            <th scope="col">JCMShiftIncharge</th>
                            <th scope="col">JCMShift</th>
                            <!--th scope="col">JCMPoNo</th>
                            <th scope="col">JCMPoNoYear</th>
                            <th scope="col">JCMTypeNew</th>
                            <th scope="col">JcDProduct</th>
                            <th scope="col">JcDQty</th>
                            <th scope="col">JcDSerialNo</th>
                            <th scope="col">JcDMachine</th-->
                        </tr>
                    </thead>
                    <tbody id="data-table">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){

            fetch_data()

            function fetch_data(){
                $.ajax(
                    {
                        url:'fetch_data.php',
                        method: 'POST',
                        data:{
                            rows:'1000',
                            start_date: '',
                            end_date: '',
                            page_no: ''
                        },
                        success: function(data){
                            $('#data-table').html(data)
                        }
                    }
                )
            }

        })
    </script>
</body>