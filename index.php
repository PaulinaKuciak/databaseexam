
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>Bogtorvet Book Database</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

     <!-- Font Awesome -->
     <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Bogtorvet Book Database</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Rare Book Collection</h1>
            <p class="lead">This is a collection of all the books in our database. Here you can search the database.</p>
        </div>
    </div>

    <ul class="cards">
      <li class="cards__item">
        <div class="card">
          <div class="card__image card__image--fence"></div>
          <div class="card__content">
           
            <!-- The form to search the database for the specific query -->
            <div class="card__title">Search for a book</div>
            <p class="card__text">Here you can search for a specific book by title, author, year and so on.</p>
            <form action="results.php" method="post">
              <label for="searchtype">Search by:</label>
              <select name="searchtype" class="form-control">
                <option value="title">Title
                <option value="fullname">Author
                <option value="language">Language
                <option value="isbn">ISBN
              </select>
              <br />
              <div class="form-group">
                <label for="searchterm">Enter Search Term:</label>
                <input type="text" name="searchterm" class="form-control" id="search" placeholder="Search text...">
              </div>
              <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Search">
            </form><!-- FORM END-->
          </div>
        </div>
      </li>
      <li class="cards__item">
        <div class="card">
          <div class="card__image card__image--river"></div>
          <div class="card__content">
            <div class="card__title">Add book to the database</div>
            <p class="card__text">Here you can add a book to the database, and make it searchable afterwards.</p>
            <a href="addbook.php"><button class="btn btn--block card__btn">Add book</button></a>
          </div>
        </div>
      </li>
      <li class="cards__item">
        <div class="card">
          <div class="card__image card__image--flowers"></div>
          <div class="card__content">
            <div class="card__title">View Books</div>
            <p class="card__text">View all the books in our collection, and find what you need.</p>
            <a href="booklist.php"><button class="btn btn--block card__btn">View books</button></a>
          </div>
        </div>
      </li>
    </ul>

  <?php include('includes/footer.php');  ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
