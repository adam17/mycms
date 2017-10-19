<?php
error_reporting(E_ALL);
//{common functions and variables
include_once('ww.incs/common.php');
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
$id = isset($_REQUEST['id']) ? (int)$_REQUEST['id'] : 0;
//}
//{check page id
if(!$id){
  if($page){ //get by name
    $r=Page::getInstanceByName($page);
    if($r && isset($r->id)){
      $id=$r->id;
    }
    //unset($r);
  }
  if(!$id){ // or get by special field
    $special=1;
    if(!$page){
      $r=Page::getInstanceBySpecial($special);
      if($r && isset($r->id)){
        $id=$r->id;
      }
      unset($r);
    }
  }
}
//}
//{ get the page
if($id){
  $PAGEDATA=(isset($r) && $r) ? $r : Page::getInstance($id);
  echo $PAGEDATA->body;
}
else{
  echo 'Error 404';
  exit;
}
//}
