<?php
session_start();

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
<script src="js/main.js" type="text/javascript"></script>
	
	
	
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

	<div class="row">
		    <div class="col-md-6 col-md-offset-3">
       <!-- 
       {"id":11,"name":"Regular donner","description":"Alleen vlees","tags":"donner,kebap,vlees","directions":"Just ask the Turkish guy","createTime":"Mar 19, 2014 6:11:33 PM","ingredients":[{"id":43,"name":"beef","quantity":"200 g","ord":1},{"id":44,"name":"hot sauce","description":"not too hot","quantity":"10 mL","ord":2}]}],"successful":true}
        -->
        <!-- {"result":{"id":35,"name":"Perfect","description":"pasta koken, kip koken, alles mengen!","tags":"lekker, chiken","directions":"Milano","createTime":"Mar 24, 2014 5:00:54 PM","ingredients":[{"id":49,"name":"chicken","quantity":"200 gr"},{"id":50,"name":"pasta","quantity":"400 gr"}],"rating":2.5,"createUser":":sarah"},"successful":true} -->
       <!-- begin form -->
        <form role="form" method="POST" action="/addRecipe.php" id="fancyform">
          
          <div class="form-group">
            <label for="recipeName">Recipe title</label>
            <input type="text" class="form-control" id="recipeName" name="recipe-name" placeholder="Enter recipe title">
          </div>
          <div class="form-group">
            <label for="description">Recipe Description</label>
            <textarea type="text" class="form-control" id="description" name="recipe-description" placeholder="Enter recipe description">
            </textarea>
          </div>
             <div class="control-group" id="fields">
            <label class="control-label" for="field1">Ingredients</label>
              <div class="form-group form-inline" id="field" name="ingred">
                <input type="text" class="form-control ingredName"  placeholder="Name"><input type="text" class="form-control ingredQuantity" placeholder="Quantity"><input type="text" class="form-control ingredDesciption" placeholder="Description" >
              </div>
              <button id="b1" class="btn btn-info add pull-right" type="button">+</button>
            </div>
            <div class="form-group">
            <label for="description">Recipe tags</label>
            <input type="text" class="form-control" id="recipe-tags" name="recipe-tags" placeholder="Enter recipe tags">
          </div>
            <div class="form-group">
            <label for="description">Direction</label>
            <textarea type="text" class="form-control" id="recipe-direction" name="recipe-direction">
            </textarea>
          </div>
            <input type="hidden" class="form-control" id="user-id" name="user-id" value='12'>
          <button type="submit" class="btn btn-success pull-right" name="submit">Submit</button>
          </div>
        
    </form>
      <!-- end form -->
             <?php 
           if ( isset( $_POST['submit'])){ 
            //echo "hello";
            // print_r($_POST['recipe-name']);
            //  print_r($_POST['recipe-description']);
            //   print_r($_POST['recipe-tags']);
            //    print_r($_POST['recipe-direction']);



    

        $postdata = array(
          'name' => $_POST['recipe-name'],
          //'description' => $_POST['search'],
          'description' => $_POST['recipe-description'],
          'tags' => $_POST['recipe-tags'],
          'directions' => $_POST['recipe-direction'],
            'ingredients' => array(
              array(
                'name' => 'chicken',
              'quantity' => '200 gr'
                ),
              array(
                 'name' => 'pasta',
                  'quantity' => '400 gr'
                
              )),
          'userId' => '5'
          );
        $opts = array( 'http' => 
          array(
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' =>json_encode($postdata)
            )
          );
       $context = stream_context_create($opts);
       $result = file_get_contents('http://crowdchef.herokuapp.com/addRecipe', false, $context);

       // $obj = json_decode($response);
  
        //echo $obj[0]->{'name'};
      print_r( $opts);
      echo"result:";
       print_r( $result);

}
        ?> 
      </div>
		</div>
	</div>
</div>
</body>
</html>
