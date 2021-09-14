<!-- Modal -->
<div class="modal fade" id="login-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="login-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form method="POST" action="API/sessione/login-exe.php">  
        <div class="modal-header">
          <h5 class="modal-title" id="login-label">
            Login
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" id="close-header">
              <i class="fas fa-times"></i>
            </span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-md-8">
                <label for="loginEmail">
                  Email
                </label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Email" required>
                <br>
                <label for="loginPwd">
                  Password
                </label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>

                <p>
                  <small class="text-center" style="color:#c07348">
                    Hai dimenticato la password?
                  </small>
                  <a data-dismiss="modal" style="color:#c07348" data-toggle="modal">
                    <small>
                      Clicca Qui
                    </small>
                  </a>
                  <br>            
                  <small class="text-center" style="color:#c07348">
                    Non sei registrato?
                  </small>  
                  <a href="#register-modal" style="color:#c07348" data-toggle="modal" data-target="#register-modal" data-dismiss="modal" id="linkToReg">
                    <small>
                      Clicca Qui
                    </small>
                  </a>
                </p>
                
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-light btn-lg btn-block" name="login">
            Accedi
            <span class="divider"></span>
            <i class="fas fa-sign-in"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>


<?




