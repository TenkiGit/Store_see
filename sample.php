<?php
include_once ( "./common/user_data.php" );
include_once ( "./common/common.php" );

// --------------------------------------
// START
// --------------------------------------
try {

    main();

} catch (Exception $e) {
    echo $e;
}

function main(){
    //templateを指定
    $template = 'ここにテンプレートファイルへのパスを書く';
    $contents = common::html_output($template,$params);

    //指定した内容を出力
    echo $contents;
}
