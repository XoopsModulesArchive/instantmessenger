<?php
// $Id$
// Inspired and referenced by Anant Garg (anantgar.com (c) 2009
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                  Copyright (c) 2000-2010 XOOPS.org                        //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

$modversion['name'] = _MI_INSTANTMESSENGER_MODULE_NAME;
$modversion['version'] = "1.00";
$modversion['description'] = _MI_INSTANTMESSENGER_MODULE_DESC;
$modversion['author'] = "Culex";
$modversion['credits'] = "Original script by Anant Garg";
$modversion['help'] = "";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 1;
$modversion['image'] = "images/instantmessenger.png";
$modversion['dirname'] = "instantmessenger";

// Admin
$modversion['hasAdmin'] = 0;

// Menu
$modversion['hasMain'] = 0;

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