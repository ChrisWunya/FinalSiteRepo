<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Chris' Corner</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
      </li> -->
      <li class="nav-item">
      <!-- blogPage.php -->
        <a class="nav-link" href="blog.php">Blog</a>
      </li>
      <li class="nav-item">
      <!-- my cms site index.php -->
        <a class="nav-link" href="../cmsSite/">CMS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bioPage.php">Who Am I?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="projectsPage.php">My Projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactPage.php">Talk To Me</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if (!empty( $user )) { ?> <a class="dropdown-item" href="#">Login</a> <?php } ?>
          <!-- <a class="dropdown-item" href="projectsPage.php">My Projects</a> -->
          <!-- <div class="dropdown-divider"></div> -->
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search Blogs" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>