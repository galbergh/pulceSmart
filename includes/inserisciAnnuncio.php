<!-- Modal -->
<div class="modal fade" id="annuncio-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ad-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ad-label">
          Crea   il tuo annuncio
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
                <label for="inputTitle">
                  Titolo
                </label>
                <input type="input" class="form-control" name="" id="ad-title" placeholder="Titolo" required>
              </div>
              <div class="form-group">
                <label for="inputImage">
                  Foto
                </label>
                <br>
                <img id="ad-image" width="350" />
                <br>
                <input type="file" id="image">
              </div>
              <div class="form-group">
                <label for="inputProductName">
                  Nome articolo
                </label>
                <input type="text" class="form-control" name="" id="ad-productName" placeholder="Nome articolo" required>
              </div>
              <div class="form-group">
                <label for="inputProductPrice">
                  Prezzo
                </label>
                <br>
                <input type="number" onblur="adattaPrezzo()" step=0.01 class="form-control-md" name="" id="ad-productPrice" placeholder="Euro" required >
                <i class="fas fa-euro-sign"></i>
              </div>
              <div class="form-group">
                <label for="inputProductCategory">
                  Categoria articolo
                </label>
                <select class="form-control" id="categoriaArticolo" required>
                  <option value="nessuna" selected></option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputProductSubCategory">
                  Sottocategoria articolo
                </label>
                <select class="form-control" id="sottocategoriaArticolo" required>
                  <option value="nessuna" selected></option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputProductRegion">
                  Regione vendita
                </label>
                <select class="form-control" id="regioneVendita" required>
                  <option value="nessuna" selected></option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputProductProvince">
                  Provincia vendita
                </label>
                <select class="form-control" id="provinciaVendita" required>
                  <option value="nessuna" selected></option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputProductCity">
                  Città vendita
                </label>
                <input type="text" class="form-control" name="" id="cittaVendita" placeholder="Città" required>
              </div>
              <div class="form-group">
                <label for="inputVisibility">
                  Visibilità
                </label>
                <select class="form-control" id="visibilita">
                  <option value="Pubblico" selected>Pubblico</option>
                  <option value="Privato">Privato</option>
                  <option value="Visibilità ristretta">Visibilità ristretta</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputVisibilityProductRegion">
                  Regione visibilità 
                </label>
                <select class="form-control" id="regioneVisibilita" >
                  <option value="nessuna" selected></option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputVisibilityProductProvince">
                  Provincia visibità
                </label>
                <select class="form-control" id="provinciaVisibilita">
                  <option value="nessuna" selected></option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputVisibilityProductCity">
                  Città visibilità 
                </label>
                <input type="text" class="form-control" name="" id="cittaVisibilita" placeholder="Città">
              </div>
              <form name="statoArticoloForm">
                <label for="statoArticolo">
                  Stato articolo
                </label>
                <br>
                <input type="radio" id="articoloNuovo" name="statoArticolo" value="Nuovo" checked>
                <label for="articolo_nuovo">Nuovo</label><br>
                <input type="radio" id="articoloUsato" name="statoArticolo" value="Usato">
                <label for="articolo_usato">Usato</label><br>
              </form>
              <div class="form-group">
                <label for="statoUsura">
                  Stato usura
                </label>
                <select class="form-control" id="statoUsura" disabled>
                  <option value="nessuna" selected></option>
                </select>
              </div>

              <div class="form-group">
                <label for="inputUsagePeriod">
                  Periodo utilizzo
                </label>
                <input type="text" class="form-control" name="" id="periodoUtilizzo" disabled>
              </div>

              <div class="form-group">
                <label for="inputTipoGaranzia">
                  Tipo garanzia
                </label>
                <input type="text" class="form-control" name="" id="tipoGaranzia" placeholder="Tipo garanzia">
              </div>
              <div class="form-group">
                <label for="inputPeriodoGaranzia">
                  Periodo garanzia
                </label>
                <input type="text" class="form-control" name="" id="periodoGaranzia" placeholder="Periodo garanzia">
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
        <button type="button" class="btn btn-outline-light" id="confermaInserimentoAnnuncio">
          Conferma
          <span class="divider"></span>
          <i class="fas fa-user-plus"></i>
        </button>
      </div>
    </div>
  </div>
</div>