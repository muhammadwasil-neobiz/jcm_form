<?php

    include_once('./db.php');

    session_start();

    $message = '';

    if(isset($_SESSION['emp_user_id'])){

        header('location:index.php');

    }

    if(isset($_POST['login'])){

        $user_id = $_POST['emp_user_id'];

        $password = $_POST['password'];

        echo $user_id.$password;
        
        $query = "SELECT * FROM dbo.UserInfo WHERE EMPUSERID = :user_id";

        $statement = $conn->prepare($query);

        $statement->execute(array(
            ':user_id'=>$user_id
        ));
        
        $result = $statement->fetchAll();

        $count = count($result);

        echo $count;

        if($count >= 1){

            foreach($result as $row){

                $subquery = "SELECT * FROM dbo.UserInfo WHERE EMPUSERID = :user_id AND emploginpassword = :password";

                $subStatement = $conn->prepare($subquery);

                $subStatement->execute(array(

                    ':user_id'=>$row['EMPUSERID'],

                    ':password'=>$_POST['password']
                
                ));

                $output = $subStatement->fetchAll();

                foreach($output as $ans)
                {

                    if($subStatement->execute()){

                        $_SESSION['emp_user_id'] = $row['EMPUSERID'];

                        $_SESSION['emp_name'] = $row['EmpName'];

                        $message = '<div class="alert alert-success" role="alert">Logging In!</div>';

                        header('location:index.php');

                    }

                    else{

                        $message = '<div class="alert alert-danger" role="alert">Wrong Password!</div>';
    
                    }

                }

            }

        }

        else if($count == 0){

            $message = '<div class="alert alert-danger" role="alert">Wrong Password!</div>';

        }

    }
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"></div>
                                <p class="lead">Login to your account</p>
                                <?php echo $message; ?>
							</div>
							<form class="form-auth-small" action="login.php" method="post">
								<div class="form-group">
									<label for="user_id" class="control-label sr-only">Email</label>
									<input type="text" name="emp_user_id" class="form-control" id="emp_user_id" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="password" class="control-label sr-only">Password</label>
									<input type="password" name="password" class="form-control" id="password" placeholder="Password">
								</div>
								<!--div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div-->
								<input type="submit" name="login" id="login" class="btn btn-primary btn-lg btn-block" value="Login"></input>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Nova Plast</h1>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
<script>
</script>
</html>
