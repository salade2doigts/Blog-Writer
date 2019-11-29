<?php
// list of route!
$actionsFront = ['post','toConnect','toRegister'];
$actionsBack = ['dashBoard','toAddPost','toCommControl','dashboard'];
$actionFrontParams = ['connect'=> '[$_POST[\'pass\'],$_POST[\'pseudo\']]','addComment'=> '$_GET[\'id\'], $_SESSION[\'id\'], $_POST[\'comment\']', 'register' => '$_POST[\'pseudoreg\'],$_POST[\'passreg\']' , 'signal' => '$_GET[\'id\'],$_GET[\'idComm\']'];

$actionsBackParams = ['modifPost' => '$_POST[\'editor_content\'],$_POST[\'title\'],$_GET[\'id\']','addPostConfirm'=> '$_POST[\'title\'],$_POST[\'add_content\']', 'deleteArt'=> '$_GET[\'id\']', 'delComm'=> '$_GET[\'id\']','modifArt' => '$_GET[\'id\']' ];