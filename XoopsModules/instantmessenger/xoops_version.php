<?php
$modversion['name'] = "IM";
$modversion['version'] = 1.00;
$modversion['description'] = "Instant Messenger";
$modversion['author'] = "Culex";
$modversion['credits'] = "Culex";
$modversion['help'] = "";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 0;
$modversion['image'] = "images/tutorial.png";
$modversion['dirname'] = "instantmessenger";

// Admin
$modversion['hasAdmin'] = 0;

// Menu
$modversion['hasMain'] = 1;

$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][0] = "instantmessenger_chat";

// Templates
$modversion['templates'][1]['file'] = 'empty_main.html';
$modversion['templates'][1]['description'] = '';

// Blocks
$modversion['blocks'][1]['file'] = "b_instantmessenger.php";
$modversion['blocks'][1]['name'] = 'IM';
$modversion['blocks'][1]['description'] = 'This is a Block for the empty module';
$modversion['blocks'][1]['show_func'] = "b_instantmessenger";
$modversion['blocks'][1]['template'] = 'b_instantmessenger.html';
?>