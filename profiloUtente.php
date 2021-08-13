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

  <?php
    include("includes/style.php");
  ?>

  <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>

  <?php
    include("includes/navigation.php");
  ?>

  <main>
    <section>
      <!-- Page Content -->
      <div class="container-fluid">
        <div class="container-fluid">
          <br>
          <div class="row">
            <div class="col" align="center">
              <img src="assets/img/profile/profileImage.jpeg" class="rounded-circle" alt="Immagine profilo" width="300" height="300">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col" align="center">
              <h1 align="center">Nome Utente</h1>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col" align="center">
              <button type="button" class="btn btn-outline-dark">MODIFICA PROFILO</button>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col" align="center">
              <p>Valutazioni ricevute:</p>
              <h2 align="center">23</h2>
            </div>
            <div class="col" align="center">
              <p>Valutazione media:</p>
              <h2 align="center">4.1</h2>
            </div>
            <div class="col" align="center">
              <p>Articoli venduti:</p>
              <h2 align="center">15</h2>
            </div>
          </div>
          <br>
          <div class="dropdown-divider"></div>
          <br>
          <div class="row">
            <div class="col">
              <h1 align="center">Annunci dell'utente</h1>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6">
              <div class="col" align="center">
                <h2 align="center">Pubblicati</h2>
              </div>
              <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <div class="card h-100">
                      <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="#">Item One</a>
                        </h4>
                        <h5>$24.99</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam
                          aspernatur!</p>
                      </div>
                      <div class="card-footer">
                        <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i
                        class="far fa-star"></i><i class="far fa-star"></i>
                        <i class="far fa-heart"></i>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card h-100">
                      <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="#">Item Two</a>
                        </h4>
                        <h5>$24.99</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam
                          aspernatur! Lorem ipsum dolor sit amet.</p>
                      </div>
                      <div class="card-footer">
                        <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i
                          class="far fa-star"></i><i class="far fa-star"></i>
                        <i class="far fa-heart"></i>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card h-100">
                      <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="#">Item Three</a>
                        </h4>
                        <h5>$24.99</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam
                          aspernatur!</p>
                      </div>
                      <div class="card-footer">
                        <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i
                          class="far fa-star"></i><i class="far fa-star"></i>
                        <i class="far fa-heart"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>

            <div class="col-md-6">
              <div class="col" align="center">
                <h2 align="center">In vendita ora</h2>
              </div>
              <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <div class="card h-100">
                      <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="#">Item One</a>
                        </h4>
                        <h5>$24.99</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam
                          aspernatur!</p>
                      </div>
                      <div class="card-footer">
                        <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i
                        class="far fa-star"></i><i class="far fa-star"></i>
                        <i class="far fa-heart"></i>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card h-100">
                      <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="#">Item Two</a>
                        </h4>
                        <h5>$24.99</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam
                          aspernatur! Lorem ipsum dolor sit amet.</p>
                      </div>
                      <div class="card-footer">
                        <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i
                          class="far fa-star"></i><i class="far fa-star"></i>
                        <i class="far fa-heart"></i>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card h-100">
                      <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="#">Item Three</a>
                        </h4>
                        <h5>$24.99</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam
                          aspernatur!</p>
                      </div>
                      <div class="card-footer">
                        <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i
                          class="far fa-star"></i><i class="far fa-star"></i>
                        <i class="far fa-heart"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
  </main>

  <?php
  include("includes/footer.php");
  ?>

  <!-- Bootstrap core JavaScript -->

  <?php
  include("includes/scripts.php");
  ?>

</body>

</html>
