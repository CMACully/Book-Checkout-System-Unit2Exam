<!-- This controller is just to hold the books that are available with the edit and delete function.
     This displays when the verified admin clicks on the View Books button -->

<?php
    include "view/navigation.php";
    include "model/database.php";
?>
<body class="background">
    <div class="container-fluid">
        <div class="main" style="margin: 0 auto; padding-top:25px;">
            <h2 style='display: flex; justify-content: center;'>Edit Books</h2>
            <?php
                $books = getBooks();
                //loop through the products array and display the name of the product    
                foreach($books as $book)
                {
                    $bookID = $book['bookId'];        
                    echo ("<a href='edit.php?id=$bookID'>Edit</a> | <a href='./?del=$bookID'>Del</a> $book[bookTitle]</br>");
                }
            ?>
                
        </div>
    </div>
</body>