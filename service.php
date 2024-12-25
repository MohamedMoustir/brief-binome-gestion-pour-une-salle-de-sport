<?php
require_once "navbar.php";
?>
 

  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our Services
        </h2>
      </div>
      <div class="service_container">
        <div class="box">
          <img src="images/s-1.jpg" alt="">
          <h6 class="visible_heading">
            CROSSFIT TRAINING
          </h6>
          <div class="link_box">
            <a href="">
              <img src="images/link.png" alt="">
            </a>
            <h6>
              CROSSFIT TRAINING
            </h6>
          </div>
        </div>
        <div class="box">
          <img src="images/s-2.jpg" alt="">
          <h6 class="visible_heading">
            FITNESS
          </h6>
          <div class="link_box">
            <a href="">
              <img src="images/link.png" alt="">
            </a>
            <h6>
              FITNESS
            </h6>
          </div>
        </div>
        <div class="box">
          <img src="images/s-3.jpg" alt="">
          <h6 class="visible_heading">
            DYNAMIC STRENGTH TRAINING
          </h6>
          <div class="link_box">
            <a href="">
              <img src="images/link.png" alt="">
            </a>
            <h6>
              DYNAMIC STRENGTH TRAINING
            </h6>
          </div>
        </div>
        <div class="box">
          <img src="images/s-4.jpg" alt="">
          <h6 class="visible_heading">
            HEALTH
          </h6>
          <div class="link_box">
            <a href="">
              <img src="images/link.png" alt="">
            </a>
            <h6>
              HEALTH
            </h6>
          </div>
        </div>
        <div class="box">
          <img src="images/s-5.jpg" alt="">
          <h6 class="visible_heading">
            WORKOUT
          </h6>
          <div class="link_box">
            <a href="">
              <img src="images/link.png" alt="">
            </a>
            <h6>
              WORKOUT
            </h6>
          </div>
        </div>
        <div class="box">
          <img src="images/s-6.jpg" alt="">
          <h6 class="visible_heading">
            STRATEGIES
          </h6>
          <div class="link_box">
            <a href="">
              <img src="images/link.png" alt="">
            </a>
            <h6>
              STRATEGIES
            </h6>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->

  <!-- info section -->

  <section class="info_section layout_padding2-top">
    <div class="container">
      <div class="info_form">
        <h4>
          Our Newsletter
        </h4>
        <form action="">
          <input type="text" placeholder="Enter your email">
          <div class="d-flex justify-content-end">
            <button>
              subscribe
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h6>
            About Energym
          </h6>
          <p>
            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation u
          </p>
        </div>
        <div class="col-md-2 offset-md-1">
          <h6>
            Menus
          </h6>
          <ul>
            <li class=" active">
              <a class="" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="">
              <a class="" href="about.html">About </a>
            </li>
            <li class="">
              <a class="" href="service.html">Services </a>
            </li>
            <li class="">
              <a class="" href="#contactSection">Contact Us</a>
            </li>
            <li class="">
              <a class="" href="#">Login</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>
            Useful Links
          </h6>
          <ul>
            <li>
              <a href="">
                Adipiscing
              </a>
            </li>
            <li>
              <a href="">
                Elit, sed
              </a>
            </li>
            <li>
              <a href="">
                do Eiusmod
              </a>
            </li>
            <li>
              <a href="">
                Tempor
              </a>
            </li>
            <li>
              <a href="">
                incididunt
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>
            Contact Us
          </h6>
          <div class="info_link-box">
            <a href="">
              <img src="images/location-white.png" alt="">
              <span> No.123, loram ipusm</span>
            </a>
            <a href="">
              <img src="images/call-white.png" alt="">
              <span>+01 12345678901</span>
            </a>
            <a href="">
              <img src="images/mail-white.png" alt="">
              <span> demo123@gmail.com</span>
            </a>
          </div>
          <div class="info_social">
            <div>
              <a href="">
                <img src="images/facebook-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/twitter-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <p>
      &copy; 2019 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width");
      document
        .querySelector(".custom_menu-btn")
        .classList.toggle("menu_btn-style");
    }
  </script>
</body>

</html>