<?php

include_once("./common/user_data.php");
include_once("./common/common.php");


try{
	main();
}catch(Exception $e){
	echo $e;
}


function main(){
	//テンプレートを指定
	$template = './template/regist.html';
	//$params["user_data"] = [];
    $email='';
    $pass='';
    
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $params['inp']=$_POST['inp_email'];
    $params['inp']=$_POST['inp_name'];
    $params['inp']=$_POST['inp_studentID'];

    // var_dump($_POST);
    



	$contents = common::html_output($template,$params);

	

	//出力
    echo $contents;
    if(isset($_POST['登録ボタン'])){
        header("Location:/regist_confirm.php");//リダイレクト
        exit();
    }
}
