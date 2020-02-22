<?php 
    //! edit.php is a single page form submision
    require_once("../../../private/initialize.php");

    if( !isset($_GET["id"]) || !isset($_GET["author_id"]) ) {
        redirect_to(url_for("admin/books/index.php"));
    }

    $id = $_GET["id"];
    $author_id = $_GET["author_id"];
    
    if(is_post_request()) {
        // Handle POST values for Book
        $book = [];
        $book["id"] = $id;
        $book["title"] = $_POST["book_title"];
        $book["rating"] = $_POST["rating"];
        $book["description"] = $_POST["description"];
        $book["lent"] = $_POST["lent"];
        $book["borrower"] = $_POST["borrower"];

        // Handle POST values for Author
        $author = [];
        $author["id"] = $author_id;
        $author["name"] = $_POST["author_name"];
        $author["surname"] = $_POST["author_surname"];

        //Validate changes made to book. Check query functions inside private/query_functions.php
        $book_update_result = update_book($book);
        $author_update_result = update_author($author);
        
        //If validation is succesful redirect, else show errors to user
        if($book_update_result === true && $author_update_result === true){
            // Send status message, store it in the $_SESSION superglobal in order to display it on the redirect page.
            $_SESSION["status_message"] = "Book info has been updated successfully.";
            redirect_to(url_for("admin/books/show.php?id=". $id));
            
        }else {
            $errors = $book_update_result;
            //var_dump($errors); //< Use var_dump for a better debugging. Comment when finished.
        }

    } else {
        //If it's still not a POST request, get book data from db
        $book = find_book_by_id($id);
        $author = find_author_by_id($author_id);
    }
?>

<?php 
    $page_title = "Edit / ". $book["title"];
    include(SHARED_PATH . "/header.php");
?>

<!-- Section: name of this section -->
<section id="page-cover" class="hero-section">
  <!-- Here your content -->
  <h1>Edit book</h1>
  <a href="<?php echo url_for("admin/books/index.php"); ?>" > &laquo; back to my books </a>

  <!-- Display errors   -->
  <?php echo display_errors($errors); ?>
  <!-- Display errors ends   -->
    
  <form action="<?php echo url_for( "admin/books/edit.php?id=" . h(u($book["id"])) . "&author_id=" . h(u($author["id"])) ); ?>" method="post">
    <dl>
        <dt>Book title</dt>
        <dd> <input type="text" name="book_title" value="<?php echo h($book["title"]); ?>" /> </dd>
    </dl>

    <dl>
        <dt>Author's name</dt>
        <dd> <input type="text" name="author_name" value="<?php echo h($author["name"]); ?>" /> </dd>
    </dl>

    <dl>
        <dt>Author's surname</dt>
        <dd> <input type="text" name="author_surname" value="<?php echo h($author["surname"]); ?>" /> </dd>
    </dl>

    <dl>
        <dt>Genre</dt>
        <dd> <input type="text" name="genre" value="<?php echo h($book["fk_genre_id"]); ?>" /> </dd>
    </dl>

    <dl>
        <dt>Rating</dt>
        <dd> 
            <select name="rating">
                <?php 
                    // We loop through the options to see which one came from the db
                    for($i=1; $i <= 5; $i++){
                        echo "<option value=\"{$i}\"";
                        if($book["rating"] == $i){
                            echo " selected";
                        }
                        echo ">{$i}</option>";
                    }
                ?>
            </select>
        </dd>
    </dl>

    <dl>
        <dt>Description</dt>
        <dd> <input type="text" name="description" value="<?php echo h($book["description"]) ?>" /> </dd>
    </dl>

    <dl>
        <dt>You lent it?</dt>
        <dd> <input type="text" name="lent" value="<?php echo h($book["lent"]) ?>" /> </dd>
    </dl>

    <dl>
        <dt>Who borrowed it?</dt>
        <dd> <input type="text" name="borrower" value="<?php echo h($book["borrower"]) ?>" /> </dd>
    </dl>

    <dl>
        <dt>Cover image</dt>
        <dd> <input type="text" name="image_url" value="<?php echo h($book["image_url"]) ?>" /> </dd>
    </dl>

    <div id="submit-btn">
        <input type="submit" value="Save changes">
    </div>

  </form>
  
  
</section>
<!-- Section ends -->

<!-- Section: name of this section -->
<section id="page-section" class="normal-section">
  <!-- Here your content -->
  Normal section
</section>
<!-- Section: ends -->

<?php include(SHARED_PATH . "/footer.php"); ?>