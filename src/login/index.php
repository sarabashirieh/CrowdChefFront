<?php
session_start();
echo "hello";
echo $_SESSION['userID'];
$userID = $_SESSION['userID'];
if(!isset($_SESSION['userID'])){

$userID = 1;
echo $userID;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	


  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

 <link href="css/main.css" rel="stylesheet"></link>
<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script><!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	
	
	
</head>

<body>

<div class="container" id="container-fluid">
	<nav class="navbar navbar-default" role="navigation" >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/index.html">Crowd Chef</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <!--     <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
      </ul> -->
      <ul class="nav navbar-nav navbar-right">
      	 <div class="button-group" id="button-nav">
          <a class="btn" href="#">Just for you</a>
          <a class="btn" href="/play.php">Play</a>
          <a class="btn" href="#">Profile</a>
		</div>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	<div class="container">
	<div class="row clearfix">
		<div class="col-xs-4 col-xs-offset-3" id="login-form" >


       <?php if (isset( $_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password1'])) { 
       // echo "string";
        print_r($username = $_POST['username']);
        print_r($pass = $_POST['password1']);
          echo"I'm recently added to DB";
        $response = file_get_contents('http://crowdchef.herokuapp.com/registerUser/'.$_POST['username'].'/'.$_POST['password1']);

      // $responseUserID= file_get_contents('http://crowdchef.herokuapp.com/checkUser/'.$username.'/'.$pass);
       print_r($response);
     //  echo "response2";
       //print_r($responseUserID);
    //   header('Location: http://localhost/index.html');
   }
      ?>


<form role="form" method="POST" action="/index.php">
        Welcome to crowdchef, please login to continue
<div class="form-group">
           <label for="exampleInputEmail1">Username</label><input type="email" class="form-control" id="exampleInputEmail1" name="username"/>
        </div>
        <div class="form-group">
           <label for="exampleInputPassword1">Password</label><input type="password" class="form-control" id="exampleInputPassword1" name="password" />
        </div>
        <div class="checkbox">
        </div> 
        <button type="submit" class="btn btn-success" name='login'>Login</button>
      </form>


       
      
<!-- <form role="form" method="POST" action="login.php">
        Welcome to crowdchef, please login to continue..
        <div class="form-group">
           <label for="exampleInputEmail1">Username</label><input type="email" class="form-control" id="exampleInputEmail1" name="username"/>
        </div>
        <div class="form-group">
           <label for="exampleInputPassword1">Password</label><input type="password" class="form-control" id="exampleInputPassword1" name="password" />
        </div>
        <div class="checkbox">
        </div> <button type="submit" class="btn btn-success">Login</button>
      </form> -->
		</div>
	</div>
</div>
</div>
</body>
</html>













