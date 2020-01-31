<?php 
    require_once("../../../private/initialize.php");

    if(is_post_request()) {
        //Handle form values sent by new.php
        $book_title = $_POST["book_title"];
        $author_name = $_POST["author_name"];
        $genre = $_POST["genre"];
        $rating = $_POST["rating"];
        $description = $_POST["description"];
        $lent = $_POST["lent"];
        $borrower = $_POST["borrower"];

        echo "Form parameters<br/>";
        echo "Book title: " . $book_title . "<br/>";
        echo "Author: " . $author_name . "<br/>";
        echo "Genre: " . $genre . "<br/>";
        echo "Rating: " . $rating . "<br/>";
        echo "Description: " . $description . "<br/>";
        echo "lent: " . $lent . "<br/>";
        echo "borrower: " . $borrower . "<br/>";
    } else {
        redirect_to(url_for("admin/books/index.php"));
    }
     
?>