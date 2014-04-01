<?php
session_start();
//echo "hello";
//echo $_SESSION['userID'];

if (!isset($_SESSION['userID'])) {

    $userID = 1;
//echo $userID;
}
else{
    $userID = $_SESSION['userID'];
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
                    // $response = file_get_contents('http://145.94.44.127:8080/CrowdChef/search/'.$_POST['search'].'/'.$_POST['field']);
                    // $obj = json_decode($response);
                    // echo $obj[0]->{'name'};
                    $id = htmlspecialchars($_GET["id"]);
                    $response = file_get_contents('http://crowdchef.herokuapp.com/getRecipeDetails/' . $id);
                    //decode Json
                    $obj = json_decode($response);
                    //get object from stdObj
                    $recipeObj = $obj->result;

                    //Get all variables from recipe
                    $recipeID = $recipeObj->{'id'};
                    $recipeName = $recipeObj->{'name'};
                    $recipeDescription = $recipeObj->{'description'};
                    $tags = $recipeObj->{'tags'};
                    $directions = $recipeObj->{'directions'};
                    $ingredients = $recipeObj->{'ingredients'};
                    $createUser = $recipeObj->{'createUser'};
                    $rateVotes = $recipeObj->{'rating'}->votes;
                    $rateValue = $recipeObj->{'rating'}->value;
                    $imgUrl = $recipeObj->{'imageUrl'};
                    $rateVal = $recipeObj->{'rating'}->value;
                    $taste = $recipeObj->{'tasteScore'};
                    //echo "st";
                    //echo $rateVal;
                    //echo "hello";
                    //print_r($imgUrl);
                    ?>
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-success">
                            <div class="panel-heading">  	
                                <h3 class="panel-title"><? echo $recipeName; ?> by <?
                    echo $createUser;

//echo $rateVal;
                    // echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                    ?></h3> 

                            </div>
                            <div class="panel-body">
                                    <?
                                    echo '<img src=' . $imgUrl . '>';
                                    ?>
                                <p class="lead">Ingredients:</p><p> <?
                                    if ($ingredients !== NULL) {
                                        foreach ($ingredients as $ingred) {
                                            //print_r($ingredients);
                                            echo "<p>";
                                            $ingredID = $ingred->{'id'};
                                            echo $ingredName = $ingred->{'name'};
                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                                            echo $ingredQuantity = $ingred->{'quantity'};
                                            if (property_exists ( $ingred , 'description')){
                                                $ingredDescription = $ingred->{'description'};
                                                if ($ingredDescription) {
                                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                                                    echo $ingredDescription;
                                                }
                                            }
                                            echo "<br>";
                                        }
                                    }
                                    ?> </p>
                                <hr>
                                <p class="lead">	Description:</p><p> <? echo $recipeDescription; ?> </p>
                                <hr>
                                <p class="lead">Directions:</p><p><? echo $directions; ?></p>
                                <hr>
                                <p class="lead"> Taste:</p>
                                <div style="float:left; line-height: 25px">
                                    Sweet<br/>
                                    Sour<br/>
                                    Spicy<br/>
                                    Salty<br/>
                                    Savory<br/>
                                </div>
                                <div style="width:80%; margin-left:20%">
                                
                                <div  class="progress" style="margin-bottom:5px; ">
                                    <div id="sweet-progress" class="progress-bar" style="background-color:#E483BC; width: <? echo $taste->{'sweet'}/5*100; ?>%;"></div>
                                </div>
                                
                                <div  class="progress" style="margin-bottom:5px; ">
                                    <div id="sour-progress" class="progress-bar" style="background-color:rgb(93, 171, 93); width: <? echo $taste->{'sour'}/5*100; ?>%;"></div>
                                </div>
                                
                                <div  class="progress" style="margin-bottom:5px; ">
                                    <div id="sour-progress" class="progress-bar" style="background-color:rgb(212, 87, 87); width: <? echo $taste->{'spicy'}/5*100; ?>%;"></div>
                                </div>
                                
                                <div  class="progress" style="margin-bottom:5px; ">
                                    <div id="sour-progress" class="progress-bar" style="background-color:rgb(119, 139, 234); width: <? echo $taste->{'salty'}/5*100; ?>%;"></div>
                                </div>

                                
                                <div  class="progress" style="margin-bottom:5px; ">
                                    <div id="savoury-progress" class="progress-bar" style="background-color:orange; width: <? echo $taste->{'savory'}/5*100; ?>%;"></div>
                                </div>
                                </div>
                                <hr>
                                <p class="lead"> Tags:</p> <p><? echo $tags; ?></p>
                                <hr>
                                <p class="lead"> Rate this recipe:</p> <p>
                                    <!-- begin Rating -->
                                <form method="POST" action="showRecipe.php?id=<?php echo $id; ?>">
                                    <fieldset class="rating" id="roro" >
                                        <input type="radio" id="star5" name="rating" value="5" onclick="this.form.submit()"/><label for="star5" title="Love this">5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4" onclick="this.form.submit()"/><label for="star4" title="Pretty good">4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3" onclick="this.form.submit()"/><label for="star3" title="Meh">3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2" onclick="this.form.submit()"/><label for="star2" title="Kinda bad">2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1" onclick="this.form.submit()"/><label for="star1" title="Bad">1 star</label>
                                    </fieldset>
                                </form>
                               

<?
//Update recipe with new rating
if (isset($_POST['rating'])) {
    $starValue = $_POST['rating'];
    $response = file_get_contents('http://crowdchef.herokuapp.com/rateRecipe/' . $recipeID . '/' . $userID . '/' . $starValue);
    print_r($response);
}
?>

                                </p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
