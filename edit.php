<?php
session_start();    
    require_once('database/connection.php');

    if($_GET['id'] && !empty($_GET['id'])) {
        
        $id= strip_tags($_GET['id']);

        $sql = 'SELECT * FROM articles WHERE id= :id';

        $data = $db->prepare($sql);

        $data->bindValue(':id',$id,PDO::PARAM_INT);

        $data->execute();
        $article = $data->fetch();

        if(!$article){

            $sql = 'UPDATE article SET name=:name,price=:price,stock=:stock WHERE id=:id';
        }else{
            header('Location: index.php');
            $_SESSION['message'] = "Article non trouver";
        }
        
    }else{
        header('Location: index.php');
        $_SESSION['message'] = "Desolé! vous n'avez pas droit d'y acceder";
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Editions</title>
</head>
<body>
    <main class="container mt-5">
    <div class="col-ml-12">
            <h1>Edition de l'article <?= $article['name'] ?></h1>
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name"> Name</label>
                        <input type="text" id="name" name="name" value="<?= $article['name'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name"> Price</label>
                        <input type="text" id="price" name="price" value="<?= $article['price'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name"> Stock</label>
                        <input type="text" id="stock" name="stock" value="<?= $article['stock'] ?>" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                      <button type="submit" class="btn btn-primary">Edit</button>
                      <a href="index.php" class="btn btn-danger" >Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>