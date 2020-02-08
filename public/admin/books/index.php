<?php
  require_once("../../../private/initialize.php"); 
  $page_title = "My Books";
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
      <th>Title</th>
      <th>Author</th>
      <th>Genre</th>
      <th>Description</th>
      <th>Rating</th>
      <th>Lent?</th>
      <th>To whom?</th>
    </tr>

    <?php while($book = mysqli_fetch_assoc($book_data)) { ?>
    <tr>
      <td> <?php echo h($book["id"]); ?> </td>
      <td> <?php echo h($book["title"]); ?> </td>
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