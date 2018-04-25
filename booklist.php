<?php
#Page Header
$siteTitle = 'View Our Books';
$siteName = 'View Our Books';
$siteDescription = 'Here you can find all our books we have at our disposal';

#Including the header.php file
include('includes/header.php');

#Connecting to the database
include('includes/connectdb.php');

#Creating a SQL INNER JOIN QUERY, which selects data from more than one table.
$sql = "SELECT book.title AS title, book.price AS price, book.language AS language, book.publishyear AS publishyear, book.isbn AS isbn, author.fullname AS fullname, bookstore.name AS bookstore, publisher.name AS publisher
          FROM book INNER JOIN author ON book.author_id = author.id INNER JOIN bookstore ON book.bookstore_id = bookstore.id INNER JOIN publisher ON book.publisher_id = publisher.id";

$result = @mysqli_query($dbc, $sql);

#If the SQL-query ($result) is OK, then display or show all video games records.
if ($result)
{
?>
<table class="table table-striped" id="showcontent">
  <thead>
    <tr>
      <th>Title</th>
      <th>Author</th>
      <th>Language</th>
      <th>Year</th>
      <th>Publisher</th>
      <th>Bookstore</th>
      <th>Price</th>
      <th>ISBN</th>
    </tr>
  </thead>
  <tbody>
    <?php
      #Fetch/collect and print out all videogames
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    ?>
    <tr>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['fullname']; ?></td>
    <td><?php echo $row['language']; ?></td>
    <td><?php echo $row['publishyear']; ?></td>
    <td><?php echo $row['publisher']; ?></td>
    <td><?php echo $row['bookstore']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><?php echo $row['isbn']; ?></td>
    <?php
    }
    ?>
   </tr>
  </tbody>
</table>
<?php
  #Free-up the SQL Query ($-result) ressource
  mysqli_free_result($result);
}
else {
  #if the above if-statement wasnt true then do $this
  echo '<p class="error">The book records did not .</p>';
  #Debugging SQL query
  echo '<p>' . mysqli-error($dbc) . '<br> <br>Query: ' . $sql . '</p>';
  #END else-statement
}

#Closing the database connection
mysqli_close($dbc);

?>
<div class="btn-toolbar text-center well">
  <a href="index.php">
    <button type="button" class="btn btn-primary btn-block">Go to the front-page</button>
  </a>
</div>

<?php
  include('includes/footer.php')
?>
