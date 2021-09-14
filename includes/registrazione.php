<?php
include("completaProfilo.php");
?>


<!-- Modal -->
<div class="modal fade" id="register-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="register-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="register-label">
          Registrazione
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" id="close-header"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-8">
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="inputName">
                  Nome e cognome
                </label>
                <div class = "d-flex justify-content-around">
                  <input type="text" name = "nome" placeholder="Nome*" class="form-control" required>
                  <input type="text" name = "cognome" placeholder="Cognome*" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="inputCodFisc">
                  Codice fiscale
                </label>
                <input type="text" class="form-control" name="" id="cfRegister" placeholder="Codice Fiscale*">
              </div>
              <div class="dropdown-divider"></div>
              <div class="dropdown-divider"></div>
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="inputDomicilio">
                  Domicilio
                </label>
                <div class = "d-flex justify-content-around">
                  <input type="text" class="form-control" name="" id="addressRegister" placeholder="Via o piazza*">
                  <input type="number" class="form-control" name="" id="address-numberRegister" placeholder="Numero civico*">
                </div>
              </div>
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="inputRegion">
                  Regione e provincia
                </label>
                <div class = "d-flex justify-content-around">
                  <select class="form-control" id="regioneRegistrazione">
                    <option value="nessuna" selected>Regione*</option>
                  </select>
                  <select class="form-control" id="provinciaRegistrazione">
                    <option value="nessuna" selected>Provincia*</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="inputCity">
                  Città
                </label>
                <input type="text" class="form-control" name="" id="cityRegister" placeholder="Città*">
              </div>
              <div class="dropdown-divider"></div>
              <div class="dropdown-divider"></div>
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="inputUserName">
                  Nome utente
                </label>
                <input type="text" class="form-control" name="" id="userRegister" placeholder="Nome Utente*">
                <small id="userRegisterlHelp" class="form-text text-muted">
                  Gli altri utenti vedranno solo questo nome.
                </small>
              </div>
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="inputEmail">
                  Email
                </label>
                <input type="email" class="form-control" name="" id="emailRegister" placeholder="Indirizzo e-mail*">
              </div>
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="inputPassword">
                  Crea una password
                </label>
                <input type="password" class="form-control" name="" id="pwdRegister" placeholder="Password*">
              </div>
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="inputPassword">
                  Conferma password
                </label>
                <input type="password" class="form-control" name="" id="pwdConfirm" placeholder="Password*">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">
          Annulla
          <span class="divider"></span>
          <i class="fas fa-times"></i>
        </button>
        <button type="button" class="btn btn-outline-light" id="confermaRegistrazione" data-toggle="modal" data-target="#completaProfilo-modal" data-dismiss="modal">
          Conferma
          <span class="divider"></span>
          <i class="fas fa-user-plus"></i>
        </button>
      </div>
    </div>
  </div>
</div>
