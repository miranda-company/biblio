<?php 
    //! delete.php is a single page form submision
    require_once("../../../private/initialize.php");

    if( !isset($_GET["id"]) ) {
        redirect_to(url_for("admin/books/index.php"));
    }

    $id = $_GET["id"];

    if(is_post_request()) {
        // Delete book after confirmation / POST request
        delete_book($id);
        redirect_to(url_for("admin/books/index.php"));
    } else {
        //Find the data of the book we want to delete
        $book = find_book_by_id($id);
    }
?>

<?php 
    $page_title = "Delete / ". $book["title"];
    include(SHARED_PATH . "/header.php");
?>

<!-- Section: name of this section -->
<section id="page-cover" class="hero-section">
  <!-- Here your content -->
  <h1>Delete book</h1>
  <a href="<?php echo url_for("admin/books/index.php"); ?>" > &laquo; back to my books </a>

  <h3>Are you sure you want to delete this book?</h3>
  <h4><?php echo h( $book["title"] ); ?></h4>

  <form action="<?php echo url_for("admin/books/delete.php?id=" . h( u($id) ) ); ?>" method="post">
    <div id="submit-btn">
        <input type="submit" value="Delete book">
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