<?php

#Page header
$siteTitle = 'Add book';
$siteName = 'Add book';
$siteDescription = 'Please fill out the form below with information about the book.';

#Include header.php
include('includes/header.php');
?>

    <i class="fa fa-plus fa-3x">
    </i>
    <form action="addingbook.php" method="post">
        <div class="form-group">
            <label for="title">Book title:</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="To Kill A Mocking Bird...">

            <label for="price">Price:</label>
            <input type="number" name="price" id="price" class="form-control" placeholder="100...">

            <label for="language">Language:</label>
            <input type="text" name="language" id="language" class="form-control" placeholder="Danish...">

            <label for="publishyear">Published Year:</label>
            <input type="text" name="publishyear" id="publishyear" class="form-control" placeholder="2002...">

            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" id="isbn" class="form-control" placeholder="9783161484100...">

            <?php

            # include database connection
            include('includes/connectdb.php');

            # Create a SQL-query to the database
            $authorQuery = "SELECT id, fullname FROM author order by fullname desc";

            # Execute the SQL-query $platformQuery
            $resultauthorQuery = mysqli_query($dbc, $authorQuery);

            # Create a SQL-query to the database
            $publisherQuery = "SELECT id, name, phone, website FROM publisher order by name desc";

            # Execute the SQL-query $platformQuery
            $resultpublisherQuery = mysqli_query($dbc, $publisherQuery);

            # Create a SQL-query to the database
            $bookstoreQuery = "SELECT id, name, location, phone FROM bookstore order by name desc";

            # Execute the SQL-query $platformQuery
            $resultbookstoreQuery = mysqli_query($dbc, $bookstoreQuery);

            # Create a SQL-query to the database
            $bookbookstoreQuery = "SELECT id, quantity FROM bookbookstore order by quantity desc";

            # Execute the SQL-query $platformQuery
            $resultbookbookstoreQuery = mysqli_query($dbc, $bookbookstoreQuery);

            ?>

            <div class="form-group">
                <label for="author">Author:</label>
                <select name="authorid" id="authorid" class="form-control">
                <!-- Looping through array with authors -->

                <?php  while($row = mysqli_fetch_array($resultauthorQuery)): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?></option>
                <!--END of while-looping -->
                <?php endwhile; ?>
                </select>
            </div><!--END author field -->

            <div class="form-group">
                <label for="publisher">Publisher:</label>
                <select name="publisherid" id="publisherid" class="form-control">
                <!-- Looping through array with publisher -->

                <?php  while($row = mysqli_fetch_array($resultpublisherQuery)): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <!--END of while-looping -->
                <?php endwhile; ?>
                </select>
            </div><!--END author field -->

            <div class="form-group">
                <label for="bookstore">Bookstore:</label>
                <select name="bookstoreid" id="bookstore" class="form-control">
                <!-- Looping through array with bookstore -->

                <?php  while($row = mysqli_fetch_array($resultbookstoreQuery)): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <!--END of while-looping -->
                <?php endwhile; ?>
                </select>
            </div><!--END author field -->


        </div>
        <div class="btn-toolbar text-center well">
                <input type="submit" value="Add Book" class="btn btn-primary btn-block">
        </div>
    </form>
    <aside id="asidebook"></aside>

<?php include('includes/footer.php');  ?>
