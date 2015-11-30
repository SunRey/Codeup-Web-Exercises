<?php
require_once 'Input.php';
require 'Log.php';

class Auth
{
    public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';
    public static $defaultUser = 'guest';

    public static function attempt($username, $password, $session)
    {
        $log = new Log();

        $passwordIsValid = password_verify($password, self::$password);
        $usernameIsValid = ($username == self::$defaultUser);

        if($passwordIsValid && $usernameIsValid) {
            $_SESSION['VALID_USER'] = $username;
            $log->logInfo("User {$username} logged in with session-id: {$session}\n");
            return true; 
        } elseif ($username != '') {
            return false;
        }
    }

    public static function checkUser()
    {
        (Input::has('VALID_USER')) ? true : false;
    }

    public static function authorizedCheck()
    {
        isset($_SESSION['VALID_USER']);
    }

    /**
    *Redirect function to url
    * @param url to be redirected to
    */
    public static function redirect($url)
    {
        header("Location: {$url}");
        die();
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