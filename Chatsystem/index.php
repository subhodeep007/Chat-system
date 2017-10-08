<?php
//Get username
$user = $_GET['u'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chatter</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
<script src="javascript/Chat.js"></script>

</head>

<body background="images/contactpic.jpg">
<div class="chatContainer">
   <div class="chatHeader">
   <h2>Welcome <?php echo ucwords($user);?></h2>
   </div>
   <div class="chatMessages">
   <?php
		//Getting these messages
		$db = new PDO('mysql:host=127.0.0.1;dbname=Chat','root',''); 
		
		//Get messages
		$query =$db->prepare("SELECT * FROM messages");
		$query->execute();
		
		//Fetch
		while($fetch = $query->fetch(PDO::FETCH_ASSOC))
		{
			$name = $fetch['name'];
			$message = $fetch['message'];
			
			echo "<li class='cm'><b>".ucwords($name)."</b>-".$message."</li>";
		}
		?>
   </div>
   <div class="chatButton">
     <form action="#" onSubmit="return false;" id="chatForm">
     <input type="hidden" id="name" value="<?php echo $user;?>" />
     <input type="text" name="text" id="text" value="" placeholder="type your message"/>
     <input type="submit" name="submit" value="Send"/>
     </form>
   </div>
</div>
</body>
</html>