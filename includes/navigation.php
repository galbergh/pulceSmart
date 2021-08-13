<?php
include("login.php");
include("registrazione.php");
include("completaProfilo.php");
include("inserisciAnnuncio.php");
?>

<header>
  <section id="topBar">
    <div class="container-fluid">
      <div class="row justify-content-end">
      <?php if(!isset($_SESSION['logged'])){ ?>
        <div class="col-auto">
          <a class="btn btn-dark my-1 my-sm-1" data-toggle="modal" data-target="#register-modal" id="register">
            Registrati
            <span class="divider"></span>
            <i class="fas fa-user-plus"></i>
          </a>
        </div>
        <div class="col-auto">
          <a class="btn btn-dark my-1 my-sm-1" data-toggle="modal" data-target="#login-modal" id="login">
            Accedi
            <span class="divider"></span>
            <i class="fas fa-sign-in"></i>
          </a>
        </div>
        <?php } else{?>
          <div class="col-auto">
          <button class="btn btn-dark my-1 my-sm-1" disabled>
            Ciao <?php echo $_SESSION['user']; ?>
            <span class="divider"></span>
          </button>
        </div>
        <div class="col-auto">
          <a class="btn btn-dark my-1 my-sm-1" href="API/sessione/logout-exe.php" id="logout">
            Logout
            <span class="divider"></span>
            <i class="fas fa-sign-out"></i>
          </a>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <div class="container-fluid py-3">
    <div class="row align-items-center">
      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3">
        <img class="img ml-2 mr-auto my-2" src="assets/img/logo/logoSite.png" width="170" height="83"/>
      </div>
      <div class="col-lg-1 col-md-1 col-sm-2 col-xs-1"></div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
        <nav class="navbar navbar-expand-lg navbar-expand-md navbar-dark ">
          <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">
                  Home
                  <span class="sr-only">
                    (current)
                  </span>
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="aboutUs.php">
                  About Us
                </a>
              </li>
              <?php if (isset($_SESSION['logged'])){ ?>
              <li class="nav-item dropdown active">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                  Account
                  <span class="divider"></span>
                  <i class="fas fa-angle-down"></i>
                </a>
                <div class="dropdown-menu" id="dropdown" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" id="dropdown-item" href="profiloUtente.php">
                    Il mio profilo
                  </a>
                  <a class="dropdown-item" id="dropdown-item" href="listaDesideri.php">
                    La mia lista dei desideri
                  </a>
                  <a class="dropdown-item" id="dropdown-item" href="annunciPubblicati.php">
                    I miei annunci
                  </a>
                  <a class="dropdown-item" id="dropdown-item" href="annunciAcquistati.php">
                    I miei ordini
                  </a>
                </div>
              </li>
              <div class="divider"></div>
              <a class="btn btn-outline-light" data-toggle="modal" data-target="#annuncio-modal" id="annuncio">
                Inserisci annuncio
                <span class="divider"></span>
                <i class="fas fa-plus-circle"></i>
              </a>
              <?php }?>
            </ul>
          </div>
        </nav>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-6">
        <form class="form-inline ml-3 mr-3 my-2">
          <input class="form-control w-100" type="search" placeholder="Cerca" aria-label="Cerca">
        </form>
      </div>
    </div>
  </div>
</header>
