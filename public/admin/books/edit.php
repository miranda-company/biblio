<?php 
    require_once("../../../private/initialize.php");
    
    if( !isset($_GET["id"]) ) {
        redirect_to(url_for("admin/books/index.php"));
    }
    $id = $_GET["id"];
    

    if(is_post_request()) {
        //Handle form values sent by new.php
        $book = [];
        $book["id"] = $id;
        $book["title"] = $_POST["book_title"];
        $book["author_id"] = $_POST["author_name"];
        $book["genre_id"] = $_POST["genre"];
        $book["rating"] = $_POST["rating"];
        $book["description"] = $_POST["description"];
        $book["borrowed"] = $_POST["lent"];
        $book["borrower"] = $_POST["borrower"];

        //Update changes made to book and redirect
        $result = update_book($book);
        redirect_to(url_for("admin/books/show.php?id=". $id));

    } else {
        $book = find_book_by_id($id);
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
        <dd> <input type="text" name="book_title" value="<?php echo h($book["title"]); ?>" /> </dd>
    </dl>

    <dl>
        <dt>Author</dt>
        <dd> <input type="text" name="author_name" value="<?php echo h($book["author_id"]); ?>" /> </dd>
    </dl>

    <dl>
        <dt>Genre</dt>
        <dd> <input type="text" name="genre" value="<?php echo h($book["genre_id"]); ?>" /> </dd>
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
        <dd> <input type="text" name="lent" value="<?php echo h($book["borrowed"]) ?>" /> </dd>
    </dl>

    <dl>
        <dt>Who borrowed it?</dt>
        <dd> <input type="text" name="borrower" value="<?php echo h($book["borrower"]) ?>" /> </dd>
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