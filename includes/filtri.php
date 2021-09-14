<div class="accordion" id="accordion"></div>

<div class="accordion" id="accordion">
  <div class="card">
    <div class="card-header rounded" id="filter-heading">
      <h5 class="mb-0">
        <button class="btn collapsed" data-toggle="collapse" id="filter-tag" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Cosa stai cercando?
          <div class="divider"></div><i class="fas fa-angle-down"></i>
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="filter-heading" data-parent="#accordion">
      <div class="card-body">
        <div class="card">
          <div class="card-header rounded" id="filter-heading">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <form class="form-inline ml-3 mr-3 my-2" method = "POST" action = "API/backend/gestione_ricerca.php">
                  <input class="form-control w-100" type="search" placeholder="Cerca un prodotto..." aria-label="Cerca" name ="ricerca_testo" id="inputtext4">
                </form>
              </div>
            </div>
            <div class="row">
              <label for="inputCategoria" id="filter-tag" class="col-lg-12 col-md-2">
                Categoria:
              </label>
              <div class="col-lg-12 col-md-4">
                <select class="form-control" id="categoriaFiltro">
                  <option value="nessuna" selected></option>
                </select>
              </div>
              <label for="inputSottocategoria" id="filter-tag" class="col-lg-12 col-md-3 col-form-label">
                Sottocategoria:
              </label>
              <div class="col-lg-12 col-md-3">
                <select class="form-control" id="sottocategoriaFiltro">
                  <option value="nessuna" selected></option>
                </select>
              </div>
            </div>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header rounded" id="filter-heading">
      <h5 class="mb-0">
        <button class="btn collapsed" data-toggle="collapse" id="filter-tag" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
          Dove vuoi cercare?
          <div class="divider"></div><i class="fas fa-angle-down"></i>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="filter-heading" data-parent="#accordion">
      <div class="card-body">
        <div class="card">
          <div class="card-header rounded" id="filter-heading">
            <div class="row">
              <label for="inputRegione" id="filter-tag" class="col-lg-12 col-md-2">
                Regione:
              </label>
              <div class="col-lg-12 col-md-4">
                <select class="form-control" id="regioneFiltro">
                  <option value="nessuna" selected></option>
                </select>
              </div>
              <label for="inputProv" id="filter-tag" class="col-lg-12 col-md-2 col-form-label">
                Provincia:
              </label>
              <div class="col-lg-12 col-md-4">
                <select class="form-control" id="provinciaFiltro">
                  <option value="nessuna" selected></option>
                </select>
              </div>
            </div>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header rounded" id="filter-heading">
      <h5 class="mb-0">
        <button class="btn collapsed" id="filter-tag" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Stato articoli
          <div class="divider"></div><i class="fas fa-angle-down"></i>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="filter-heading" data-parent="#accordion">
      <div class="card-body">
        <div class="divider"></div> <div class="divider"></div>
          <input type="checkbox" class="form-check-input" id="articoliNuovi" checked>
          <label class="form-check-label" for="acquirente">
            Nuovi
          </label>
        <br>
        <div class="divider"></div> <div class="divider"></div>
          <input type="checkbox" class="form-check-input" id="articoliUsati" checked>
          <label class="form-check-label" for="venditore">
            Usati
          </label>
      </div>
    </div>
  </div>
  <div class="card">
  <div class="card-header rounded" id="filter-heading">
      <h5 class="mb-0">
        <button class="btn collapsed" id="filter-tag" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Ordina
          <div class="divider"></div><i class="fas fa-angle-down"></i>
        </button>
      </h5>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="filter-heading" data-parent="#accordion">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12 col-md-4">
            <select class="form-control" id="ordinaArticoli">
              <option disabled selected>Ordina per</option>
              <option class = "text-grigio" value="nessun_ordinamento">---</option>
              <option class = "text-grigio" value="nome">Nome</option>
              <option class = "text-grigio" value="prezzo-asc">Prezzo (Crescente)</option>
              <option class = "text-grigio" value="prezzo-desc">Prezzo (Decrescente)</option>
              <option class = "text-grigio" value="osservatori">N° Osservatori</option>
              <option class = "text-grigio" value="venditori-top">Venditori Top</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
