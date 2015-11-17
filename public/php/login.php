<?php 
require_once('functions.php');

function pageController () 
{
    session_start();

    if (! isset($_SESSION['LOGGED_IN_USER'])) {
        $_SESSION['LOGGED_IN_USER'] = false;
    } elseif ($_SESSION['LOGGED_IN_USER']) {
        header("Location: authorized.php");
        die();
    }

    $userName = isset($_POST['user_name']) ? escape($_POST['user_name']) : false;
    $password = isset($_POST['password']) ? escape($_POST['password']) : false;
    $notAuthorizedMessage = false;

    if(!empty($_POST)) {
        if (strtolower($userName) == 'guest' && strtolower($password) == 'password' ) {
            $_SESSION['LOGGED_IN_USER'] = true;
            header("Location: authorized.php");
            die();        
        } else {
            $notAuthorizedMessage[] = "Klaatu Barada N... Necktie... Neckturn... Nickel...\n";
            $notAuthorizedMessage[] = "It's an \"N\" word, it's definitely an \"N\" word! \n";
            $notAuthorizedMessage[] = "Klaatu... Barada... N...[coughs]";
        }
    }

    return array(
            'userName' => $userName,
            'password' => $password,
            'notAuthorizedMessage' => $notAuthorizedMessage
        );
}
extract(pageController());

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
            .book {
                background: url('/img/aod-book.png');
                background-repeat: no-repeat;
                min-height: 688px;
            }
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
                                <input name='user_name' type="text" class="form-control" id="username-input" placeholder="Username" autofocus>
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
        <div class="container">
            <?php if ($notAuthorizedMessage !== false) : ?>
                <div class="book">
                    <?php foreach ($notAuthorizedMessage as $quote) :?>
                        <h2 class='no-login'><?= $quote ?></h2>
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