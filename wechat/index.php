<?php
require_once('MomentAPI.php');
$routeTable=array();

if(isset($_REQUEST["c"]) && isset($_REQUEST["a"])){
  $controller=$_REQUEST["c"];
  $action=$_REQUEST["a"];
  if($controller == "moment" &&
  	$action=="list"){
  	 $momentAPI = new MomentAPI();
  	 $momentAPI->list_moments();
  	 unset($momentAPI);
  }else{
  	echo "what?";
  }
}else{
 echo phpinfo();
}
?>