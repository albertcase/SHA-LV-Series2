<?php
define("login_admin","samesame");
define("password_admin","14011977");

if($_GET["logout"]) $_SESSION["administrateur"]=0;

if( ($_POST["pass"]=password_admin && $_POST["login"]==login_admin) || $_SESSION["administrateur"]==1){
$_SESSION["administrateur"]=1;
}else{
require_once dirname(__FILE__)."/../../admin/auth.php";
exit();
}

?>