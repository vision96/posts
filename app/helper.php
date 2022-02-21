<?php

if(!function_exists('menu')){
    function menu(){
        return $data = \App\Models\category::select('id','name','description','slug','image')->orderBy('id','desc')->get();
        
    }
}