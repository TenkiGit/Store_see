<?php


class common {
    
    function html_output($template,$params=array()){
    
       //htmlを取り込む
        ob_start();
        require $template;
        $contents = ob_get_clean();
    
        //出力内容を返す
        return $contents;
    
    }
}
