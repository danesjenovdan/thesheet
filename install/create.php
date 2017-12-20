<?php
require "php/config.php";


$book = R::dispense('gsheet');

$book->name = "demo gsheet";
$book->url = "https://spreadsheets.google.com/feeds/spreadsheets/private/full/1fQ4u38ELCax6qpXJIAKxl5jpuj-MQ0XAkvwKjbQcvYI";
$book->content = "<p>visit /demo/ </p>";

$book->datum = date("Y-m-d H:i:s");

$id = R::store($book);
if($id>0){
    echo ("done. now remove install folder.")."\n";
}else{
    echo ("error, check config.php")."\n";
}
