<?php require_once("../../../private/initialize.php"); ?>
<?php $page_title = "Books" ?>
<?php include(SHARED_PATH . "/header.php"); ?>

<?php 
  $books = [
    ["id" => "1", "title" => "La historia interminable", "author_id" => "1", "genre_id" => "1", "description" => "Esto es una breve descripción.", "lent" => "0", "borrower" => "Juan de Dios", "rating" => "5"],
    ["id" => "2", "title" => "El llano en llamas", "author_id" => "2", "genre_id" => "1", "description" => "Esto es una breve descripción.", "lent" => "0", "borrower" => "Juan de Dios", "rating" => "4"],
    ["id" => "3", "title" => "The fountain head", "author_id" => "2", "genre_id" => "1", "description" => "Esto es una breve descripción.", "lent" => "1", "borrower" => "Juan de Dios", "rating" => "4"],
  ];
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
      <th>Rating</th>
      <th>Lent?</th>
    </tr>

    <?php foreach($books as $book) { ?>
    <tr>
      <td> <?php echo h($book["id"]); ?> </td>
      <td> <?php echo h($book["title"]); ?> </td>
      <td> <?php echo h($book["author_id"]); ?> </td>
      <td> <?php echo h($book["genre_id"]); ?> </td>
      <td> <?php echo h($book["rating"]); ?> </td>
      <td> <?php echo $book["lent"] == 1 ? "yes" : "no"; ?> </td>
      <td> <a href="<?php echo url_for( "admin/books/show.php?id=" . h(u($book["id"])) ); ?>"> View </a> </td>
      <td> <a href="<?php echo url_for( "admin/books/edit.php?id=" . h(u($book["id"])) ); ?>"> Edit </a> </td>
      <td> <a href=""> Delete </a> </td>
    </tr>
    <?php } ?>
  </table>

</section>
<!-- Section ends -->

<!-- Section: name of this section -->
<section id="page-section" class="normal-section">
  <!-- Here your content -->
  Normal section
</section>
<!-- Section: ends -->

<?php include(SHARED_PATH . "/footer.php"); ?>