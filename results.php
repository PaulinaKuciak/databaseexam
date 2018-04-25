<?php
#Page header
$siteTitle = 'Search Result';
$siteName = 'Bogtorvets collection of rare books';
$siteDescription = '';

#Include header.php
include('includes/header.php');
?>

<h1>Search Result(s)</h1>
<?php
  #Get the values searchtype and searchterm from previous page and create short variables
  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);

  #Check and see whether the searchtype and searchterm variables are set
  if (!$searchtype || !$searchterm) {
     echo '<div class="alert alert-danger"><strong>Error occured when searching. Please write something in the searchterm field!</strong></div>';
     echo '<a href="index.php"><button class="btn btn-primary btn-lg btn-block" onclick="goBack()">Go Back</button></a>';
     exit;
  }

  if (!get_magic_quotes_gpc()){
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
  }

  #Connecting to the database
  include('includes/connectdb.php');

  #Checking if there was an problem connecting the database
  if (mysqli_connect_errno()) {
     echo 'Error: There was an database connection error!';
     exit;
  }
  #Preparing a INNER-Join SQL-Query
  $query = "SELECT book.title AS title, book.price AS price, book.language AS language, book.publishyear AS publishyear, book.isbn AS isbn, author.fullname AS fullname, bookstore.name AS bookstore, publisher.name AS publisher
            FROM book INNER JOIN author ON book.author_id = author.id INNER JOIN bookstore ON book.bookstore_id = bookstore.id INNER JOIN publisher ON book.publisher_id = publisher.id WHERE ".$searchtype." like '%".$searchterm."%'";

	 #Checking if the INNER-Join SQL-Query has an error - if it has an error it will prompt for an error message
     if(!$result = mysqli_query($dbc, $query)) {
    	die('There was an error running the query: ' . $dbc->error);
    	exit;
	}
	else
	{
        #Executing SQL-query
	    $result = mysqli_query($dbc, $query);
        #Counting number of records i query
        $num_results = mysqli_num_rows($result);
    ?>
		<div class='container'>
            <div class='row'>
                <p>Number of matches:<?php echo $num_results ?></p>

			    <table class="table table-striped">
			    <thead>
            <tr>
                <th>Nr.</th>
		        <td>Title</td>
                <td>Author</td>
                <td>Language</td>
                <td>Year</td>
                <td>Publisher</td>
			    <td>Bookstore</td>
                <td>Price</td>
                <td>ISBN</td>
			        </tr>
			    </thead>
			    <tbody>

              <!-- Begining for Loop -->
			  <?php for ($i=0; $i <$num_results; $i++) {
			     $row = $result->fetch_assoc();
			      echo    '<tr>';
			      echo      '<th>'.($i+1).'</th>';
			      echo      '<td>'. htmlspecialchars(stripslashes($row['title'])) .'</td>';
                  echo      '<td>'. htmlspecialchars($row['fullname']) .'</td>';
			      echo      '<td>'. stripslashes($row['language']) .'</td>';
                  echo      '<td>'. stripslashes($row['publishyear']) .'</td>';
			      echo      '<td>'. stripslashes($row['publisher']) .'</td>';
			      echo      '<td>'. stripslashes($row['bookstore']) .'</td>';
                  echo      '<td>'. stripslashes($row['price']) .'</td>';
                  echo      '<td>'. stripslashes($row['isbn']) .'</td>';
			      echo    '</tr>';

			  }
			  ?> <!-- For Loop ending -->
                </tbody>
			    </table>
			    <a href="index.php"><button class="btn btn-primary btn-lg btn-block" onclick="goBack()">Go Back</button></a>
			</div>
		</div><!-- CONTAINER END-->

<?php
    #Freeing up MySQL ressources
    mysqli_free_result($result);

  	}

    #Closing database connection
  	mysqli_close($dbc);

    #include footer.php
    include('includes/footer.php');
?>
?>
