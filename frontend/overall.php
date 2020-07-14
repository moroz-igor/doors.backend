<?php

function _arr($arr)
{
    echo '<pre>';print_r($arr);echo '<pre>';die;
}
function _ar($arr)
{
    echo '<pre>';print_r($arr);echo '<pre>';
}
function _arrd($arr1, $arr2)
{
    echo '<pre>';
    print_r($arr1);
    if ($arr2) { print_r($arr2); }
    echo '<pre>';
    die;


}
