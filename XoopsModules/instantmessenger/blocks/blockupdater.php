<?php
include '../../../mainfile.php';
include_once (XOOPS_ROOT_PATH.'/class/template.php');
include_once(XOOPS_ROOT_PATH.'/modules/instantmessenger/blocks/b_instantmessenger.php');
$tpl = new XoopsTpl();
$result = b_instantmessenger();
$tpl->assign('block', $result);
$tpl->display(XOOPS_ROOT_PATH .'/modules/instantmessenger/templates/blocks/onlinenow.html');
?>