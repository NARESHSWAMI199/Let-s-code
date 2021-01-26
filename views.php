<?php

require('./dbconfig.php');
require('./model.php');


function get_name($conn,$language){
    $program = program($conn,$language);
    return $program;
}

function get_lang($conn){
    $language = get_language($conn);
    return $language;
}

// search form 
function search_form($lang){
   echo "
    <form action='.' method='get' class='form-group'>
        <input  value=$lang name='lang'  type='hidden'>
        <input class='form-control' required='required' name='search' placeholder='Search here..' type='text'>
        <input  type='submit' value='search' name='search_submit' class='btn btn-primary mt-2'>
    </form>
    ";
}

// button_search_form
function button_search_form($lang,$value){
    echo " 
     <form action='.' method='get' class='form-group'>
        <input  value=$lang name='lang'  type='hidden'>
         <input  value=$value   name='search'  type='hidden'>
         <button type='submit' name='search_submit' class='btn btn-white w-100 shadow-sm pt-5 '>$value
     </form>
     ";
}

function search_value($conn){
    if (isset($_GET['search_submit'])){
        $search_view = search_view($conn,$_GET['search'],$_GET['lang']);
        return $search_view;
    }
    else{
        $search_view = search_view($conn,'python','python');
        return $search_view;
    }
}

// https://github.com/NARESHSWAMI199/present-code
