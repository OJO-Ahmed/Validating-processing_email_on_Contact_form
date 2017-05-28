<?php  
$error = [];
$missing = [];
if (isset($_POST['send'])){
	$expected = ['name','email','comment'];
	$required = ['name','comment'];
	require_once 'process_mail.php';
}
?>
<!doctype html>
<html lang = "en">
<head>
<meta charset = "UTF-8">
<title>POST AND PROCESS</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>Contact Us</h1>
<?php if ($_POST && $suspect): ?>
	<p class="warning">
	Sorry, your mail could not be sent
	</p>
<?php elseif ($error || $missing): ?>
	<P class="warning"> Please fix the item(s) indicated </P>
<?php endif; ?>
<form method = "POST" action="<?= $_SERVER['PHP_SELF']; ?>">
<P>
<label for = "name">Name:
<?php if($missing && in_array('name',$missing)): ?>
	<span class="warning">Please enter your name</span>
<?php endif; ?>
</label>
<input type="text" name="name" id="name"
<?php if($error || $missing){
	echo 'value ="'.htmlentities($name).'"';
	}
?>
>
</p>
<P>
<label for = "email">Email:
<?php if($missing && in_array('email',$missing)): ?>
	<span class="warning">Please enter your email</span>
<?php endif; ?>
</label>
<input type="email" name="email" id="email"
<?php
if ($error || $missing){
	echo 'value ="'.htmlentities($email).'"';
	}
?>
>
</p>
<P>
<label for = "comment">Comment:
<?php if($missing && in_array('comment',$missing)): ?>
	<span class="warning">You forgot to add your comment </span>
<?php endif; ?>
</label>
<textarea name="comment" id="comment"><?php
if ($error || $missing){
 	echo htmlentities($comment);
 }
 ?></textarea>

</p>
<p>
<input type = "submit" name="send" id="send" value ="Send Comment" />
</p>
</form>
</body>
</html>
<!--<pre>
<?php
/*if($_GET){
	echo 'Content of the $_GET array:<br />';
	print_r($_GET);
} elseif ($_POST){
	echo 'Content of the $_POST array:<br />';
	print_r($_POST);
}
 ?>
</pre>*/ 
