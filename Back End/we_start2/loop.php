<?php 

// for 
// while 
// do while 
// foreach

// for($i = 1 ; $i <= 10 ; $i++) {
//     echo "You are in round $i <br>";
// }

// $i = 1;
// while($i <= 20) {
//     echo "You are in round $i <br>";
//     $i++;
// }

// $i = 1;
// do {
//     echo "You are in round $i <br>";
//     $i++;
// }while($i <= 10);

// echo $i;

// $family = ['Hashim', 'Mohammed', 'Merehan', 'Alaa', 'Shimaa', 'Abood'];

// foreach($family as $member) {
//     echo "$member<br>";
// }

// for($i = 0 ; $i < count($family) ; $i++) {
//     echo $family[$i] . '<br>';
// }


// $marks = [
//     'Java' => 96, 
//     'Math' => 98, 
//     'Calculus' => 60, 
//     'PHP' => 61, 
//     'Statistics' => 75
// ];

// $keys = array_keys($marks);

// for($i = 0 ; $i < count($keys) ; $i++) {
//     echo "Mark in {$keys[$i]} is " . $marks[ $keys[$i] ] . "<br>";
// }


// foreach($marks as $subject => $mark) {
//     echo "Mark in $subject is $mark <br>";
// }
// echo time();
$image = 'zina.png';
// 8964654654654654_6465465_654654654_a.png
$ex = pathinfo($image, PATHINFO_EXTENSION);

$alpha = range('a', 'z');
$char = $alpha[ rand(0, count($alpha) - 1) ];

$newname = rand().time().'_'.rand().'_'.rand().'_'.$char.'.'.$ex;

echo $newname;
// var_dump($alpha);