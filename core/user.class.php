<?php

class User {
    public function getUserList(){

        // $result=DB::query("INSERT `order` SET id=4,content=777");
        $result=DB::query("SELECT * FROM `users`");

        $html='<h2>Таблица пользователей:</h2> <table border="1">';
        while($obj=DB::fetch_object($result)){
            $html.='<tr><td>'.$obj->id.'</td><td>'.$obj->name.'</td><td>'.$obj->login.'</td><tr>';
        }
        $html.='</table>';
        return $html;
    }
}