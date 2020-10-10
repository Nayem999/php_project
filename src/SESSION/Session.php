<?php
namespace App\SESSION;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Session{
    public static function openSession(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static  function getSessionData($sessionName){
        if(self::checkSession($sessionName)) {
            return $_SESSION[$sessionName];
        }
        else
            return false;


}
    public static function setSessionData($sessionName,$sessionValue){
        $_SESSION[$sessionName] = $sessionValue;
}
    public static  function getFlashData($sessionName){
        if(self::checkSession($sessionName)) {
            $v = $_SESSION[$sessionName];
            unset($_SESSION[$sessionName]);
            return $v;
        }
        else return false;
    }

    public static  function checkSession($sessionName){
        if(isset($_SESSION[$sessionName])) return true;
        else return false;
    }
    public static  function clearSessionData($sessionName){
        if(isset($_SESSION[$sessionName])){
            unset($_SESSION[$sessionName]);
            if(!self::checkSession($sessionName)){
return true;
            }
            else{
                return false;
            }
        }
    }
    public static function checkAuthOwner(){
        if(!Self::checkSession("book")){
            if(!Self::getSessionData("book")){
            return FALSE;
            }
        }
        else{
           return TRUE; 
        }
    }

}
?>