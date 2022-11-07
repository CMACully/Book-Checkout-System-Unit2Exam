<!-- Programmer: Chauntel Atchley Cully
     Date: 11/2/2022
     Updated: 11/2-7/2022
     Assignment: Unit 2 Exam 
     Goal: Create an MVC library system. The "public" site should show all 
            available books and the ability to "request" a book.
            The "admin" site should show all the books that have been requested 
            and by who. It should also provide the admin to 
            view/add/delete books from the library
     Hurdles: Had to use str_replace for the apostrophe(s) in the bookTitle and bookDesc to 
              work around the exception error thinking it was a single quote for the query
              Had to keep my files outside of the folders except for the Nav and DB 
              as I would get an error trying to call them within a folder -->

<?php 
    include "view/navigation.php";
    include "model/database.php";
    session_set_cookie_params(strtotime('+1 years'), '/');
    session_start();
    $logout = filter_input(INPUT_GET, 'lo');
    if($logout){
        $_SESSION = [];
            
        // Generate a new session ID
        session_regenerate_id(true);
            
    }
    if(empty($_SESSION['cart'])){
        $_SESSION = array();
    }
    
    $del = filter_input(INPUT_GET, 'del');
    if ($del)
    {
        // Delete Books
        $qry = "update books set active = 0 where bookId = $del";
        $myQuery = $db->query($qry);
    }

    $addBook = filter_input(INPUT_POST, 'addBook');
    if ($addBook)
    {
        // Add Book
        $bookTitle = filter_input(INPUT_POST, 'bookTitle');
        $bookTitle = str_replace( "'", "''", $bookTitle);  
        $bookDesc = filter_input(INPUT_POST, 'bookDesc');
        $bookDesc = str_replace( "'", "''", $bookDesc);
        $bookAvail = filter_input(INPUT_POST, 'bookAvail');
        $bookActive = 1;
        $myQuery = "INSERT INTO `books` (`bookId`, `bookTitle`, `bookDesc`, `bookAvail`, `active`) VALUES (NULL, '$bookTitle', '$bookDesc', $bookAvail, $bookActive)";
        // echo($myQuery);
        $qry = $db->query($myQuery);
    }

    $bookID = filter_input(INPUT_POST, 'bID');
    if ($bookID)
    {
        // Save changes
        $bookTitle = filter_input(INPUT_POST, 'bookTitle');
        $bookTitle = str_replace( "'", "''", $bookTitle); 
        $bookDesc = filter_input(INPUT_POST, 'bookDescription');
        $bookDesc = str_replace( "'", "''", $bookDesc);
        $bookAvail = filter_input(INPUT_POST, 'bookAvail');
        $myQuery = "UPDATE `books` SET `bookTitle` = '$bookTitle', `bookDesc` = '$bookDesc', `bookAvail` = '$bookAvail' WHERE `books`.`bookId` = $bookID;";
        // echo($myQuery);
        $qry = $db->query($myQuery);
    }

    $addCheckOut = filter_input(INPUT_POST, 'addCheckOut');
    if ($addCheckOut)
    {
        // get all the books from the database
        $books = getBooks();
        //loop through the books array and display the name of the product    
        foreach($books as $book)
        {
            if ($addCheckOut == $book['bookId'])
            {
                $bookTitle = $book['bookTitle'];
                $bookTitle = str_replace( "'", "''", $bookTitle); 
                // echo($bookTitle);
            }
        } 
        // Add User's name and book selected to Checkout
        $checkOutCustomer = filter_input(INPUT_POST, 'checkOutCustomer');
        $myQuery = "INSERT INTO `checkout` (`checkOutID`, `checkOutDT`, `checkOutBook`, `checkOutCustomer`) VALUES (NULL, current_timestamp(), '$bookTitle', '$checkOutCustomer')";
        // echo($myQuery);
        $qry = $db->query($myQuery);
    }
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="background">
    <div class="container-fluid">
        <div class="main">
            <h1 style="display: flex; justify-content: center;">Welcome to the Delfino Library</h1>
            <h2 style="display: flex; justify-content: center;"> Books in the Library</h2>
            <?php
                // get all the books from the database
                $books = getBooks();
                //loop through the books array and display the name of the product    
                foreach($books as $book)
                {
                    $bookID = $book['bookId'];        
                    echo ("<p><a href='checkout.php?id=$bookID'>$book[bookTitle]</a>  $book[bookDesc]</p>");
                }
            ?>
        </div>
    </div>
</body>

</html>