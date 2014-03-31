<?php
session_start();
//echo "hello";
//echo $_SESSION['userID'];
// $userID = $_SESSION['userID'];
// if(!isset($_SESSION['userID'])){

// $userID = 1;
// //echo $userID;
// }

if(isset($_POST['search'])){
  $search = $_POST['search'];
}
if(isset($_POST['field'])){
  $field = $_POST['field'];
}
if(isset($_GET['search'])){
  $search = $_GET['search'];
}
if(isset($_GET['field'])){
  $field = $_GET['field'];
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
      <a class="navbar-brand" href="/index.php">Crowd Chef</a>
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

      
                    if(isset($_POST['complexQuery'])){
                        $opts = array('http' =>
                            array(
                                'method' => 'POST',
                                'header' => 'Content-type: application/x-www-form-urlencoded',
                                'content' => $_POST['complexQuery']
                            )
                        );
                        $context = stream_context_create($opts);
                        $response = file_get_contents('http://crowdchef.herokuapp.com/complexSearch', false, $context);
                    }
                    else
                        $response = file_get_contents('http://crowdchef.herokuapp.com/search/' . $search . '/' . $field);

        //suggestTerm
      //  $response = file_get_contents('http://crowdchef.herokuapp.com/suggestTerm/'.$_POST['search'].'/'.$_POST['field']);

//echo"response";
    // print_r($response);
        $obj = json_decode($response);
    //    echo "onject";
      //  print_r($obj);

        ?>

        <div class="col-xs-6 col-xs-offset-3">
        <!--   <div class="alert alert-warning">Did you mean:</div> -->
          <?php 
          if(count($obj->{'result'}) == 0){
            $helpvariable = true;
          }
          if(count($obj->{'result'}) == 0 && $helpvariable){
          echo "<div class='alert alert-warning'>Did you mean:";
          echo"<br />";
            
 $response2 = file_get_contents('http://crowdchef.herokuapp.com/checkTerm/'.$search.'/'.$field);
    $obj2= json_decode($response2);
    //print_r($obj2->{'result'});
//  echo "";
      foreach ($obj2->{'result'} as $value) {
        echo "<a href=/search.php?search=".$value."&field=".$field.">".$value."</a><br />";
      }
      $helpvariable = false;
echo "</div>";
    //echo "did you mean ";
  }
  ?>
        <div class="panel panel-success">
       <!-- Default panel contents -->
        <div class="panel-heading">List of recipes</div>
        <table class="table " >
            <tr>
              <th>Title</th>
            </tr>
            <?php 


            // if(count($obj->{'result'}) == 0)
            // {
            //     echo "ok";  
            // }
            foreach($obj->{'result'} as $valuee){
              // foreach ($valuee as  $value1){
                //print_r($valuee);

                //$res = $value1->{'rating'};

              echo '<tr>
              <td>';
              echo "<a href='/showRecipe.php?id=".$valuee->{'id'}."'>".$valuee->{'name'}."</a>";
            echo'</td>';

//             print_r($value1->{'rating'}->value);
// echo "string";
//              print_r($res->value);
             // if($res->value == 5){
             //   echo '<fieldset class="rating1"><input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Pretty good">5 stars</label>
             //  <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
             //  <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
             //  <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
             //  <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Bad">1 star</label></fieldset>';
             
             // }
             // elseif($res->value == 4){

             //  echo '<fieldset class="rating1"><input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
             //  <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
             //  <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
             //  <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Bad">1 star</label></fieldset>';
             // }
             // elseif($res->value == 3){
             //  echo '<fieldset class="rating1"><input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
             //  <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
             //  <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Bad">1 star</label></fieldset>';
             // }
             //  elseif($res->value == 2){
             //  echo '<fieldset class="rating1"><input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
             //  <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Bad">1 star</label></fieldset>';
             // }
             //  elseif($res->value == 1){
             //  echo '<fieldset class="rating1"><input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Bad">1 star</label></fieldset>';
             // }
             // else{
             //  echo'No ranting available';
             // }
             echo'</tr>';
              // }
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
