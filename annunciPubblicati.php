<!DOCTYPE html>
<html lang="en">
<head>
  <title>
    La Pulce Smart
  </title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Flea market for buying and selling products online">
  <meta name="keywords" content="market, buying, selling">
  <meta name="author" content="Giorgio Alberghina & Stefano Roccella">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <?php include("includes/style.php");?>

  <link rel="stylesheet" href="assets/css/index.css">

</head>

<body>

  <?php
    include("includes/navigation.php");
  ?>

  <main>
      <!-- Page Content -->
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-3">

            <h5 class="my-4" align="center">Filtri</h3>

              <?php
                include("includes/filtri.php");
              ?>

          </div>
          <!-- /.col-lg-3 -->

          <div class="col-lg-9 mt-3">

            <div class="row justify-content-center">

              <?php
                include("includes/listaAnnunci.php");
              ?>

            </div>
            <!-- /.row -->
          </div>
          <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->
        <div class="row justify-content-center">
          <nav aria-label="...">
            <ul class="pagination pagination-lg">
              <li class="page-item disabled">
                <span class="page-link"><i class="fas fa-angle-double-left"></i></span>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active">
                <span class="page-link">
                  2
                <span class="sr-only">(current)</span>
                </span>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a>
              </li>
            </ul>
          </nav>
        </div>

        </div> <!-- /.container -->
  </main>
  <?php
  include("includes/footer.php");
  ?>

  <?php
  include("includes/scripts.php");
  ?>

</body>

</html>
