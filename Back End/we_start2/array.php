<?php 

// $name = "Ahmed";
// // define('NAME', 'Mohammed', true);
// const name = 'Ali';

// echo name;

// key => value
// 1. Index Array
// 2. Multidimensional Array
// 3. Associative Array


// $family = array();
// $family = ['Hashim', 'Mohammed', 'Merehan', 'Alaa', 'Shimaa'];

// print_r($family); // dd
// array_push()

// Add new value
// $family[] = 'Abood';
// $family[] = 'Baraa';

// delete value
// unset($family[2]);
// unlink();

// $family[1] = 'Zina';

// echo "<pre>";
// var_dump($family); // dd
// echo "</pre>";
// echo $family[1];

// session_start();
// session_unset();
// session_destroy();
// header("Location: login.php");

// $filename = 'marks.final.ee.dd.PNG';
// $allowed = ['png', 'jpeg', 'jpg', 'gif'];

// // $path = explode('.', $filename);
// // // $ex = $path[ count($path) - 1 ];
// // $ex = end($path);

// $ex = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

// if(in_array($ex, $allowed)) {
//     echo "Your file is accepted";
// }else {
//     die('File not allowed');
// }

// $family = [
//     ['Hashim', 'Naji', ['Hamza', 'Ali']],
//     ['Mohammed', 'Zina', 'Sama'],
//     ['Merehan', 'Adam'],
//     ['Alaa', 'Fadel', 'Maryam'],
// ];

// // var_dump($family);
// echo $family[0][2][1];
// key => value

// $marks = [
//     'Java' => 96, 
//     'MAth' => 98, 
//     'Calculus' => 60, 
//     'PHP' => 61, 
//     'Statistics' => 75
// ];

// var_dump($marks);

// Super Global Variables
// 1. $GLOBALS;
// 2. $_SERVER
// 3. $_ENV
// 4. $_GET
// 5. $_POST
// 6. $_FILES
// 7. $_REQUEST
// 8. $_SESSION
// 9. $_COOKIE