<?php 
    require_once("../../../private/initialize.php");
    
    $test = $_GET["test"] ?? "";
    
    if($test == "404"){
        error_404();
    } elseif($test == "500"){
        error_500();
    } elseif($test == "redirect"){
        redirect_to(url_for("index.php"));
    }
?>

<?php $page_title = "New Book" ?>
<?php include(SHARED_PATH . "/header.php"); ?>

<!-- Section: name of this section -->
<section id="page-cover" class="hero-section">

  <!-- Here your content -->
  <h1>New book</h1>
  <a href="<?php echo url_for("admin/books/index.php"); ?>" > &laquo; back to my books</a>

  <!-- Form -->
  <form action="<?php echo url_for("admin/books/create.php"); ?>" method="post">
    <dl>
        <dt>Book title</dt>
        <dd> <input type="text" name="book_title" value="" /> </dd>
    </dl>

    <dl>
        <dt>Author</dt>
        <dd> <input type="text" name="author_name" value="" /> </dd>
    </dl>

    <dl>
        <dt>Genre</dt>
        <dd> <input type="text" name="genre" value="" /> </dd>
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