 <?php 
 session_start();

if(isset($_POST['login'])){
    
    echo $username= $_POST['username'];
      echo $pass= $_POST['password'];
       $response = file_get_contents('http://crowdchef.herokuapp.com/checkUser/'.$username.'/'.$pass);
       $obj = json_decode($response);
print_r($obj);
  echo $userID=$obj->result;
  echo "string";
$_SESSION['userID'] = $userID;
if(isset($_SESSION['userID'])){
echo "I should give userID";
  echo $_SESSION['userID'];
}


      //echo "hier I am";
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

<body id="main-body">

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
      <a class="navbar-brand" href="/index.php">Crowd Chef</a>
    </div>
      <?php

  ?>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <!--     <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
      </ul> -->

      <ul class="nav navbar-nav navbar-right">
      	 <div class="button-group" id="button-nav">
	       <a class="btn btn-success btn-sm" href="register/index.php">Sign up</a>
           <a class="btn btn-info btn-sm" href="login/index.php">Login</a>
		</div>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	<div class="row">
		<div class="col-md-12 column">
			<div class="jumbotron" id="main-jumbotron">
				<h1 class = "text-center" style="color:white">
					Crowd Chef
				</h1>
				<p class = "text-center" style="color:white">
					Share your unique recipes and become a famous chef!
				</p>
				<div id="main-search">
					 <div class="col-xs-9 col-xs-offset-3" >
            <form action="/search.php" method="POST" class="form-inline">
	    			  	<input type="search"  placeholder="Search recipes" name="search" class="form-control">
	    			    <select class="form-control" name="field">
                  <option value="name">Title</option>
                  <option value="description">Description</option>
                  <option value="tag">Tag</option>
                  <option value="ingredient">Ingredents</option>
              </select>
             <input type="submit" class="btn btn-success" href="search.php" id="search-rec" value=" Search" />
</form>

  </div>  

    			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
