<?php


function inputFunc ($placeholder, $type, $name){
    $func= "
        <div class=\"text-input\">
            $placeholder: <input type=\"$type\" name=\"$name\">
        </div>
    ";
    


    echo $func;
}

function inputFunc1 ($placeholder, $id, $type, $name){
    $func= "
        <div class=\"input-group\">
            $placeholder: <input id=\"$id\" type=\"$type\" name=\"$name\">
        </div>
    ";
    


    echo $func;
}


function buttonFunc ($type, $name, $class, $text){
    $btn = "
        <button type= '$type' name = '$name' class= '$class'>$text</button>
    ";

    echo $btn;
}