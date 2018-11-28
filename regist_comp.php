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
	$template = './template/regist_comp.html';
     $params = [];
    
    $data=[];
    // var_dump($_GET);
    $data = common::comp_user($_GET['user_id'],$_GET['token']);
    
    if(isset($data['0']['ID'])&&empty($data['1']['ID'])){
        common::set_status_1($_GET['user_id']);
        echo '登録完了しました<br>';
        echo '<a href="../login.php">ログインページ</a>';
    }else{
        echo '登録失敗です。もう一度初めからお願いします。';
    }

	$contents = common::html_output($template,$params);

	

	//出力
	echo $contents;
	
}
