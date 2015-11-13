<?php 

function random_name ($adjs, $nouns) 
{
    return $adjs[array_rand($adjs)] . '-' . $nouns[array_rand($nouns)];
}

function randomNamesArray ($arr1, $arr2) 
{
    $randomNamesArray = array();
    for($i = 0; $i < 11; $i++)
    {
        $randomNamesArray["name$i"] = random_name($arr1, $arr2);
    }  
 
    return $randomNamesArray;
}

function pageController ()
{
    $adjs = [
        'asinine', 'exquisite', 'serious', 'enlightened', 'clever', 
        'sarcastic', 'quizzical', 'secular', 'beautiful', 'mysterious'
    ];
    $nouns = [
        'ass', 'mosquito', 'polecat', 'corpse', 'truth',
        'bitch', 'teacher', 'blood', 'highway', 'virus'
    ];

    $randomNames = randomNamesArray($adjs, $nouns);

    return $randomNames;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1 col-md-offset-2"></div>
                <div class="col-md-6">
                    <h1>Your random server name</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-2"></div>
                <div class="col-md-3">
                    <button class='btn btn-primary' id='server-name'>Server Name</button>
                </div>
                <div class="col-md-4">
                    <p class='' id='random-name'><?php var_dump(pageController()); ?></p>
                </div>
                <div class="col-md-offset-3"></div>
            </div>
        </div>
        <script></script>
    </body>
</html>