<?php
    require_once("../../private/initialize.php"); 
    $page_title = "Login";
    $language = "es";
    include(SHARED_PATH . "/header.php");
    
    $errors = [];
    $username = "";
    $password = "";

    if(is_post_request()){
        $username = $_POST["username"] ?? "";
        $password = $_POST["password"] ?? "";
        
        $_SESSION["username"] = $username;
        
        redirect_to(url_for("admin/index.php"));
    }
?>


<!-- Section: name of this section -->
<section id="page-cover" class="hero-section">
  <!-- Here your content -->
  <h1>Login</h1>
  
  
  <form action="login.php" method="post">
      Username: <br/>
      <input type="text" name="username" value="<?php echo h($username); ?>" /> <br/>
      Passowrd: <br/>
      <input type="text" name="password" value="" /> <br/>
      <input type="submit" name="submit" value="Login" />
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

