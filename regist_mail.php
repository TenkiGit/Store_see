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
	$template = './template/regist_mail.html';
	$params = [];
	// $params['ID'];
    // var_dump($_POST);

    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $mail_add = $_POST['inp_email'];

    // if(mail($mail_add, 'test', 'test_mail',"From:"."s.yoshida@coosy.co.jp")){//ubuntuのsendmailがうまくいかず..今回は放置
    //     echo "メールを送信しました";
    //   } else {
    //     echo "メールの送信に失敗しました";
    //   };
    
    //tokenの発行
    $token=0;
    $unix_taime=0;
    $unix_taime = time();
    $db_add = [];

    $token1 = md5($unix_taime.rand());
    $token2 = md5($unix_taime.rand());
    $token3 = md5($unix_taime.rand());
    //DBにインサート
    //DB
    // var_dump($token);
    $db_add = $_POST;
    $db_add['token1']= $token1;
    $db_add['token2']= $token2;
    $db_add['token3']= $token3;

    common::create_user($db_add);
    // $resalt = common::get_user_token($token);//本当はこの前に個数のチェックするよ〜
    // var_dump($resalt);
    $params['ID']=$resalt['0']['ID'];
    $params['token']=$resalt['0']['token'];


	$contents = common::html_output($template,$params);

  

	//出力
	echo $contents;
	
}
