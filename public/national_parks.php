<?php
require '../parks_db_constants.php';
require '../db_connect.php';
require '../lib/Input.php';

function pageController($dbc)
{
    $limit = 3;

    $page = (Input::has('page')) ? Input::get('page') : 1;
    $nextPage = $page + 1;
    $perviousPage = $page - 1;

    $selectAll = 'SELECT * FROM national_parks LIMIT ' . $limit . ' OFFSET ' . ($limit * $page - $limit) . ';';
    $rowCount = 'SELECT COUNT(*) FROM national_parks;';

    $count = $dbc->query($rowCount)->fetchColumn();
    $pageLimiter = ceil($count / $limit);

    $stmt = $dbc->query($selectAll);
    $parks = $stmt->fetchAll(PDO::FETCH_ASSOC);


    return array(
        'stmt' => $stmt,
        'nextPage' => $nextPage,
        'perviousPage' => $perviousPage,
        'parks' => $parks,
        'page' => $page,
        'pageLimiter' => $pageLimiter
        );
}

extract(pageController($dbc));

function activeClass($page)
{
    return ($_GET['page'] == $page)? 'active' : '';
}

function lowPage($page)
{
    return ($page < 1)? 'disabled' : '';
}

function highPage($pageLimiter, $page)
{
    return ($pageLimiter <= $page)? 'disabled' : '';
}

$i = 1;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="css/main.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <style>
            .container {width: 650px;}
            .disabled {pointer-events: none;}
            #pages {text-align: center;}
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class='page-header'>US National Parks <small>Page <?= $page;?> of <?= $pageLimiter ?></small></h1>
            <table class="table table-condensed table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Park Name</th>
                        <th>Location: State</th>
                        <th>Date Established</th>
                        <th>Park Size (in acres)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($parks as $park): ?>
                    <tr>
                        <td><a href="<?= $park['parkURL'] ?>"> <?= $park['name']; ?></a></td>
                        <td> <?= $park['location']; ?> </td>
                        <td> <?= $park['date_established']; ?> </td>
                        <td> <?= $park['area_in_acres']; ?> </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        <nav>
          <ul class="pager">
            <li class='previous'>
            <?php if($page > 1): ?>
                    <a href='?page=<?=($perviousPage)?>'>Previous</a>
            <?php endif ?>
            </li>

            <li class='next'>
            <?php if($pageLimiter > $page): ?>
                    <a href='?page=<?=($nextPage)?>'>Next</a>
            <?php endif ?>
            </li>
          </ul>
        </nav>
        
        <nav id='pages'>
            <ul class="pagination">
                <li class='<?= lowPage($perviousPage) ?>'>
                        <a href='?page=<?= $perviousPage ?>' aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                </li>

                <?php while($i <= $pageLimiter): ?>
                    <li class="<?= activeClass($i) ?>" >
                        <a href="?page=<?= $i ?>"><?= $i++; ?></a>
                    </li>
                <?php endwhile ?>

                <li class='<?= highPage($pageLimiter, $page) ?>'>
                    <a href='?page=<?= $nextPage ?>' aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

        <script ></script>
    </body>
</html>
