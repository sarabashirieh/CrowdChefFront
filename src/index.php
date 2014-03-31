<?php
session_start();

if (isset($_POST['login'])) {

    echo $username = $_POST['username'];
    echo $pass = $_POST['password'];
    $response = file_get_contents('http://crowdchef.herokuapp.com/checkUser/' . $username . '/' . $pass);
    $obj = json_decode($response);
//print_r($obj);
    echo $userID = $obj->result;
    // echo "string";
    $_SESSION['userID'] = $userID;
    $_SESSION['userName'] = $username;

    if (isset($_SESSION['userID'])) {
        echo "I should give userName";
        echo $_SESSION['userName'];
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
        <script src="http://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>





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
                                <?
                                if (isset($_SESSION['userName'])) {
                                    echo 'Welcome ' . $_SESSION['userName'];
                                } else {
                                    echo' <a class="btn btn-success btn-sm" href="register/index.php">Sign up</a>
           <a class="btn btn-info btn-sm" href="login/index.php">Login</a>';
                                }
                                ?>
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

                            <div class="col-xs-10 col-xs-offset-2" >
                                <div class="bool-slider true" style="float:left; margin-right:15px">
                                    <div class="inset">
                                        <div class="control"></div>
                                    </div>
                                </div>
                                <div id="basic_search">
                                    <form action="/search.php" method="POST" class="form-inline">
                                        <input type="search"  id="crowdchef-search" placeholder="Search recipes" name="search" class="form-control" onkeyup="showhint(this)" autocomplete="off" >
                                        <select class="form-control" name="field">
                                            <option value="name">Title</option>
                                            <option value="description">Description</option>
                                            <option value="tag">Tag</option>
                                            <option value="ingredient">Ingredients</option>
                                        </select>
                                        <input type="submit" class="btn btn-success" href="search.php" id="search-rec" value=" Search" />
                                    </form>
                                </div>
                                <div id="complex_search" class="hidden">
                                    <form action="/search.php" method="POST" class="form-inline">
                                        <div id="search_container" style="width:25%; float:left">
                                            <input id="input_search" type="search"  placeholder="Search recipes" class="form-control" style="width:93%; float:left;"/>
                                            <input id="input_from" type="number" min="1" max="5" placeholder="From" class="form-control hidden" style="width:45%; float:left; margin-right:3%" value="1"/>
                                            <input  id="input_to"type="number" min="1" max="5" placeholder="To" class="form-control hidden" style="width:45%; float:left" value="1"/>

                                        </div>
                                        <select id="select_field" class="form-control" onchange="onFieldSelect(this);">
                                            <option value="name">Title</option>
                                            <option value="description">Description</option>
                                            <option value="tag">Tag</option>
                                            <option value="ingredient">Ingredients</option>
                                            <option value="sweet">Sweetness</option>
                                            <option value="sour">Sourness</option>
                                            <option value="salty">Saltiness</option>
                                            <option value="spicy">Spiciness</option>
                                            <option value="savory">Savoriness</option>

                                        </select>
                                        <select id="select_occur" class="form-control">
                                            <option value="should">Should</option>
                                            <option value="must">Must</option>
                                            <option value="not">Must not</option>
                                        </select>
                                        <input id="input_complex" class="hidden" name="complexQuery"/>
                                        <input type="button" class="btn btn-gray" value="Add" onclick="addCriterion();"/>
                                        <input type="button" class="btn btn-gray"  value="Reset" />
                                        <input type="submit" class="btn btn-success" value=" Search"/>
                                    </form>
                                </div>
                            </div>
                            <br/>  
                            <br/>
                            <div id="search_criteria" class="col-xs-10 col-xs-offset-3 hidden" style="color:white">
                                <div style="float:left; font-weight: 500; margin-right:10px; border:1px solid #FFF">
                                    Criteria 
                                </div>
                                <div id="criteria_list" style="float:left">
                                    None
                                </div>
                                <!--                                    Title: bla something very very lon gin heree yes<br/>
                                                                    Title: bla <br/>
                                                                    Title: bla <br/>
                                                                    Title: bla <br/>
                                                                    Title: bla <br/>
                                                                    Title: bla <br/>
                                                                    Sweetness: 1 to 4-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="search-suggest" class="col-xs-offset-4 col-xs-3 margin-top" >

        </div>

        <script type="text/javascript">
                                            var criteria = [];
                                            $(document).ready(function() {
                                                $('.bool-slider .inset .control').click(function() {
                                                    if (!$(this).parent().parent().hasClass('disabled')) {
                                                        if ($(this).parent().parent().hasClass('true')) {
                                                            $(this).parent().parent().addClass('false').removeClass('true');
                                                            $("#basic_search").addClass('hidden');
                                                            $("#complex_search").removeClass('hidden');
                                                            $("#search_criteria").removeClass('hidden');
                                                        } else {
                                                            $(this).parent().parent().addClass('true').removeClass('false');
                                                            $("#complex_search").addClass('hidden');
                                                            $("#basic_search").removeClass('hidden');
                                                            $("#search_criteria").addClass('hidden');

                                                        }
                                                    }
                                                });
                                            });
                                            function onFieldSelect(comp) {
                                                if ($.inArray($(comp).val(), ["sweet", "sour", "salty", "spicy", "savory"]) >= 0)
                                                {
                                                    $("#input_search").addClass('hidden');
                                                    $("#input_from").removeClass('hidden');
                                                    $("#input_to").removeClass('hidden');
                                                }
                                                else {
                                                    $("#input_search").removeClass('hidden');
                                                    $("#input_from").addClass('hidden');
                                                    $("#input_to").addClass('hidden');
                                                }
                                            }

                                            function addCriterion() {
                                                var criterion = {};
                                                criterion.field = $("#select_field").val();

                                                if ($.inArray(criterion.field, ["sweet", "sour", "salty", "spicy", "savory"]) >= 0)
                                                {
                                                    criterion.min = $("#input_from").val();
                                                    criterion.max = $("#input_to").val();
                                                }
                                                else {
                                                    criterion.query = $("#input_search").val();
                                                }
                                                criterion.occur = $("#select_occur").val();

                                                if (criteria.length < 1)
                                                    $("#criteria_list").empty();
                                                $("#criteria_list").append($('#select_field option:selected').text());
                                                $("#criteria_list").append(" " + criterion.occur + ": ");
                                                if (criterion.min && criterion.max)
                                                    $("#criteria_list").append(criterion.min + " to " + criterion.max + "<br/>");
                                                else
                                                    $("#criteria_list").append(criterion.query + "<br/>");

                                                criteria.push(criterion);
                                                $("#input_complex").val(JSON.stringify(criteria));
                                                console.log($("#input_complex").val());
                                            }
        </script>
        <script>
            function showhint(that)
            {

                var str = that.value;
                var field = document.getElementById('select_field').value;
                var xmlhttp;
                if (str.length == 0)
                {
                    document.getElementById("search-suggest").innerHTML = "";
                    return;
                }
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("search-suggest").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "queryhint.php?search=" + str + "&field=" + field, true);
                xmlhttp.send();
            }
        </script>
    </body>
</html>
