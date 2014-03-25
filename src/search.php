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
          <a class="btn" href="addRecipe.php">Add a recipe</a>
          <a class="btn" href="#">Just for you</a>
          <a class="btn" href="/play.php">Play</a>
          <a class="btn" href="#">Profile</a>
		</div>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	<div class="row">
		<div class="col-md-12 column">
        <?php 
        // $postdata = array(
        //   'field' => $_POST['field'],
        //   'query' => $_POST['search']

        //   );



        // $opts = array( 'http' => 
        //   array (
        //     'method' => 'POST',
        //     'header' => 'Content-type: application/x-www-form-urlencoded',
        //     'content' => json_encode($postdata)
        //     )

        //   );
        // $context = stream_context_create($opts);

        $response = file_get_contents('http://crowdchef.herokuapp.com/search/'.$_POST['search'].'/'.$_POST['field']);
       // print_r($response);
        $obj = json_decode($response);
     
        //echo $obj[0]->{'name'};
      //  print_r($obj);

        //print_r($obj);
        //We get the name of the recipe and the name of the ingredients// the old way
        // foreach($obj as $value) {
        //   foreach($value as $valName => $val){
        //     if($valName == 'name'){
        //       //print_r($val);
        //       echo $val;
        //     }
        //     if($valName == 'ingredients'){
        //      $obj2 = $val;
        //      foreach($obj2 as $key =>$ingred ) {
        //         foreach($ingred as $keyIng => $ingredVal) {
        //           if($keyIng == 'name') {
        //             print_r($ingredVal);
        //           }
        //          }
        //       }
        //     }
        //   }
        // }

        ?>
        <div class="col-xs-6 col-xs-offset-3">
        <div class="panel panel-success">
       <!-- Default panel contents -->
        <div class="panel-heading">List of recipes</div>
        <table class="table " >
            <tr>
              <th>Title</th>
              <th>Rank</th>
            </tr>
            <?php 
            foreach($obj as $value){
              foreach ($value as  $value1){
              echo '<tr>
              <td>';
              echo "<a href='showRecipe.php?id=".$value1->{'id'}."'>".$value1->{'name'}."</a>";
            echo'</td>
              <td> 
              </td>
            </tr>';
              }
            }
            ?>
                      


                              
                        
                       
           <endforeach;>
                  <endforeach;>
            
        </table>
      </div>
    </div>
      </div>
		</div>
	</div>
</div>
</body>
</html>
