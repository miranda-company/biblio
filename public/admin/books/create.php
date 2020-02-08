<?php 
    require_once("../../../private/initialize.php");

    if(is_post_request()) {
        //Handle form values sent by new.php
        $book_title = $_POST["book_title"];
        $author_name = $_POST["author_name"];
        $genre = $_POST["genre"];
        $description = $_POST["description"];
        $rating = $_POST["rating"];
        $lent = $_POST["lent"];
        $borrower = $_POST["borrower"];

        //! create_new_book function is inside private/query_functions.php
        $new_book = create_new_book($book_title, $author_name, $genre, $description, $rating, $lent, $borrower);
        $new_book_id = mysqli_insert_id($db);
        redirect_to(url_for("admin/books/show.php?id=" . $new_book_id) );
       
    } else {
        redirect_to(url_for("admin/books/index.php"));
    }
     
?>