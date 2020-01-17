<?php
    // nous allons conserver en session les articles favories de l'utilisateur
    session_start();

    if(!isset($_SESSION["favorites"])){$_SESSION["favorites"] = [];}
    
    // Nous créons la fonction pour vérifier si les articles sont en favori ou non
    function checkFavorite($id)
    {
        return in_array($id, $_SESSION["favorite"]);
    }

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax || Utilisation de la session</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .marker{
            display:none;
        }
        .favorite .marker{
            display: block; 
            float: right; 
        }
        .marker:hover{
            background-color: tomato;
        }
    </style>

</head>
<body>
    

    <main class="container">
        <a class="btn btn-warning" id="btn-deconnect" ><i class="fas fa-power-off"></i></a>
        <div class="row" id="blog">
            <div class="col-sm-6">
                <div class="card <?php if(checkFavorite(1)){print"favorite";}?>" id="post-1">
                    <div class="card-body">
                        <span class="btn btn-info marker"><i class="fas fa-heart"></i></span>
                        <h5 class="card-title">Post #1</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>    
                    </div>
                    <a href="#" class="btn btn-outline-success btn-favorite">Ajout au favoris</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card <?php if(checkFavorite(1)){print"favorite";}?>" id="post-2">
                    <div class="card-body">
                        <span class="btn btn-info marker"><i class="fas fa-heart"></i></span>    
                        <h5 class="card-title">Post #2</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <a href="#" class="btn btn-outline-success btn-favorite">Ajout au favoris</a>
                </div>
            </div>
        </div>

    </main>


<script src="assets/js/
ajax.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>