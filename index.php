<?php
  //PDO: init connection
  $pdo = new PDO("sqlite:assets/sql/movies.db");

  // Create SQL request
  $req = $pdo->query("SELECT * FROM Movie");

  // Execute SQL statement
  $result = $req->fetchAll(PDO::FETCH_OBJ);

  // Display
  ?><pre><?php
  //   var_dump($resultat[$result]);
  ?></pre><?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Movies</title>
</head>
<body>
  <section class="container">
  <h1 class="w-25 text-primary text-center mx-auto mb-5">Liste de films</h1>
    <div class="row gap-4">
      <?php
        foreach($result as $film){
          if ($film->rating) {
            $rating = "<li class='list-group-item'><strong>Avis: </strong>" .$film->rating. " / 5</li>";
          }else{
            $rating = "<li class='list-group-item'>Pas d'avis pour le moment.</li>";
          }

          echo "
            <div class='card' style='width: 18rem;'>
              <div class='card-body'>
                <h2 class='card-title'>" .$film->title. "</h2>
              </div>
                <ul class='list-group list-group-flush'>
                  <li class='list-group-item'><strong>Le réalisateur: </strong>" .$film->author. "</li>
                  <li class='list-group-item'><strong>Durée: </strong>" .$film->duration. " min</li>
                  <li class='list-group-item'><strong>Sortie le: </strong>" .$film->date_out. "</li>
                  $rating
                </ul>
            </div>
          ";
        }
      ?>
    </div>
  </section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>