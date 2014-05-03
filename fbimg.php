<?php
if(isset($_GET['u'])){
	$fbid = abs($_GET['u']);
	echo file_get_contents('http://graph.facebook.com/'.$fbid.'/picture?width=150');
}
?>