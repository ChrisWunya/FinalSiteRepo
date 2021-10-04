<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Required MetaTags-End -->

  <!-- BootstrapCSS-Start -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- BootstrapCSS-End -->
  <!-- Custom StyleSheets -->
  <link rel="stylesheet" href="/css/reset.css" type="text/css">
  <link rel="stylesheet" href="/css/blogPageStyles.css" type="text/css">

  <!-- Google AdSense-Start BLOGPAGE -->
  <!-- <script data-ad-client="ca-pub-7123050529014764" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7123050529014764" crossorigin="anonymous"></script> -->
  <!-- Google AdSense-End BLOGPAGE -->

  <!-- Navbar-Start -->
  <?php include_once 'includes/nav.php'; ?>
  <!-- Navbar-End -->
  <!-- Connection-Start -->
  <?php include_once 'admin/connection.php'; ?>
  <!-- Connection-End -->

  <title>Chris' Corner</title>

</head>

<body>

  <!-- <div class="bgContainer container-fluid"> -->

  <!-- <div class="dynamicBlogContainer container break-text"> -->

  <div class="header">
    <h2 id='blogheader'><b><?= $_SESSION['post_title']; ?></b></h2>
  </div>
  <!-- <?= var_dump($_GET); ?> -->
  <!-- <?= urldecode($_SESSION['post_id']); ?> -->
  <!-- <a class="" href="?post_id=<?= $_SESSION['post_id']; ?>"> -->
    <div class="row blogRow">
      <div class="leftcolumn">

        <div class="card">

          <h2><?= $_SESSION['post_title']; ?></h2>
          <!-- <button class="btn btn-secondary" type="button">Read More</button> -->

          <h5>Post Created: <?= $_SESSION['post_createdAt']; ?></h5>
          <div class="fakeimg" style="height:215px;">Image</div>
          <p class="postContentP"><?= $_SESSION['post_content']; ?></p>
        </div>

        <!-- <div class="card">
          <h2><?= $_SESSION['post_title']; ?></h2>
          <h5>Post Created: <?= $_SESSION['post_createdAt']; ?> </h5>
          <div class="fakeimg" style="height:215px;">Image</div>
          <p class="postContentP"><?= $_SESSION['post_content']; ?></p>
        -->
        

      </div> <!-- left column end -->
      <!--
      <div class="rightcolumn">
        <div class="card">
          <h2>About Me</h2>
          <div class="fakeimg" style="height:100px;">Image</div>
          <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
        </div>

        <div class="card">
          <h3>Popular Post</h3>
          <div class="fakeimg">Image</div><br>
          <div class="fakeimg">Image</div><br>
          <div class="fakeimg">Image</div>
        </div>

        <div class="card">
          <h3>Follow Me</h3>
          <p><?= $_SESSION['user_profile']; ?></p>
        </div>
-->
    </div> <!-- right column end -->
    </div> <!-- row end -->

    <!-- POST 2 -->
    <div class="header">
    <h2 id='blogheader'><b><?= $_SESSION['post_title']; ?></b></h2>
  </div>
  <!-- <?= var_dump($_GET); ?> -->
  <!-- <?= urldecode($_SESSION['post_id']); ?> -->
  <!-- <a class="" href="?post_id=<?= $_SESSION['post_id']; ?>"> -->
    <div class="row blogRow">
      <div class="leftcolumn">

        <div class="card">

          <h2><?= $_SESSION['post_title']; ?></h2>
          <!-- <button class="btn btn-secondary" type="button">Read More</button> -->

          <h5>Post Created: <?= $_SESSION['post_createdAt']; ?></h5>
          <div class="fakeimg" style="height:215px;">Image</div>
          <p class="postContentP"><?= $_SESSION['post_content']; ?></p>
        </div>

        <!-- <div class="card">
          <h2><?= $_SESSION['post_title']; ?></h2>
          <h5>Post Created: <?= $_SESSION['post_createdAt']; ?> </h5>
          <div class="fakeimg" style="height:215px;">Image</div>
          <p class="postContentP"><?= $_SESSION['post_content']; ?></p>
        -->
        

      </div> <!-- left column end -->
      <!--
      <div class="rightcolumn">
        <div class="card">
          <h2>About Me</h2>
          <div class="fakeimg" style="height:100px;">Image</div>
          <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
        </div>

        <div class="card">
          <h3>Popular Post</h3>
          <div class="fakeimg">Image</div><br>
          <div class="fakeimg">Image</div><br>
          <div class="fakeimg">Image</div>
        </div>

        <div class="card">
          <h3>Follow Me</h3>
          <p><?= $_SESSION['user_profile']; ?></p>
        </div>
-->
    </div> <!-- right column end -->
    </div> <!-- row end -->
    <!-- POST 2 -->


  <?php
  // $data = $_GET['post_id='];
  // echo 'data'.$data;
  ?>


  <!-- <?= var_dump($_GET); ?> -->
  <?php include_once 'includes/footer.php'; ?>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>