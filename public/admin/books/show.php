<?php 
  require_once("../../../private/initialize.php"); 

  $id = $_GET['id'] ?? '1';
  $book = find_book_by_id($id);
<<<<<<< HEAD
  $book_author = find_author_by_id( $book["author_id"] );
  $author_name = $book_author["name"] . " " . $book_author["surname"];
=======
  $book_author = find_author_by_id( $book["fk_author_id"] );
  $author_name = $book_author["name"] . " " . $book_author["surname"];
  $genre = find_genre_by_id( $book["fk_genre_id"]);
  $language = find_language_by_id( $book["fk_language_id"]);
  $shelve = find_shelve_by_id( $book["fk_shelve_id"]);
>>>>>>> 797343f3dbf27e749318809d9cc70b12f56bef08
?>

<?php
  $page_title = "My book / ". $book["title"];
  include(SHARED_PATH . "/header.php");
?>

<!-- Section: name of this section -->
<section id="page-cover" class="normal-section">
  <!-- Here your content -->
  <h1>Book</h1>
  <a href="<?php echo url_for("admin/books/index.php"); ?>" > &laquo; back to my books </a>
  
  <div class="page-wrapp"></div>

  <div class="book-container">

    <div class="book-details">
      <dl>
<<<<<<< HEAD
        <dt><h3>Title:</h3></dt>
        <dd><?php echo h($book["title"]) ?></dd>
      </dl>
      <dl>
        <dt><h3>Author:</h3></dt>
        <dd><?php echo h($author_name) ?></dd>
      </dl>
      <dl>
        <dt><h3>Genre:</h3></dt>
        <dd><?php echo h($book["genre_id"]) ?></dd>
      </dl>
=======
        <dt><h3>Book title:</h3></dt>
        <dd><?php echo h($book["title"]) ?></dd>
      </dl>

      <dl>
        <dt><h3>by:</h3></dt>
        <dd><?php echo h($author_name) ?></dd>
      </dl>

      <dl>
        <dt><h3>Genre:</h3></dt>
        <dd><?php echo h($genre["genre"]) ?></dd>
      </dl>

      <dl>
        <dt><h3>Language:</h3></dt>
        <dd><?php echo h($language["language"]) ?></dd>
      </dl>

      <dl>
        <dt><h3>Shelve label:</h3></dt>
        <dd><?php echo h($shelve["shelve"]) ?></dd>
      </dl>

>>>>>>> 797343f3dbf27e749318809d9cc70b12f56bef08
      <dl>
        <dt><h3>Description:</h3></dt>
        <dd><?php echo h($book["description"]) ?></dd>
      </dl>
<<<<<<< HEAD
=======

>>>>>>> 797343f3dbf27e749318809d9cc70b12f56bef08
      <dl>
        <dt><h3>Rating:</h3></dt>
        <dd><?php echo h($book["rating"]) ?></dd>
      </dl>
<<<<<<< HEAD
      <dl>
        <dt><h3>Lent?</h3></dt>
        <dd><?php echo h($book["borrowed"]) ?></dd>
      </dl>
=======

      <dl>
        <dt><h3>Lent?</h3></dt>
        <dd><?php echo h($book["lent"]) ?></dd>
      </dl>

>>>>>>> 797343f3dbf27e749318809d9cc70b12f56bef08
      <dl>
        <dt><h3>Borrowed by:</h3></dt>
        <dd><?php echo h($book["borrower"]) ?></dd>
      </dl>
    </div>

<<<<<<< HEAD
=======
    <dl>
        <dt><h3>Book cover:</h3></dt>
        <dd><?php echo h($book["image_url"]) ?></dd>
      </dl>
    </div>

>>>>>>> 797343f3dbf27e749318809d9cc70b12f56bef08
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