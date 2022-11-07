<!-- This form is to set up requesting the book the user selected on
     the main page and ask for their name for request -->

<?php
    include "view/navigation.php";
    include "model/database.php";
    $id = filter_input(INPUT_GET, 'id');
    $book = getBook($id);
?>
<body class="background">
    <div class="container-fluid">
        <form class="row g-3" style="max-width:650px; margin: 0 auto; padding-top:25px;" action="." method="post">
        <h2>Requesting <?= $book['bookTitle']?></h2>
            <input type="text" name='checkOutCustomer' placeholder='Your First & Last Name'>
            <input type="hidden" name='addCheckOut' value=<?= $book['bookId']?>>
            <input type="submit" class="btn buttonColor d-grid gap-2 col-3 mx-auto" value="Request Book">
        </form>
    </div>
</body>