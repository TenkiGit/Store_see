<?php


include_once("./common/common.php");
// include_once("./login.php");

try{
	main();
}catch(Exception $e){
	echo $e;
}


function main(){
    // var_dump($_POST);

    //read_csvData
    $file = 'data.csv';
    $fp = fopen($file, 'r');
    //$sh = stream_filter_prepend($fp, 'convert.iconv.cp932/utf-8', STREAM_FILTER_READ);
    $csv = array();
    $keys = null;
    while ($data = fgetcsv($fp, 1000,",")) {
        if ($keys === null) {
            $keys = $data;
        } else {
            $csv[] = array_combine($keys, $data);
        }
    }
    //print_r($csv);
    
    //if-post==csv->update
    foreach($csv as $key=>$data ){
   
        var_dump($data);
    }


	//ログインページへリダイレクト
	//header("Location:/index.php");

    return true;
}
