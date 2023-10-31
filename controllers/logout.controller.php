<?php
class logout{
    function logout(){
        session_start();
        session_destroy();
        header("Location: /");
    }
}
