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

	 $fp = fopen($filepath, "r");
while ($data = fgetcsv($fp, 10000)) {
  print "<tr>";
  foreach ($data as $d) {
    print "<td>$d</td>";
  }
  print "</tr>\n";
}

	$contents = common::html_output($template,$params);


	//出力
	echo $contents;
	
}
