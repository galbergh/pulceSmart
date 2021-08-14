<!DOCTYPE html>
<html lang="en">
<head>
  <title>
    La Pulce  Smart
  </title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Flea market for buying and selling products online">
  <meta name="keywords" content="market, buying, selling">
  <meta name="author" content="Giorgio Alberghina & Stefano Roccella">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <?php
      include("includes/style.php");
    ?>

    <link rel="stylesheet" href="assets/css/index.css">
    <script src="assets/js/myscript.js"></script>
</head>

<body>



  <?php
    session_start();
    include("includes/navigation.php");
  ?>

  <!-- Page Content -->
  <main>
    <div class="container-fluid">
      <div class="dropdown-divider"></div>
      
      <?php
      if (isset($_GET["status"])) {
        if ($_GET["status"]=='ok') {
          echo "<div class=\"alert alert-success\"><strong>" . urldecode($_GET["msg"]) . "</strong></div>";
      ?>
          <div class="dropdown-divider"></div>
      <?php
        } else {
          echo "<div class=\"alert alert-danger\"><strong>Errore!</strong>" . urldecode($_GET["msg"]) . "</div>";
        }
      }
      ?>
      
    </div>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-3">
          <div class="card">
            <h5 style="color:#c07348" class="my-4" align="center">
              Filtra ricerca
            </h5>
          </div>

          <?php
            include("includes/filtri.php");
          ?>
        </div>
        <div class="col-lg-9">
          <div class="well">
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="d-block img-fluid" width="100%" src="assets/img/blog/online-shopping-ecommerce.png" alt="First slide">
                  
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" width="100%" src="http://placehold.it/900x350" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" width="100%" src="http://placehold.it/900x350" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">
                  Previous
                </span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">
                  Next
                </span>
              </a>
            </div>
            <div class="row justify-content-center">

              <?php
                include("includes/listaAnnunci.php");
              ?>

            </div>
            <div class="row justify-content-center">
              <nav aria-label="...">
                <ul class="pagination pagination-lg">
                  <li class="page-item disabled">
                    <span class="page-link">
                      <i class="fas fa-angle-double-left"></i>
                    </span>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      1
                    </a>
                  </li>
                  <li class="page-item active">
                    <span class="page-link">
                      2
                      <span class="sr-only">
                        (current)
                      </span>
                    </span>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      3
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-double-right"></i>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  


  <?php
    include("includes/footer.php");
  ?>

  <?php
    include("includes/scripts.php");
  ?>
  <script src="assets/js/eventHandlers.js"></script>

</body>
</html>
