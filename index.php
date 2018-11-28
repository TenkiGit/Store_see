<?php


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
	$filepath="./data.csv";

	 $arr = json_decode($json,true);

    echo "<pre>";
    foreach($arr as $v) {
      var_dump($v["s_name"]);
    }
    echo "</pre>";

	$contents = common::html_output($template,$params);


	//出力
	echo $contents;
	
}
