<?php

	  $field = $_GET['field'];
      $response = file_get_contents('http://crowdchef.herokuapp.com/suggestTerm/'.$_GET['search'].'/'.$field);
      $obj = json_decode($response);

?>
<div style="background:#ffffff;padding:10px;width:150px;">
<?php
      foreach ($obj->{'result'} as $value) {
      	echo "<a href=/search.php?search=".$value."&field=".$field.">".$value."</a><br />";
      }
?>
</div>