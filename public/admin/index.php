<?php require_once("../../private/initialize.php"); ?>
<?php $page_title = "Admin panel" ?>
<?php $language = "es" ?>
<?php include(SHARED_PATH . "/header.php"); ?>

<!-- Section: name of this section -->
<section id="page-cover" class="hero-section">
  <!-- Here your content -->
  <h1>Admin Panel</h1>
  <a href="<?php echo url_for("admin/books/index.php"); ?>" > My books </a>
  <div class="page-wrapp">This is a page wrapp</div>
  
</section>
<!-- Section ends -->

<!-- Section: name of this section -->
<section id="page-section" class="normal-section">
  <!-- Here your content -->
  Normal section
</section>
<!-- Section: ends -->

<?php include(SHARED_PATH . "/footer.php"); ?>