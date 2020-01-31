<?php require_once("../../../private/initialize.php"); ?>
<?php $page_title = "Book" ?>
<?php include(SHARED_PATH . "/header.php"); ?>

<!-- Section: name of this section -->
<section id="page-cover" class="hero-section">
  <!-- Here your content -->
  <h1>Book</h1>
  <a href="<?php echo url_for("admin/books/index.php"); ?>" > &laquo; back to my books </a>
  <div class="page-wrapp">
    <?php 
        $id = $_GET['id'] ?? '1';
        echo "Book id " . h($id);
    ?>
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