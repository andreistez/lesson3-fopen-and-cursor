<?php

require_once 'model/apps.php';

$isSent	= false;
$err	= '';

if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
	$name	= trim( $_POST['name'] );
	$phone	= trim( $_POST['phone'] );

	if( ! $name || ! $phone ){
		$err = 'Please fill all fields';
	}	else{
		$err	= addApp( $name, $phone ) ? '' : 'Can\'t write apps';
		$isSent	= ! $err;
	}
}	else{
	$name = $phone = '';
}

if( $isSent ){
	echo '<h2>Thank you! We will back to you as soon as possible.</h2>';
}	else{
	?>
	<form method="post">
		<fieldset>
			<label for="name">
				<input type="text" name="name" id="name" placeholder="Your name" value="<?=$name?>" />
			</label>
			<label for="phone">
				<input type="tel" name="phone" id="phone" placeholder="Your phone" value="<?=$phone?>" />
			</label>
		</fieldset>

		<button>Send</button>
	</form>

	<?php
	echo $err;
}
?>


