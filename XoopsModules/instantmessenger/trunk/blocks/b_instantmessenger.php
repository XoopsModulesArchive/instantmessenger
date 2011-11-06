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


/*
* Main block function. Created from the online system block
* Adds an "who is online" block with a link to chat with registered user.
*/
function b_instantmessenger() {
    global $xoopsUser, $xoopsModule;
	$online_handler =& xoops_gethandler('online');
    mt_srand((double)microtime()*1000000);
    // set gc probabillity to 10% for now..
    if (mt_rand(1, 100) < 11) {
        $online_handler->gc(300);
    }
    if (is_object($xoopsUser)) {
        $uid = $xoopsUser->getVar('uid');
        $uname = $xoopsUser->getVar('uname');
		$_SESSION['username'] = $uname;
    } else {
        $uid = 0;
        $uname = '';
    }
    if (is_object($xoopsModule)) {
        $online_handler->write($uid, $uname, time(), $xoopsModule->getVar('mid'), $_SERVER['REMOTE_ADDR']);
    } else {
        $online_handler->write($uid, $uname, time(), 0, $_SERVER['REMOTE_ADDR']);
    }
    $onlines = $online_handler->getAll();
    if (false != $onlines) {
        $total = count($onlines);
        $block = array();
        $guests = 0;
        $members = '';
		$Online_img = "<img src='".XOOPS_URL."/modules/instantmessenger/images/online.png' height='16px' width='16px'></img>";
        for ($i = 0; $i < $total; $i++) {
            if ($onlines[$i]['online_uid'] > 0) {
			$membername[$i] = $onlines[$i]['online_uname'];
				$members .= '<span style="position:relative;left:15px;">'.$Online_img.'<a href="javascript:void(0)" onclick="javascript:chatWith(\''. htmlentities($membername[$i]) .'\')">'.htmlentities($membername[$i]).'</a></span><br />';
            } else {
                $guests++;
            }
        }
        $block['online_total'] = sprintf(_ONLINEPHRASE, $total);
        if (is_object($xoopsModule)) {
            $mytotal = $online_handler->getCount(new Criteria('online_module', $xoopsModule->getVar('mid')));
            $block['online_total'] .= ' ('.sprintf(_ONLINEPHRASEX, $mytotal, $xoopsModule->getVar('name')).')';
        }
        $block['lang_members'] = _MEMBERS;
        $block['online_names'] = $members;
		$block['username'] = $uname;
        return $block;
    } else {
        return false;
    }
}
?>