<?php

#Page header
$siteTitle = 'Add book';
$siteName = 'Add book';
$siteDescription = '';

#include header.php
include('includes/header.php');
?>

<?php
    # Connecting to the database
    include('includes/connectdb.php');

    # Get data from submit-form and store it in variables
    $title = $_POST['title'];
    $language = $_POST['language'];
    $publishyear = $_POST['publishyear'];
    $price = $_POST['price'];
    $isbn = $_POST['isbn'];
    $authorid = $_POST['authorid'];
    $publisherid = $_POST['publisherid'];
    $bookstoreid = $_POST['bookstoreid'];

    #Prepare SQL-query for insert-operation
    $insertBook = "INSERT INTO book (id, title, language, publishyear, price, isbn, author_id, publisher_id, bookstore_id) VALUES (NULL, '$title', '$language', '$publishyear', '$price', '$isbn', '$authorid', '$publisherid', '$bookstoreid')";

    #EXECUTING SQL-query
    mysqli_query($dbc, $insertBook) or die('Error querying the database!');

?>

    <div id="divspace" class="panel panel-default">
        <div class="panel-heading panel panel-success">Success...</div>
        <div class="panel-body">
            <h2>You have now added <?php echo $title ?> to the book archive.</h2>
        </div><!--END panel-body -->
        <div class="btn-toolbar text-center well">
            <a href="index.php"><button class="btn btn-primary btn-block" >Manage books</button></a>
        </div><!--END panel-footer-->
    </div><!--END divspace -->

<?php
    #Closing database-connection
    mysqli_close($dbc);

    #include footer.php
    include('includes/footer.php');
?>
