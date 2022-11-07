<!-- This form is to get the verified admin's information on editing a book 
     with the Book's Title, Description, and number of books available -->

<?php
    include "view/navigation.php";
    include "model/database.php";
    $id = filter_input(INPUT_GET, 'id');
    $book = getBook($id);
?>
<body class="background">
    <div class="container-fluid">
        <form class="row g-3" style="max-width:600px; margin: 0 auto; padding-top:25px;" action="index.php" method="post">
            <h1>Selected Book to change</h1>
            <p>Book Title: <?= $book['bookTitle']?></p> 
            <p>Book Description: <?= $book['bookDesc']?></p> 
            <p>Books Available: <?= $book['bookAvail']?></p>
            <input type="text" name='bookTitle' placeholder='Change Book Title'>
            <input type="text" name='bookDescription' placeholder='Change Book Description'>
            <input type="text" name='bookAvail' placeholder='Change Books Available'>
            <input type="hidden" name='bID' value=<?= $book['bookId']?>>
            <input type="submit" class="btn buttonColor d-grid gap-2 col-3 mx-auto" value="Save Changes">
        </form>
    </div>
</body>