

<?php
include "includes/style.php";
include "includes/navbar.php";

?>

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
        <img src="pic3.jpg" height="100%" width="100%">
            <div class="carousel-item active" >
               <svg   class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg>
                 <div class="container">
                   <div class="carousel-caption text-start">
                    <h1>PHARMACY SHOP</h1>
                       <h4><p> <span style="color: #fd4c66;">“It is easy to get a thousand prescriptions, but hard to get one single remedy.”</span></p></h4>
                       <p><a class="btn btn-lg btn-primary" href="login1.php">login</a></p>
                    </div>
                 </div>
            </div>

          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg>
            <div class="container">
                <div class="carousel-caption">
                    <h1>PHARMACY SHOP</h1>
                <h4> <p>“Learn as if you will live forever, live like you will die tomorrow.”</p></h4>
                    <p><a class="btn btn-lg btn-primary" href="profile.php">Make yoursself</a></p>
                </div>
            </div>
          </div>

          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg>
            <div class="container"  >
                <div class="carousel-caption text-end">
                    <h1>PHARMACY SHOP</h1>
                   <h4> <p>The more I get to know you, The more I'm convinced that
                           you were the sole inspiration behind many medications.  </p></h4>

                </div>
            </div>
          </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


</body>

</html>