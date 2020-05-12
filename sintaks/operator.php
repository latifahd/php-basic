<?php
// Sintaks PHP

// OPERATOR

// Aritmatika
// + - * /
$x = 10;
$y = 20;
echo $x * $y;
echo "<br>";

// Penggabung string / concatenation / concat
// .
$nama_depan = "Latifah";
$nama_belakang = "Dewi";
echo $nama_depan." ".$nama_belakang;
echo "<br>";

// Assignment = operator penugasan
// =, +=, -=, *=, /=, %=, .=
$x = 1;
$x += 5;
echo $x;
echo "<br>";

$nama = "Latifah";
$nama .= " ";
$nama .= "Dewi <br>";
echo $nama;

// Perbandingan = mengecek nilai, tidak mengecek tipe data
// <, >, <=, >=, ==, !=
var_dump(1>5);
var_dump(1=="1");

// Identitas = mengecek nilai dan tipe data
// ===, !==
var_dump(1==="1");

// Logika = untuk pengondisian
//&&, ||, !

$x=10;
var_dump($x < 20 && $x%2 == 0);
var_dump($x<20 || $x%2 ==0);

?>
