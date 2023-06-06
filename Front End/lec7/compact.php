
<?php 
$name = 'ddd';
$age = 50;
$username = 'ali66';

compact('name', 'age', 'uername');

$params = ['name', 'age', 'uername'];

$finale = [];

foreach($params as $pr) {
    $finale[$pr] = $GLOBALS[$pr];
}

extract($finale);