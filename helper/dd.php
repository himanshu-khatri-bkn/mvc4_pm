<?php
function boolprint($v)
{
    if ($v === true)
        return "<b style=\"color:blue\">TRUE</b>";
    return "<b style=\"color:red\">FALSE</b>"; 
    // himanshu pagal hai
}
function dd($data)
{
    $str = "<div style='background:black;color:white;font-size:1.5em'><pre>";
    if (is_bool($data)) {
        $str .= boolprint($data);
    } else if (is_null($data)) {
        $str .= "<b style=\"color:red\">NULL</b>";
    } else {
        $str .= print_r($data, 1);
    }
    $str .= "</pre></div>";
    echo $str;
    exit;
}
