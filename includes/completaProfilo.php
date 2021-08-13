
    <!-- Modal -->
    <div class="modal fade" id="completaProfilo-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
      aria-labelledby="profile-label" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="profile-label">Completa il tuo profilo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" id="close-header"><i class="fas fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8">
                  <div class="form-group">
                    <label for="profileImage">Inserisci l'immagine del profilo</label> 
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>

                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="acquirente" value="acquirente" name="preferenza">
                    <label class="form-check-label" for="acquirente">Acquirente</label>
                    <div class="divider"></div> <div class="divider"></div>
                    <input type="radio" class="form-check-input" id="venditore" value="venditore" name="preferenza">
                    <label class="form-check-label" for="venditore">Venditore</label>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark">Salva<span class="divider"></span> <i
                class="fas fa-user"></i></button>
          </div>
        </div>
      </div>
    </div>