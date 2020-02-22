<?php

     //------- BOOKS table queries: ------------//

    // Find all books in books table
    function find_all_books(){
        global $db; //< we bring global $db variable
        $sql = "SELECT * FROM books ";
        $sql .= "ORDER BY id ASC";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        return $result;
    }

    // Find a book in books table
    function find_book_by_id($id){
        global $db; //< we bring global $db variable
        $sql = "SELECT * FROM books ";
        $sql .= "WHERE id='" . db_escape($db, $id) . "'";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        $book = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $book; // returns an assoc. array
    }

    // Validate user's input - from book forms
    function validate_book_input($book){
        $errors = [];

        //Check for book title
        if( is_blank($book["title"]) ){
            $errors["error_on_book_title"] = "The book must have a title.";
        }

        return $errors;
    }
    
    // Create new book
    function create_new_book($book){
        global $db;
        
        //Validate new-book data
        $errors = validate_book_input($book);
        if( !empty($errors) ){
            return $errors;
        }
        
        $sql = "INSERT INTO books ";
        $sql .= "(title, fk_author_id, fk_genre_id, fk_language_id, fk_shelve_id, description, rating, lent, borrower, image_url) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $book["title"]) . "',";
        $sql .= "'" . db_escape($db, $book["fk_author_id"]) . "',";
        $sql .= "'" . db_escape($db, $book["fk_genre_id"]) . "',";
        $sql .= "'" . db_escape($db, $book["fk_language_id"]) . "',";
        $sql .= "'" . db_escape($db, $book["fk_shelve_id"]) . "',";
        $sql .= "'" . db_escape($db, $book["description"]) . "',";
        $sql .= "'" . db_escape($db, $book["rating"]) . "',";
        $sql .= "'" . db_escape($db, $book["lent"]) . "',";
        $sql .= "'" . db_escape($db, $book["borrower"]) . "',";
        $sql .= "'" . db_escape($db, $book["image_url"]) . "'";
        $sql .= ")";
        echo $sql;
        $result = mysqli_query($db, $sql);
        
        // For INSERT statements, $result is true / false
        if($result){
            return true;
        }else{
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    // Update book 
    function update_book($book){
        global $db;

        //Validate update data
        $errors = validate_book_input($book);
        if( !empty($errors) ){
            return $errors;
        }

        $sql = "UPDATE books SET ";
        $sql .= "title='" . db_escape($db, $book["title"]) . "', ";
        $sql .= "rating='" . db_escape($db, $book["rating"]) . "', ";
        $sql .= "description='" . db_escape($db, $book["description"]) . "', ";
        $sql .= "lent='" . db_escape($db, $book["lent"]) . "', ";
        $sql .= "borrower='" . db_escape($db, $book["borrower"]) . "' ";
        $sql .= "WHERE id='" . db_escape($db, $book["id"]) . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);
        
        // For UPDATE statements, $result is true / false
        if($result){
            return true;
        }else {
            // Update failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    // Delete book
    function delete_book($id){
        global $db;
        $sql = "DELETE FROM books ";
        $sql .= "WHERE id='" . $id . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);

        // For DELETE statements, $result is true/false
        if($result){
            return true;
        }else {
            // Delete failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        } 
    }

    //------- AUTHORS table queries: ------------//

    // Find all authors in db
    function find_all_authors(){
        global $db;
        $sql = "SELECT * FROM authors ";
        $sql .= "ORDER BY name ASC";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        return $result;
    }

    // Find an author from authors table
    function find_author_by_id($id){
        global $db;
        $sql = "SELECT * FROM authors ";
        $sql .= "WHERE id='" . db_escape($db, $id) . "'";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        $author = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $author; // returns an assoc. array
    }

    // Validate user's input - from author forms
    function validate_author_input($author){
        $errors = [];

        //Check for author's name
        if( is_blank($author["name"]) ){
            $errors["error_on_author_name"] = "The author mus have name.";
        }
        
        //Check for author's surname
        if( is_blank($author["surname"]) ){
            $errors["error_on_author_surname"] = "The author mus have a surname.";
        }
        
        return $errors;
    }

    // Create new author
    function create_new_author($author){
        global $db;
        
        //Validate new-author data
        $errors = validate_author_input($author);
        if( !empty($errors) ){
            return $errors;
        }
        
        $sql = "INSERT INTO authors ";
        $sql .= "(name, surname, bio) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $author["name"]) . "',";
        $sql .= "'" . db_escape($db, $author["surname"]) . "',";
        $sql .= "'" . db_escape($db, $author["bio"]) . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        
        // For INSERT statements, $result is true / false
        if($result){
            return true;
        }else{
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    // Update author
    function update_author($author){
        global $db;
        
        //Validate new-author data
        $errors = validate_author_input($author);
        if( !empty($errors) ){
            return $errors;
        }
        
        $sql = "UPDATE authors SET ";
        $sql .= "name='" . db_escape($db, $author["name"]) . "', ";
        $sql .= "surname='" . db_escape($db, $author["surname"]) . "' ";
        $sql .= "WHERE id='" . db_escape($db, $author["id"]) . "' ";
        $sql .= "LIMIT 1";
        
        $result = mysqli_query($db, $sql);
        
        // For UPDATE statements, $result is true / false
        if($result){
            return true;
        }else {
            // Update failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }


    //------- GENRES TABLE queries: ------------//
    
    // Find all genres in db
    function find_all_genres(){
        global $db;
        $sql = "SELECT * FROM genres ";
        $sql .= "ORDER BY name ASC";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        return $result;
    }

    // Find a genre from genres table
    function find_genre_by_id($id){
        global $db;
        $sql = "SELECT * FROM genres ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        $genre = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $genre; // returns an assoc. array
    }


    //------- LANGUAGES TABLE queries: ------------//

    // Find all languages in db
    function find_all_languages(){
        global $db;
        $sql = "SELECT * FROM languages ";
        $sql .= "ORDER BY name ASC";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        return $result;
    }

    // Find a language from languages table
    function find_language_by_id($id){
        global $db;
        $sql = "SELECT * FROM languages ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        $language = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $language; // returns an assoc. array
    }

    //------- SHELVES TABLE queries: ------------//

    // Find all shelves in db
    function find_all_shelves(){
        global $db;
        $sql = "SELECT * FROM shelves ";
        $sql .= "ORDER BY name ASC";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        return $result;
    }

    // Find a language from languages table
    function find_shelve_by_id($id){
        global $db;
        $sql = "SELECT * FROM shelves ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        $shelve = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $shelve; // returns an assoc. array
    }

?>