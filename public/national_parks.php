<?php
require '../parks_db_constants.php';
require '../db_connect.php';
require '../lib/Input.php';

function pageController($dbc)
{

    if(Input::notEmpty('name') && Input::notEmpty('parkURL') && Input::notEmpty('location') && Input::notEmpty('date_established') && Input::notEmpty('area_in_acres') && Input::notEmpty('description')) {
        $newPark = $dbc->prepare('INSERT INTO national_parks (name, parkURL, location, date_established, area_in_acres, description) VALUES(:name, :parkURL, :location, :date_established, :area_in_acres, :description);');
        $newPark->bindValue(':name', Input::get('name'), PDO::PARAM_STR);
        $newPark->bindValue(':parkURL', Input::get('parkURL'), PDO::PARAM_STR);
        $newPark->bindValue(':location', Input::get('location'), PDO::PARAM_STR);
        $newPark->bindValue(':date_established', Input::get('date_established'), PDO::PARAM_STR);
        $newPark->bindValue(':area_in_acres', Input::get('area_in_acres'), PDO::PARAM_STR);
        $newPark->bindValue(':description', Input::get('description'), PDO::PARAM_STR);
        $newPark->execute();
    } else {
        $topDisplay = 'Please enter ALL information correctly';
    }

    if(Input::notEmpty('id')) {
        $id = Input::get('id');
        $delete = $dbc->prepare('DELETE FROM national_parks WHERE id = :id');
        $delete->bindValue(':id', $id, PDO::PARAM_INT);
        $delete->execute();
    }

    $page = (Input::has('page'))? Input::get('page') : 1;
    $nextPage = $page + 1;
    $previousPage = $page - 1;
    $limit = 3;
    $offset = $limit * $page - $limit;
    $rowCount = 'SELECT COUNT(*) FROM national_parks';
    $count = $dbc->query($rowCount)->fetchColumn();
    $pageLimiter = ceil($count / $limit);

    $stmt = $dbc->prepare('SELECT * FROM national_parks LIMIT :limit OFFSET :offset');

    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $parks = $stmt->fetchAll(PDO::FETCH_ASSOC);



    return array(
        'stmt' => $stmt,
        'nextPage' => $nextPage,
        'previousPage' => $previousPage,
        'parks' => $parks,
        'page' => $page,
        'pageLimiter' => $pageLimiter
        );
}

extract(pageController($dbc));

function lowPage($page)
{
    return ($page < 1)? 'disabled' : '';
}

function highPage($pageLimiter, $page)
{
    return ($pageLimiter <= $page)? 'disabled' : '';
}

function isActivePage($page, $i) 
{
    return ($page == $i) ? 'active' : '';
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
            .container {width: 800px;}
            .disabled {pointer-events: none;}
            #pages {text-align: center;}
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class='page-header'>US National Parks <small>Page <?= $page;?> of <?= $pageLimiter ?></small></h1>
            <table class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th>Park Name</th>
                        <th>Location: State</th>
                        <th>Date Established</th>
                        <th>Park Size (in acres)</th>
                        <th>Park Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($parks as $park): ?>
                    <tr>
                        <td><a href="<?= $park['parkURL'] ?>"> <?= $park['name']; ?></a></td>
                        <td> <?= $park['location']; ?> </td>
                        <td> <?= $park['date_established']; ?> </td>
                        <td> <?= $park['area_in_acres']; ?> </td>
                        <td> <?= $park['description']; ?> </td>
                        <td> <a class="btn btn-danger" href='?page=<?= $page ?>&id=<?= $park['id'] ?>'>Delete</a>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        <nav>
          <ul class="pager">
            <li class='previous'>
            <?php if($page > 1): ?>
                    <a href='?page=<?=($previousPage)?>'>Previous</a>
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
                <li class='<?= lowPage($previousPage) ?>'>
                        <a href='?page=<?= $previousPage ?>' aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                </li>

                <?php while($i <= $pageLimiter): ?>
                    <li class='<?= isActivePage($page, $i) ?>' >
                        <a href='?page=<?= $i ?>'><?= $i++; ?></a>
                    </li>
                <?php endwhile ?>

                <li class='<?= highPage($pageLimiter, $page) ?>'>
                    <a href='?page=<?= $nextPage ?>' aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="well">
            <form method='POST' role='form'>
                <div class="form-group">
                    <label for="name">New Park</label>
                    <input type="text" class="form-control" name="name" placeholder="Park Name">
                </div>
                <div class="form-group">
                    <label for="parkURL">Park URL</label>
                    <input type="url" class="form-control" name="parkURL" placeholder="URL for park">
                </div>                                
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location" placeholder="State">
                </div>
                <div class="form-group">
                    <label for="date_established">Date Established</label>
                    <input type="date" class="form-control" name="date_established">
                </div>
                <div class="form-group">
                    <label for="area_in_acres">Park Size</label>
                    <input type="text" class="form-control" name="area_in_acres" placeholder="In Acres">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="3" name="description"placeholder="About the park"></textarea>
                </div>
                <button class="btn btn-primary" type='submit'>Add</button>
            </form>
        </div>
        <script></script>
    </body>
</html>
