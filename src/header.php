<?php
$string = GetCurUrl();


$cur = 1;
if(strpos($string, 'pages/list') or strpos($string, 'pages/item'))
    $cur = 2;

if(strpos($string, 'section=1') )
    $cur = 3;

if(strpos($string, 'section=2') )
    $cur = 4;

if(strpos($string, 'alias=about') )
    $cur = 5;

if(strpos($string, 'alias=kontakty') )
    $cur = 6;

?>