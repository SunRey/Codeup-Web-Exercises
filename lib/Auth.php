<?php
require_once 'Input.php';

class Auth
{
    public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

    public static function attempt($username, $password)
    {
        if($username == 'guest' && password_verify($password, static::$password)) {
            return true; 
        } else {
            return false;
        }

    public static function checkSession($id)
    {
        return ($id == $_REQUEST['sessionId']) ? true : false;
    }

    public static function user()
    {
        return Input::get('username');
    }

    public static function logout()
    {
        function endSession()
        {
            // Unset all of the session variables.
            $_SESSION = array();

            // If it's desired to kill the session, also delete the session cookie.
            // Note: This will destroy the session, and not just the session data!
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // Finally, destroy the session.
            session_destroy();
        }

        endSession();
        header("Location: login.php");
        die();
    }
}