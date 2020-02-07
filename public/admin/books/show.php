<?php require_once("../../../private/initialize.php"); ?>
<?php $page_title = "Book" ?>
<?php include(SHARED_PATH . "/header.php"); ?>

<?php 
  $id = $_GET['id'] ?? '1';
  $book = find_book_by_id($id);
?>

<!-- Section: name of this section -->
<section id="page-cover" class="hero-section">
  <!-- Here your content -->
  <h1>Book</h1>
  <a href="<?php echo url_for("admin/books/index.php"); ?>" > &laquo; back to my books </a>
  
  <div class="page-wrapp"></div>

  <div class="book-container">

    <div class="book-details">
      <dl>
        <dt><h3>Title:</h3></dt>
        <dd><?php echo h($book["title"]) ?></dd>
      </dl>
      <dl>
        <dt><h3>Author:</h3></dt>
        <dd><?php echo h($book["author_id"]) ?></dd>
      </dl>
      <dl>
        <dt><h3>Genre:</h3></dt>
        <dd><?php echo h($book["genre_id"]) ?></dd>
      </dl>
      <dl>
        <dt><h3>Description:</h3></dt>
        <dd><?php echo h($book["description"]) ?></dd>
      </dl>
      <dl>
        <dt><h3>Rating:</h3></dt>
        <dd><?php echo h($book["rating"]) ?></dd>
      </dl>
      <dl>
        <dt><h3>Lent?</h3></dt>
        <dd><?php echo h($book["borrowed"]) ?></dd>
      </dl>
      <dl>
        <dt><h3>Borrowed by:</h3></dt>
        <dd><?php echo h($book["borrower"]) ?></dd>
      </dl>
    </div>

  </div>

  
</section>
<!-- Section ends -->

<!-- Section: name of this section -->
<section id="page-section" class="normal-section">
  <!-- Here your content -->
  Normal section
</section>
<!-- Section: ends -->

<?php include(SHARED_PATH . "/footer.php"); ?>