<!-- This form is to get the verified admin's information on adding a book 
     with the Book's Title, Description, and number of books available -->

<?php
    include "view/navigation.php";
    include "model/database.php";
?>
<body class="background">
    <div class="container-fluid">
        <form class="row g-3" style="max-width:600px; margin: 0 auto; padding-top:25px;" action="index.php" method="post">
            <h1 style="display: flex; justify-content: center;">Add a Book</h1>
            <label for="username">Book Title:</label>
            <input type="text" name='bookTitle'>
            <label for="username">Book Desc:</label>
            <input type="text" name='bookDesc'>
            <label for="username">Books Available:</label>
            <input type="text" name='bookAvail'>
            <input type="hidden" name='addBook' value='TRUE'>
            <input type="submit" class="btn buttonColor d-grid gap-2 col-3 mx-auto" value="Add Book">
        </form>
    </div>
</body>