<?php 
    require_once("../../../private/initialize.php");
    $page_title = "Add Book";
    include(SHARED_PATH . "/header.php");

    if(is_post_request()) {
        // Handle POST values for Author
        $author = [];
        $author["name"] = $_POST["author_name"];
        $author["surname"] = $_POST["author_surname"];
        $author["bio"] = "";

        // Create new author
        $new_author = create_new_author($author);
        $new_author_id = mysqli_insert_id($db);

        // Handle POST values for Book
        $book = [];
        $book["title"] = $_POST["book_title"];
        $book["fk_author_id"] = $new_author_id;
        $book["fk_genre_id"] = $_POST["genre"];
        $book["fk_language_id"] = $_POST["language"];
        $book["fk_shelve_id"] = $_POST["shelve"];
        $book["rating"] = $_POST["rating"];
        $book["description"] = $_POST["description"];
        $book["lent"] = $_POST["lent"];
        $book["borrower"] = $_POST["borrower"];
        $book["image_url"] = $_POST["image_url"];

        //! create_new_book function is inside private/query_functions.php
        $new_book = create_new_book($book);
        if($new_book === true){
            $new_book_id = mysqli_insert_id($db);
            redirect_to(url_for("admin/books/show.php?id=" . $new_book_id) );
        }else{
            // Show validation errrors for new item
            // $errors = $new_book;
        }
        
    } else { 
        // Show form 
    }
?>

<!-- Section: name of this section -->
<section id="page-cover" class="normal-section">

  <!-- Here your content -->
  <h1>New book</h1>
  <a href="<?php echo url_for("admin/books/index.php"); ?>" > &laquo; back to my books</a>

  <!-- Form -->
  <form action="<?php echo url_for("admin/books/new.php"); ?>" method="post">
    <dl>
        <dt>Book title</dt>
        <dd> <input type="text" name="book_title" value="" /> </dd>
    </dl>

    <dl>
        <dt>Author's name</dt>
        <dd> <input type="text" name="author_name" value="" /> </dd>
    </dl>

    <dl>
        <dt>Author's surname</dt>
        <dd> <input type="text" name="author_surname" value="" /> </dd>
    </dl>

    <dl>
        <dt>Genre</dt>
        <dd> <input type="text" name="genre" value="" /> </dd>
    </dl>

    <dl>
        <dt>Language</dt>
        <dd> <input type="text" name="language" value="" /> </dd>
    </dl>

    <dl>
        <dt>Shelve label</dt>
        <dd> <input type="text" name="shelve" value="" /> </dd>
    </dl>

    <dl>
        <dt>Rating</dt>
        <dd> 
            <select name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </dd>
    </dl>

    <dl>
        <dt>Description</dt>
        <dd> <input type="text" name="description" value="" /> </dd>
    </dl>

    <dl>
        <dt>You lent it?</dt>
        <dd> <input type="text" name="lent" value="" /> </dd>
    </dl>

    <dl>
        <dt>Who borrowed it?</dt>
        <dd> <input type="text" name="borrower" value="" /> </dd>
    </dl>

    <dl>
        <dt>Cover image</dt>
        <dd> <input type="text" name="image_url" value="" /> </dd>
    </dl>

    <div id="submit-btn">
        <input type="submit" value="Add to my library">
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