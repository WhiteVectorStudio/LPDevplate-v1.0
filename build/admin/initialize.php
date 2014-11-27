<?php
//Database class include
include_once 'database.php';

//***********************************************************
//Add to DataBase
//***********************************************************
Database::$fields = [
    [
        'name' => 'name',
        'title'=> 'Имя'
    ],
    [
        'name' => 'phone',
        'title'=> 'Телефон'
    ],
    [
        'name' => 'email',
        'title'=> 'Email'
    ],
    [
        'name'=>'utm_source',
        'title'=>'Источник лида'
    ],
    [
        'name'=>'type',
        'title'=>'Тип источника'
    ],
    [
        'name'=>'source',
        'title'=>'Площадка'
    ],
    [
        'name'=>'keyword',
        'title'=>'Ключевое слово'
    ]
];

header('content-type: text/html; charset=utf-8');

Database::load('database.sqlite');
?>