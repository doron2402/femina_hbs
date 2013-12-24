<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:fb="http://ogp.me/ns/fb#">
<head>
    <title>Femina</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./src/style/main.css"/>
    <style>
    label, p {
    	color:white;
    	font-size: 18px;
    }
    fieldset #result {
    	color:white;
    	font-size: 18px;
    }

    </style>
    <script type="text/javascript" src="./src/lib/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="./src/lib/jquery.fancybox.pack.js"></script>
    <meta property="og:image" content="http://cmp.interactivated.co.il/McCann/Altman/2011/Seker/src/img/woman+product.png"/>
    <meta property="og:title" content="Femina"/>
    <meta property="og:url" content="http://cmp.interactivated.co.il/McCann/Altman/2011/Seker/"/>
    <meta property="og:site_name" content="Femina - פמינה"/>
    <meta property="og:type" content="website"/>
        <!--[if lt IE 9]>
    <script src="./src/lib/html5shiv.js"></script>
    <style>
    #share-button{
        display:block;
    }
    </style>
    <![endif]-->
</head>
<body>
<?php

if ($_POST['admin_name'] == 'femina' && $_POST['admin_password'] == 'femina123456'){
	$currentJson = file_get_contents('data.json');
	?>
	
	<center>
	<fieldset id="result">
		<p>תוצאות</p>
		<p id="questions"></p>
		<p id="total"></p>
	</fieldset>

	</center>

	<?php

}else{
	
	?>
		<center>
		<form method="POST" action="admin.php">
		<label>User:</label><input type="text" name="admin_name">
		<br/><label>Password:</label><input type="password" name="admin_password">
		<br />
		<input type="submit" value="Submit">
		</form>
		</center>
	<?php
}
?>
<script type="text/javascript" src="./src/lib/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		var Json =  jQuery.parseJSON('<?=$currentJson?>');
		console.log(Json.total_user);
		$('p#questions').html('ממוצא: ' + Json.questions);
		$('p#total').html('סך הכל ענו : ' + Json.total_user);
	});
</script>

</body>

</html>