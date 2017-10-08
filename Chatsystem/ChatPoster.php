<?php 
  // The legendary chat poster
  $db = new PDO('mysql:host=127.0.0.1;dbname=Chat','root','');
  
  // Secure the chat
  if(isset($_POST['text'])&& isset($_POST['name']))
  {
	  $text = strip_tags(stripslashes($_POST['text']));
	  $name = strip_tags(stripslashes($_POST['name']));
	  
	  if(!empty($text) && !empty($name))
	  {
		  $insert = $db->prepare("INSERT INTO messages VALUES('','".$name."','".$text."')");
		  $insert->execute();
		  
		  echo "<li class='cm'><b>".ucwords($name)."</b> -".$text."</li>";
	  }
  }
?>