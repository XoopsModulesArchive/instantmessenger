<?php
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
				//$members .= "<a href='javascript:void(0)' onClick='javascript:chatWith($membername)'>" . htmlspecialchars($onlines[$i]['online_uname']) . "</a><br>";
				//$members .= '<a href="javascript:void(0)" onclick="javascript:chatWith(\''.$membername.'\')">Chat With '.$uname.'</a>';
				
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