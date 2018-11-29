<?php


include_once("./common/common.php");
// include_once("./login.php");

try{
	main();
}catch(Exception $e){
	echo $e;
}


function main(){
    var_dump($_POST["name"]);
    

	//ログインページへリダイレクト
	//header("Location:/index.php");

    return true;
}
