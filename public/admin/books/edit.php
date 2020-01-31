<?php 
    require_once("../../../private/initialize.php");
    
    if( !isset($_GET["id"]) ) {
        redirect_to(url_for("admin/books/index.php"));
    }
    $id = $_GET["id"];
    $book_title = "";
    $author_name = "";
    $genre = "";
    $rating = "";
    $description = "";
    $lent = "";
    $borrower = "";

    if(is_post_request()) {
        //Handle form values sent by new.php
        $book_title = $_POST["book_title"];
        $author_name = $_POST["author_name"];
        $genre = $_POST["genre"];
        $rating = $_POST["rating"];
        $description = $_POST["description"];
        $lent = $_POST["lent"];
        $borrower = $_POST["borrower"];

        //Display form parameters into our html
        echo "Form parameters<br/>";
        echo "Book title: " . $book_title . "<br/>";
        echo "Author: " . $author_name . "<br/>";
        echo "Genre: " . $genre . "<br/>";
        echo "Rating: " . $rating . "<br/>";
        echo "Description: " . $description . "<br/>";
        echo "lent: " . $lent . "<br/>";
        echo "borrower: " . $borrower . "<br/>";
    } 

?>

<?php $page_title = "New Book" ?>
<?php include(SHARED_PATH . "/header.php"); ?>

<!-- Section: name of this section -->
<section id="page-cover" class="hero-section">
  <!-- Here your content -->
  <h1>Edit book</h1>
  <a href="<?php echo url_for("admin/books/index.php"); ?>" > &laquo; back to my books </a>

  <form action="<?php echo url_for("admin/books/edit.php?id=" . h( u($id) ) ); ?>" method="post">
    <dl>
        <dt>Book title</dt>
        <dd> <input type="text" name="book_title" value="<?php echo $book_title; ?>" /> </dd>
    </dl>

    <dl>
        <dt>Author</dt>
        <dd> <input type="text" name="author_name" value="<?php echo $author_name; ?>" /> </dd>
    </dl>

    <dl>
        <dt>Genre</dt>
        <dd> <input type="text" name="genre" value="<?php echo $genre; ?>" /> </dd>
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
        <dd> <input type="text" name="description" value="<?php echo $description; ?>" /> </dd>
    </dl>

    <dl>
        <dt>You lent it?</dt>
        <dd> <input type="text" name="lent" value="" /> </dd>
    </dl>

    <dl>
        <dt>Who borrowed it?</dt>
        <dd> <input type="text" name="borrower" value="" /> </dd>
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