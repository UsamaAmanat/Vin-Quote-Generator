<?php
    include("header.php");
?>
<style>

.jumbotron{
    margin-bottom:0;
}

.btn.btn-primary {
    padding :12px!important;
}
@media (min-width: 576px){
.jumbotron {
    padding: 10rem 2rem;
}

}
</style>
<div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>We have received your vehicle info, </strong> one of our agent will get in touch with you soon.</p>
  <hr>
  <p>
    Having trouble? <a href="contact-us.php">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.php" role="button">Start over with another vehicle</a>
  </p>
</div>

<?php
    include("footer.php");
?>
