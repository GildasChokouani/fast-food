<!DOCTYPE html>
<html>
    <head>
        <title>fast food</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scal=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>  
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <h1 class="text-logo text-center"> <span class="glyphicon glyphicon-cutlery"></span>fast food <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span></h1>
    <div class="container admin">
        <div class="row">
            <h1> <strong>liste des produits</strong>   <a class="btn btn-success btn-lg" href="insert.php" role="button"><span class="glyphicon glyphicon-plus"></span>ajouter</a> </h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>nom</th>
                        <th>description</th>
                        <th>prix</th>
                        <th>catégorie</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'database.php';
                    $db = database::connect();
                    $requete = 'SELECT items.id, items.name, items.description, items.price, categories.name AS category
                    FROM items LEFT JOIN categories ON items.category = categories.id
                    ORDER BY items.id DESC';
                    $statement = $db->query($requete);
                    while ($item = $statement->fetch()){
                     echo '<tr>'; 
                       echo '<td>' .$item['name']. '</td>';
                       echo '<td>' .$item['description']. '</td>';
                       echo '<td>' .$item['price']. '</td>';
                       echo '<td>' .$item['category']. '</td>';
                       echo'<td width=300>';
                        echo'<a class="btn btn-defauld " href="view.php?id='. $item['id'] .'" role="button"><span class="glyphicon glyphicon-cutlery"></span>voir</a>';
                        echo'<a class="btn btn-primary " href="update.php?id='. $item['id'] .'" role="button"><span class="glyphicon glyphicon-cutlery"></span>modifier</a>';
                        echo'<a class="btn btn-danger  " href="delete.php?id='. $item['id'] .'" role="buttun"><span class="glyphicon glyphicon-cutlery"></span>suprimer</a>';
                        echo'td';
                     echo'</tr>'; 
                    }


                    ?>

                </tbody>    
            </table>
        </div> 
    </div>
    </body>
    </html>