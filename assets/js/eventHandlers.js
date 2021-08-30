window.addEventListener('DOMContentLoaded', popolaCategorieFiltro);
window.addEventListener('DOMContentLoaded', popolaCategorieAnnunci);
window.addEventListener('DOMContentLoaded', popolaRegioniFiltro);
window.addEventListener('DOMContentLoaded', popolaRegioniRegistrazione);
window.addEventListener('DOMContentLoaded', popolaRegioniVendita);
window.addEventListener('DOMContentLoaded', popolaRegioniVisibilita);
window.addEventListener('DOMContentLoaded', popolaProvinceVisibilita);
window.addEventListener('DOMContentLoaded', popolaStatoUsura);


document.getElementById("confermaRegistrazione").addEventListener("click", registraUtente);
document.getElementById("confermaInserimentoAnnuncio").addEventListener("click", inserisciAnnuncio);
document.getElementById('categoriaFiltro').addEventListener('change', popolaSottocategorieFiltri);
document.getElementById('regioneFiltro').addEventListener('change', popolaProvinceFiltro);

document.getElementById("categoriaFiltro").addEventListener("change", filtraRicerca);
document.getElementById("sottocategoriaFiltro").addEventListener("change", filtraRicerca);
document.getElementById("regioneFiltro").addEventListener("change", filtraRicerca);
document.getElementById("provinciaFiltro").addEventListener("change", filtraRicerca);
document.getElementById("articoliNuovi").addEventListener("change", filtraRicerca);
document.getElementById("articoliUsati").addEventListener("change", filtraRicerca);

document.getElementById('categoriaArticolo').addEventListener('change', popolaSottocategorieAnnunci);
document.getElementById('regioneRegistrazione').addEventListener('change', popolaProvinceRegistrazione);
document.getElementById('regioneVendita').addEventListener('change', popolaProvinceVendita);
document.getElementById('regioneVisibilita').addEventListener('change', popolaProvinceVisibilita);
document.getElementById('visibilita').addEventListener('change', popolaRegioniVisibilita);
document.getElementById('regioneVisibilita').addEventListener('change', popolaProvinceVisibilita);

document.getElementsByName("statoArticolo").forEach(function() {
    addEventListener("change", popolaStatoUsura);
})

document.getElementById("image").addEventListener("change", generateImageBase64);
