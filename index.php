<?php

include_once("./common/user_data.php");
include_once("./common/common.php");
// include_once("./login.php");

try{
	main();
}catch(Exception $e){
	echo $e;
}


function main(){
	//テンプレートを指定
	$template = './template/index.html';
	$params["user_data"] = [];
	// $params['ID'];

	if(isset($_COOKIE["ID"]) != NULL){
		$params['user_data'] = common::get_olluser();
	}
	$params['Cookie'] = $_COOKIE;

	$contents = common::html_output($template,$params);
	// common::dbadd();

	//出力
	echo $contents;
	// if($_COOKIE['ID']!=NULL && $_COOKIE['Name']!= NULL && $_COOKIE['Email'] != NULL)
	// {
	// 	echo 'ようこそ';
	// 	// var_dump($params);
	// 	echo $_COOKIE["Name"];
	// 	echo 'さま';
	// }else if($_COOKIE['id']==NULL){
	// 	echo '<a href=../login.php>ログインページへ移動</a>';
	// }
}
