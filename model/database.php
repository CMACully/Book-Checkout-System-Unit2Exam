<?php
$dsn = "mysql:host=localhost;dbname=library";
$username = "root";
$password = "";

try {
    $db = new PDO($dsn, $username, $password);
    //echo("connected");
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo ("<p>Error message: $error_message");
}


// selects all products from the database
// returns an array of product arrays
function getBooks()
{
    global $db;
    $myQuery = "select * from books where active = 1 order by bookTitle ASC";
    $qry = $db->query($myQuery);
    $books = $qry->fetchAll();
    return $books;
}

// Parameter: bookId
// queries database for that one product
// returns an array of that product
function getBook($id) 
{
    global $db;
    $myQuery = "select * from books where bookID = $id";
    $qry = $db->query($myQuery);
    $rs = $qry->fetch();
    return $rs;
}

// queries database for the entire checkout list
// returns an array of that list
function getCheckout()
{
    global $db;
    $myQuery = "select * from checkout";
    $qry = $db->query($myQuery);
    $checkedOut = $qry->fetchAll();
    return $checkedOut;
}