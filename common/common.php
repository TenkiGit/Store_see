<?php


// ID{Name,StudentID,Email,Pass,Status}
//include_once ( $GLOBALS["SiteConf"]["DIR"]["LIBLARY"] . "/database_control.php"  );       // DB系共通



require  "vendor/autoload.php";
use kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
// $fPlace="";


class common {
    
    function html_output($template,$params=array()){
    
       //htmlを取り込む
        ob_start();
        require $template;
        $contents = ob_get_clean();
    
        //出力内容を返す
        return $contents;
    
    }
    private function db_in(){
        //認証
        $serviceAccount = ServiceAccount::fromJsonFile("web-str-ipu-test-firebase-adminsdk-64bql-4e7691a44c.json");
        $firebase1 = (new Factory)->withServiceAccount($serviceAccount)->create();
        return $firebase1;
    }

    public static function dbadd(){
        $firebase="" ;
        $firebase = common::db_in();

        //データインスタンス    
        $database = $firebase->getDatabase();
        $database->getReference('userdb')
          ->push([
            
                'Name' => 'ccccc',
                'StudentID' => 123456678,
                'Email' => 'test01@test.com',
                'Pass' => '0',
                'Status' =>1,
            ]);
            // 'せつめい',
            // 'subject' => [
            //     '章番号' => '1',
            //     'タイトル' => 'タイトルです',
            // ],
            // '価格' => '100',
            // ]);
            
            $reference = $database->getReference('userdb');
            // $value = $reference->getValue();
            //var_dump($value);
    }
    public static function get_olluser(){
        $firebase = common::db_in();
        //データインスタンス    
        $database = $firebase->getDatabase();
        $data = $database->getReference('userdb');
        $data1 = $data->getValue();
        return $data1;
    }
    public static function get_count_user($Email,$Pass){
        if($Email==null||$Pass==null){
            return $count=0;
        }
        $count=0;
        
        $result= common::get_olluser();
        foreach($result as $data){
            if ($data['Email']== $Email && $data['Pass']==$Pass){
                $count=$count+1;
                // var_dump($data);
            }
        }
        return $count;
    }
    public static function create_user($add_data){

        var_dump($add_data);
        $firebase="" ;
        $firebase = common::db_in();

        //データインスタンス    
        $database = $firebase->getDatabase();
        $database->getReference('userdb')
          ->push([
            
                'Name' => $add_data["inp_name"],
                'StudentID' => $add_data["inp_studentID"],
                'Email' => $add_data["inp_email"],
                'Pass' => $add_data["inp_pass"],
                'Status' =>2,
                'token1' => $add_data["token1"],
                'token2' => $add_data["token2"],
                'token3' => $add_data["token3"],
            ]);
            $reference = $database->getReference('userdb');
    
    }
}


// // class common {
//     function html_output($template,$params=array()){

//    //htmlを取り込む
//     ob_start();
//     require $template;
//     $contents = ob_get_clean();

//     //出力内容を返す
//     return $contents;

//     }
    // public static function get_olluser(){
    //     $conn   = database_control::getConnection() ;
    //     $sql  = "SELECT *  FROM user_data";
    //      //$sql .= " WHERE EMAIL        = :email";
    //     $param = array();
    //     //array_push ( $param , array('key'=>':email'        , 'value'=> メールアドレス          , 'type'=>PDO::PARAM_STR) );
    //     $stmt   = database_control::execute( $conn, $sql , $param );        // execute
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC );     // result set

//     //      return $result;
//     // }
//     public static function get_count_user($Email,$Pass){
//         if($Email==null||$Pass==null){
//             return $count=0;
//         }
//         $count=0;
//         $conn   = database_control::getConnection() ;
//                 $sql  = "SELECT *  FROM user_data";
//                 //$sql .= " WHERE EMAIL        = :email";
//                 $param = array();
//                 //array_push ( $param , array('key'=>':email'        , 'value'=> メールアドレス          , 'type'=>PDO::PARAM_STR) );
//                 $stmt   = database_control::execute( $conn, $sql , $param );        // execute
//                 $result = $stmt->fetchAll(PDO::FETCH_ASSOC );     // result set

//                 foreach($result as $data){
//                     if ($data['email']== $Email && $data['password']==$Pass){
//                         $count=$count+1;
//                         // var_dump($data);
//                     }
//                 }

                
//                 return $count;
//     }
//     public static function get_user_token($token){
//         $conn   = database_control::getConnection() ;
//         $sql  = "SELECT *  FROM user_data";
//         $sql .= " WHERE token        = :token";
//         $param = array();
//         array_push ( $param , array('key'=>':token'        , 'value'=> $token          , 'type'=>PDO::PARAM_STR) );
//         $stmt   = database_control::execute( $conn, $sql , $param );        // execute
//         $result = $stmt->fetchAll(PDO::FETCH_ASSOC );     // result set

//         return $result;
//     }
//     public static function create_user($add_data){
//         $conn   = database_control::getConnection() ;
//         $sql  = "INSERT INTO  user_data (user_name,job,email,password,token,status) VALUES(:user_name,:job,:email,:password,:token,:status)";
//         // $sql .= " WHERE taken        = :token";
//         $param = array();
//         array_push ( $param , array('key'=>':user_name'        , 'value'=> $add_data['inp_name']          , 'type'=>PDO::PARAM_STR) );
//         array_push ( $param , array('key'=>':job'        , 'value'=> $add_data['inp_job']       , 'type'=>PDO::PARAM_STR) );
//         array_push ( $param , array('key'=>':email'        , 'value'=> $add_data['inp_email']          , 'type'=>PDO::PARAM_STR) );
//         array_push ( $param , array('key'=>':password'        , 'value'=> $add_data['inp_pass']          , 'type'=>PDO::PARAM_STR) );
//         array_push ( $param , array('key'=>':token'        , 'value'=> $add_data['token']          , 'type'=>PDO::PARAM_STR) );
//         array_push ( $param , array('key'=>':status'        , 'value'=> 2                         , 'type'=>PDO::PARAM_STR) );
//         $stmt   = database_control::execute( $conn, $sql , $param );        // execute
        
//     }
//     public static function comp_user($ID,$token){
//         $conn   = database_control::getConnection() ;
//                 $sql  = "SELECT *  FROM user_data";
//                 $sql .= " WHERE ID = :ID AND token =:token";
//                 $param = array();
//                 array_push ( $param , array('key'=>':ID'        , 'value'=> $ID          , 'type'=>PDO::PARAM_STR) );
//                 array_push ( $param , array('key'=>':token'        , 'value'=> $token          , 'type'=>PDO::PARAM_STR) );
//                 $stmt   = database_control::execute( $conn, $sql , $param );        // execute
//                 $result = $stmt->fetchAll(PDO::FETCH_ASSOC );     // result set

//                 return $result;
//     }
//     public static function set_status_1($ID){
//         $conn   = database_control::getConnection() ;
//         $sql  = "UPDATE user_data SET status =1 WHERE ID =:ID";
//         // $sql .= " WHERE token        = :token";
//         $param = array();
//         array_push ( $param , array('key'=>':ID'        , 'value'=> $ID          , 'type'=>PDO::PARAM_STR) );
//         $stmt   = database_control::execute( $conn, $sql , $param );        // execute
//         // $result = $stmt->fetchAll(PDO::FETCH_ASSOC );     // result set
//     }

// // }