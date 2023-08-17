<?php
if( empty(session_id()) && !headers_sent()){
    session_start();
}
Session_destroy();
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>