<?php
require('./dbconfig.php');

function program($conn,$language)
{
    // GROUP BY lang_name
    $query = "select  `lang_name`, `name` from code where lang_name='$language'";
    $row_query = mysqli_query($conn, $query);
    $result = mysqli_fetch_all($row_query);
    return $result;
}

function get_language($conn){
    // GROUP BY lang_name
    $query = "select `lang_name` from code  GROUP BY lang_name";
    $row_query = mysqli_query($conn, $query);
    $result = mysqli_fetch_all($row_query);
    return $result;
}

// search from 
function search_view($conn,$search,$lang){
    $search_query="select `id`,`name`,`program`,`result` from `code`";
    if ($search && $lang) {
        // $search_query = "select `id`,`name`, `program`,`result`,`lang_name` from `code` where `name` like '%$search%' and where id=$id  or lang_name like '%$search%'";
        $search_query = "select `id`,`name`, `program`,`result`,`lang_name` from `code` where `name` like '%$search%' and  lang_name='$lang'  or lang_name like '%$search%'";
    } 
    $run_query = mysqli_query($conn, $search_query);
    $search_result = mysqli_fetch_array($run_query);
    if (!$search_result) {
        // printf("Error: %s\n", mysqli_error($conn));
        echo "<h1> Sorry result not found </h1>";
        exit();
    }
    return $search_result;
}
