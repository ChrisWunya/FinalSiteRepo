<?php include_once 'includes/header.php'; ?>

<body>
<div class="bgContainer container-fluid">

<div class="">
  <!--Section: Contact v.2-->
  <section class="justify-content-center">

      <div class="container text-center">
        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold mb-5">Contact Me</h2>
        <p class="w-responsive mx-auto">I would love to create <b>something</b> with you, or for you.
        <br>
        or we can just get a cup of coffee/tea.
        </p>
        <hr class="w-50">
        <p class="w-responsive mx-auto mb-5"><em>Currently located in southern Texas.</em></p>
      </div>

      <div class="row justify-content-center">
        <div class="form-box">
          <!--Grid column-->
          <div class="myContactForm col-md-9 mb-md-0 mb-5">
              <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                  <!--Grid row-->
                  <div class="row">

                      <!--Grid column-->
                      <div class="col-md-6">
                          <div class="md-form mb-0">
                              <input type="text" id="name" name="name" class="form-control transparent">
                              <label for="name" class="">Your name</label>
                          </div>
                      </div>
                      <!--Grid column-->

                      <!--Grid column-->
                      <div class="col-md-6">
                          <div class="md-form mb-0">
                              <input type="text" id="email" name="email" class="form-control transparent">
                              <label for="email" class="">Your email</label>
                          </div>
                      </div>
                      <!--Grid column-->

                  </div>
                  <!--Grid row-->

                  <!--Grid row-->
                  <div class="row">
                      <div class="col-md-12">
                          <div class="md-form mb-0">
                              <input type="text" id="subject" name="subject" class="form-control transparent">
                              <label for="subject" class="">Subject</label>
                          </div>
                      </div>
                  </div>
                  <!--Grid row-->

                  <!--Grid row-->
                  <div class="row">

                      <!--Grid column-->
                      <div class="col-md-12">

                          <div class="md-form">
                              <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea transparent"></textarea>
                              <label for="message">Your message</label>
                          </div>

                      </div>
                  </div>
                  <!--Grid row-->

              </form>

              <div class="text-center text-md-left">
                  <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
              </div>
              <div class="status"></div>
          </div>
          <!--Grid column-->
</div>
      </div>

  </section>
  <!--Section: Contact v.2-->

  </div>
</div>
</body>



<?php include_once 'includes/footer.php'; ?>

