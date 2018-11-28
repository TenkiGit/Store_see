<?php

class user_data {
    function get_userdata(){
        $params = array();
        $params[] = [
            'ID'        => '1',
            'user_name' => '秋谷　亮太',
            'job'       => 'programmer',
            'email'     => 'test01@coosy.co.jp',
            'password'  => 'coosy0101'
        ];
        $params[] = [
            'ID'        => '2',
            'user_name' => '吉田　忍',
            'job'       => 'programmer',
            'email'     => 'test02@coosy.co.jp',
            'password'  => 'coosy0202'
        ];
        $params[] = [
            'ID'        => '3',
            'user_name' => '三上　洋介',
            'job'       => 'lead programmer',
            'email'     => 'test03@coosy.co.jp',
            'password'  => 'coosy0303'
        ];
        
        return $params;
    }
}
