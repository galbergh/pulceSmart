<!-- Modal -->
<div class="modal fade" id="login-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="login-label" aria-hidden="true">
  <div class="modal-dialog">
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
          <small class="text-center" style="color:#ffffff">
            Non sei registrato?
            <a href="registrazione.php" data-dismiss="modal" style="color:#ffffff" data-toggle="modal" data-target="#register-modal" id="register">
              Clicca Qui
            </a>
          </small>
        </div>
      </form>
    </div>
  </div>
</div>

<?




