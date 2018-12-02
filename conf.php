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
    $count=0;

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
    
    //if-post==csv->OnFlags
    foreach($csv as $key=>$data ){
   
        // var_dump($data);
        if($data["1.店舗名"]==$_POST["name"]){
            $count+=1;
        }
    }
    if($count==1){
        $inp_data= array("1.店舗名"=>$_POST["name"],"2.出勤者"=>$_POST["come_m"],"3.出前者"=>$_POST["out_m"],"4.店舗在任"=>$_POST["store_in"],"5.必要人数"=>$_POST["need_m"]);
        foreach($csv as $key=>$data ){
            if($data["1.店舗名"]==$_POST["name"]){
                // unset($csv[$key]);
                $data=array_merge($data, $inp_data);
                // var_dump($data);
                $csv[$key]=$data;
            }
            
        }
        // //書き込み
        $fp = fopen('data2.csv', 'w');
        foreach($csv as $data2){
    	    $line = implode(',' , $data2);
	        fwrite($fp, $line . "\n");
        }
        fclose($fp);



        // $csv=array_merge($csv, $inp_data);
        // $csv=array_replace($csv, $inp_data);
        // var_dump($count);
        // $csv=array_merge($csv, $inp_data);
        var_dump($csv);
        // var_dump($data);
    }


	//ログインページへリダイレクト
	//header("Location:/index.php");

    return true;
}
