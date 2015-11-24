<?php 
require_once 'functions.php';
require_once '../../lib/Input.php';
require_once '../../lib/Auth.php';
require_once '../../lib/Log.php';

function pageController () 
{
    session_start();
    $unauthorizedMessage = '';
    $isAuthorized = false;
    $session = session_id();

    if (Auth::checkSession($session)) {
        header("Location: authorized.php");
        die();
    } elseif (!empty($_POST)){

        $userName = Input::get('username');
        $password = Input::get('password');       
        $log = new Log();

        if (Auth::attempt($userName, $password)) {
            $log->logInfo("User {$userName} logged in.");
            header("Location: authorized.php");
            die();        
        } else {
            $log->logError("User {$userName} failed to logged in.");
            $unauthorizedMessage[] = "You have failed to login correctly\n";
            $unauthorizedMessage[] = "The combination of username and password were incorrect";
            $unauthorizedMessage[] = "Pleas use corret login info or re-enter to make correct";
        }
    }

  
        return array(
            'username' => $userName,
            'password' => $password,
            'unauthorizedMessage' => $unauthorizedMessage
        );


}
extract(pageController());
var_dump($_POST);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <style>
            .no-login {
                color: white;
            }
            .form-control:focus {
                border-color:#ccc;
                border-color:rgba(82,168,236,.8);
                outline:0;
                outline:thin dotted\9;
                -webkit-box-shadow:0 0 8px rgba(82,168,236,.6);
                box-shadow:0 0 8px rgba(82,168,236,.6)
            }
        </style>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <!-- Modal -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="magicWords">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="magicWords">Enter your name and password..exactly</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="username-input">Username</label>
                                <input name='username' type="text" class="form-control" id="username-input" placeholder="Username" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password-input">Password</label>
                                <input name='password' type="password" class="form-control" id="password-input" placeholder="Magic Words">
                            </div>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning" >Log-In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container well">
            <?php if (!empty($unauthorizedMessage)) : ?>
                <div class="not_auth">
                    <h1>Attention <?= $userName ?> </h1>
                    <?php foreach ($unauthorizedMessage as $messageline) :?>
                        <h2 class='no-login'><?= $messageline ?></h2>
                    <?php endforeach; ?> 
            <?php endif; ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login-modal">
                Dare to login?
            </button>
                </div>
        </div>
        <script>
            $('.modal').on('shown.bs.modal', function() {
                $(this).find('[autofocus]').focus();
            });
        </script>
    </body>
</html>