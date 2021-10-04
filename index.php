<?php include_once 'includes/header.php';
// phpinfo();

// error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// require_once('config.php');
// require_once('functions.php');

// start session
// session_start();

  // if user session is set then save to $user_id
  // search in $user array
// if ( isset( $_SESSION['user_id'] ) ) {
//     $user_id = $_SESSION['user_id'];
//     $user = in_array_r($user_id, $users);
// }



?>


<!-- Body-Start -->
<body>
<!-- <?= define( 'SITE_ROOT',$_SERVER['DOCUMENT_ROOT'] . '/' ); ?> -->
<!-- <?= $_SERVER['DOCUMENT_ROOT']; ?> -->
        <!-- The video -->
        <!-- <video class="loaderWrapper" autoplay muted loop id="myVideo">
          <source class="loader" src="LoadingCircle.mp4" type="video/mp4">
        </video> -->

  <!-- loader -->
    <!-- <div class="loaderWrapper">
      <div class="loader">
      </div>
    </div> -->
  <!-- loader -->

  <div class="bgContainer container-fluid">

  <div class="row">
      <div class="container">
        <h1>Welcome To My Website.</h1>
        <h2>I'm glad you made it here.</h2>
        <h3>Enjoy!</h3>
        <br/>
        <br/>

        <h2>This Website is under development and will be updated shortly.</h2>
        <small>August 1, 2021</small>
        <br/>
        <br/>


        <!-- <form method="POST" action="">
        First: <input type="text" name="fname">
          <input type="submit">
        </form>
        <form method="GET" action="">
        Last: <input type="text" name="lname">
          <input type="submit">
        </form> -->

        <?php





        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //   // collect value of input field
        //   $fname = $_POST['fname'];

        //   if (empty($fname)) {
        //     echo "Name is empty". '<br/>';
        //   } else {
        //     echo $fname. '<br/>';
        //   }
        // }


        // if ($_SERVER["REQUEST_METHOD"] == "GET") {
        //   // collect value of input field
        //   $lname = $_GET['fname'];

        //   if (empty($lname)) {
        //     echo "last Name is empty" . '<br/>';
        //   } else {
        //     echo $lname. '<br/>';
        //   }
        // }


        ?>
      </div>
  </div>

  </div> <!-- background-container -->


 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




  <?php include_once 'scripts.php'; ?>

  <!-- if no user in session then destroy it -->
    <!-- <?php
  // if ( empty( $user ) ) {
  //     session_destroy();
      
  //     include('login.php');
  // } else {
  //     include('home.php');
  // }
  ?> -->
 <!-- Body-End -->
</body>

<!-- footer-start -->
<?php include_once 'includes/footer.php'; ?>
<!-- footer-end -->


<style>




</style>

</html>
