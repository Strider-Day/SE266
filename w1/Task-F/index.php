<?php
//calling functions.php
require 'functions.php';
//animal array
$animals = [
    "dog",
    "cat",
    "mouse",
    "bird",
    "fish",
];


//calling dd from functions.php
dd($animals);

require "index_view.php";