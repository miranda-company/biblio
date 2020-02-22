<?php 
    require_once("../../private/initialize.php"); 
    $page_title = $_SESSION["username"] . "'s " . "library";
    $language = "es";
    include(SHARED_PATH . "/header.php");
?>

<!-- Section: name of this section -->
<section id="page-cover" class="hero-section">
  <!-- Here your content -->
  <h1>My library</h1>
  <ul>
      <li> <a href="<?php echo url_for("admin/books/index.php"); ?>" > Books </a> </li>
      <li> <a href="<?php echo url_for("admin/books/index.php"); ?>" > Authors </a> </li>
      <li> <a href="<?php echo url_for("admin/books/index.php"); ?>" > Shelves </a> </li>
      <li> <a href="<?php echo url_for("admin/books/index.php"); ?>" > Genres </a> </li>
  </ul>
  
</section>
<!-- Section ends -->

<!-- Section: name of this section -->
<section id="page-section" class="normal-section">
  <!-- Here your content -->
  Normal section
</section>
<!-- Section: ends -->

<?php include(SHARED_PATH . "/footer.php"); ?>