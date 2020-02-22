<?php
  require_once("../../../private/initialize.php"); 
<<<<<<< HEAD
  $page_title = "My Books";
=======
  $page_title = "My books";
>>>>>>> 797343f3dbf27e749318809d9cc70b12f56bef08
  include(SHARED_PATH . "/header.php");

  //Perform a query to the database and get all books inside table books. Check private/query_functions.php
  $book_data = find_all_books();
?>

<!-- Section: name of this section -->
<section id="page-cover" class="hero-section">
  
  <!-- Here your content -->
  <h1>My books</h1>
  <a href="<?php echo url_for("admin/index.php"); ?>" > &laquo; back to admin panel</a>

  
  <div class="page-wrapp">
    Your list of books
    <a href="<?php echo url_for( "admin/books/new.php"); ?>"> Add book </a>
  </div>

  <table class="book-list">
    <tr>
      <th>ID</th>
<<<<<<< HEAD
      <th>Title</th>
      <th>Author</th>
      <th>Genre</th>
=======
      <th>Book Title</th>
      <th>Author (FK)</th>
      <th>Genre (FK)</th>
      <th>Language (FK)</th>
      <th>Shelve (FK)</th>
>>>>>>> 797343f3dbf27e749318809d9cc70b12f56bef08
      <th>Description</th>
      <th>Rating</th>
      <th>Lent?</th>
      <th>To whom?</th>
<<<<<<< HEAD
=======
      <th>Book cover</th>
>>>>>>> 797343f3dbf27e749318809d9cc70b12f56bef08
    </tr>

    <?php while($book = mysqli_fetch_assoc($book_data)) { ?>
    <tr>
      <td> <?php echo h($book["id"]); ?> </td>
      <td> <?php echo h($book["title"]); ?> </td>
<<<<<<< HEAD
      <!-- Get author's name from authors table -->
      <?php $book_author = find_author_by_id( $book["author_id"] ); ?>
      <td> <?php echo h($book_author["name"] . " " . $book_author["surname"]); ?> </td>
      <!---->
      <td> <?php echo h($book["genre_id"]); ?> </td>
      <td> <?php echo h($book["description"]); ?> </td>
      <td> <?php echo h($book["rating"]); ?> </td>
      <td> <?php echo $book["borrowed"] == 1 ? "yes" : "no"; ?> </td>
      <td> <?php echo h($book["borrower"]); ?> </td>
      <td> <a href="<?php echo url_for( "admin/books/show.php?id=" . h(u($book["id"])) ); ?>"> View </a> </td>
      <td> <a href="<?php echo url_for( "admin/books/edit.php?id=" . h(u($book["id"])) . "&author_id=" . h(u($book["author_id"])) ); ?>"> Edit </a> </td>
=======
      
      <!-- Get author's name from authors table -->
      <?php $book_author = find_author_by_id( $book["fk_author_id"] ); ?>
      <td> <?php echo h($book_author["name"] . " " . $book_author["surname"]); ?> </td>
      <!---->

      <!-- Get genre from genres table -->
      <?php $genre = find_genre_by_id( $book["fk_genre_id"] ); ?>
      <td> <?php echo h($genre["genre"]); ?> </td>
      <!---->

      <!-- Get language from languages table -->
      <?php $language = find_language_by_id( $book["fk_language_id"] ); ?>
      <td> <?php echo h($language["language"]); ?> </td>
      <!---->

      <!-- Get shelve from shelves table -->
      <?php $shelve = find_shelve_by_id( $book["fk_shelve_id"] ); ?>
      <td> <?php echo h($shelve["shelve"]); ?> </td>
      <!---->

      <td> <?php echo h($book["description"]); ?> </td>
      <td> <?php echo h($book["rating"]); ?> </td>
      <td> <?php echo $book["lent"] == 1 ? "yes" : "no"; ?> </td>
      <td> <?php echo h($book["borrower"]); ?> </td>
      <td> <?php echo h($book["img_url"]); ?> </td>
      <td> <a href="<?php echo url_for( "admin/books/show.php?id=" . h(u($book["id"])) ); ?>"> View </a> </td>
      <td> <a href="<?php echo url_for( "admin/books/edit.php?id=" . h(u($book["id"])) . "&author_id=" . h(u($book["fk_author_id"])) ); ?>"> Edit </a> </td>
>>>>>>> 797343f3dbf27e749318809d9cc70b12f56bef08
      <td> <a href="<?php echo url_for( "admin/books/delete.php?id=" . h(u($book["id"])) ); ?>"> Delete </a> </td>
    </tr>
    <?php } ?>
  </table>

  <?php
    // Release returned data
    mysqli_free_result($book_data);
  ?>
</section>
<!-- Section ends -->

<!-- Section: name of this section -->
<section id="page-section" class="normal-section">
  <!-- Here your content -->
  Normal section
</section>
<!-- Section: ends -->

<?php include(SHARED_PATH . "/footer.php"); ?>