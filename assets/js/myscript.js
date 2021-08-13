function ajaxRequest() {
    var request = false;
    try { request = new XMLHttpRequest() } catch (e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") } catch (e2) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP")
            } catch (e3) { request = false }
        }
    }
    return request
}

function popolaRegioniRegistrazione() {
    // var cognome = this.value;
    var xttp = new ajaxRequest();
    xttp.onreadystatechange = function() {
        // console.log(this.readyState + ' ' + this.status);
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.response);
            risposta = JSON.parse(this.response);

            if (risposta.status == "ok") {
                regioni = risposta.contenuto;
                menu = document.getElementById('regioneRegistrazione');
                for (var i = 0; i < regioni.length; i++) {
                    var item = document.createElement('option');
                    item.setAttribute("value", regioni[i]);
                    item.innerText = regioni[i];
                    menu.appendChild(item);
                }
            } else {
                alert(risposta.msg);
            }
        }
    };
    xttp.open("GET", "includes/getRegioni.php", true);
    xttp.send();
}

function popolaProvinceRegistrazione() {
    // var cognome = this.value;
    regioneMenu = document.getElementById('regioneRegistrazione');
    regione = regioneMenu.options[regioneMenu.selectedIndex].value;

    if (regione != 'nessuna') {
        var xttp = new ajaxRequest();
        xttp.onreadystatechange = function() {
            // console.log(this.readyState + ' ' + this.status);
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.response);
                risposta = JSON.parse(this.response);
                if (risposta.status == "ok") {
                    var province = risposta.contenuto;
                    // console.log(province);
                    var menu = document.getElementById('provinciaRegistrazione');
                    menu.innerHTML = "";
                    for (var i = 0; i < province.length; i++) {
                        var item = document.createElement('option');
                        item.setAttribute("value", province[i].prov);
                        item.innerText = province[i].prov;
                        menu.appendChild(item);
                    }
                } else {
                    alert(risposta.msg);
                }
            }
        };
        xttp.open("GET", "includes/getProvincia.php?regione=" + regione, true);
        xttp.send();
    }
}

function popolaCategorieAnnunci() {
    // var cognome = this.value;
    var xttp = new ajaxRequest();
    xttp.onreadystatechange = function() {
        // console.log(this.readyState + ' ' + this.status);
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.response);
            risposta = JSON.parse(this.response);

            if (risposta.status == "ok") {
                categorie = risposta.contenuto;
                menu = document.getElementById('categoriaArticolo');
                for (var i = 0; i < categorie.length; i++) {
                    var item = document.createElement('option');
                    item.setAttribute("value", categorie[i]);
                    item.innerText = categorie[i];
                    menu.appendChild(item);
                }
            } else {
                alert(risposta.msg);
            }
        }
    };
    xttp.open("GET", "includes/getCategorie.php", true);
    xttp.send();
}

function popolaSottocategorieAnnunci() {
    // var cognome = this.value;
    categoriaMenu = document.getElementById('categoriaArticolo');
    categoria = categoriaMenu.options[categoriaMenu.selectedIndex].value;

    if (categoria != 'nessuna') {
        var xttp = new ajaxRequest();
        xttp.onreadystatechange = function() {
            // console.log(this.readyState + ' ' + this.status);
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.response);
                risposta = JSON.parse(this.response);
                if (risposta.status == "ok") {
                    sottocategorie = risposta.contenuto;
                    menu = document.getElementById('sottocategoriaArticolo');
                    menu.innerHTML = "";
                    for (var i = 0; i < sottocategorie.length; i++) {
                        var item = document.createElement('option');
                        item.setAttribute("value", sottocategorie[i].sottocategoria);
                        item.innerText = sottocategorie[i].sottocategoria;
                        menu.appendChild(item);
                    }
                } else {
                    alert(risposta.msg);
                }
            }
        };
        xttp.open("GET", "includes/getSottocategorie.php?categoria=" + categoria, true);
        xttp.send();
    }
}

function popolaCategorieFiltro() {
    // var cognome = this.value;
    var xttp = new ajaxRequest();
    xttp.onreadystatechange = function() {
        // console.log(this.readyState + ' ' + this.status);
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.response);
            risposta = JSON.parse(this.response);

            if (risposta.status == "ok") {
                categorie = risposta.contenuto;
                menu = document.getElementById('categoriaFiltro');
                for (var i = 0; i < categorie.length; i++) {
                    var item = document.createElement('option');
                    item.setAttribute("value", categorie[i]);
                    item.innerText = categorie[i];
                    menu.appendChild(item);
                }
            } else {
                alert(risposta.msg);
            }
        }
    };
    xttp.open("GET", "includes/getCategorie.php", true);
    xttp.send();
}

function popolaSottocategorieFiltri() {
    // var cognome = this.value;
    categoriaMenu = document.getElementById('categoriaFiltro');
    categoria = categoriaMenu.options[categoriaMenu.selectedIndex].value;

    if (categoria != 'nessuna') {
        var xttp = new ajaxRequest();
        xttp.onreadystatechange = function() {
            // console.log(this.readyState + ' ' + this.status);
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.response);
                risposta = JSON.parse(this.response);
                if (risposta.status == "ok") {
                    sottocategorie = risposta.contenuto;
                    menu = document.getElementById('sottocategoriaFiltro');
                    menu.innerHTML = "";
                    for (var i = 0; i < sottocategorie.length; i++) {
                        var item = document.createElement('option');
                        item.setAttribute("value", sottocategorie[i].sottocategoria);
                        item.innerText = sottocategorie[i].sottocategoria;
                        menu.appendChild(item);
                    }
                } else {
                    alert(risposta.msg);
                }
            }
        };
        xttp.open("GET", "includes/getSottocategorie.php?categoria=" + categoria, true);
        xttp.send();
    }
}

function popolaRegioniFiltro() {
    // var cognome = this.value;
    var xttp = new ajaxRequest();
    xttp.onreadystatechange = function() {
        // console.log(this.readyState + ' ' + this.status);
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.response);
            risposta = JSON.parse(this.response);
            if (risposta.status == "ok") {
                regioni = risposta.contenuto;
                menu = document.getElementById('regioneFiltro');
                for (var i = 0; i < regioni.length; i++) {
                    var item = document.createElement('option');
                    item.setAttribute("value", regioni[i]);
                    item.innerText = regioni[i];
                    menu.appendChild(item);
                }
            } else {
                alert(risposta.msg);
            }
        }
    };
    xttp.open("GET", "includes/getRegioni.php", true);
    xttp.send();
}

function popolaProvinceFiltro() {
    // var cognome = this.value;
    regioneMenu = document.getElementById('regioneFiltro');
    regione = regioneMenu.options[regioneMenu.selectedIndex].value;

    if (regione != 'nessuna') {
        var xttp = new ajaxRequest();
        xttp.onreadystatechange = function() {
            // console.log(this.readyState + ' ' + this.status);
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.response);
                risposta = JSON.parse(this.response);
                if (risposta.status == "ok") {
                    var province = risposta.contenuto;
                    console.log(province);
                    var menu = document.getElementById('provinciaFiltro');
                    menu.innerHTML = "";
                    for (var i = 0; i < province.length; i++) {
                        var item = document.createElement('option');
                        item.setAttribute("value", province[i].prov);
                        item.innerText = province[i].prov;
                        menu.appendChild(item);
                    }
                } else {
                    alert(risposta.msg);
                }
            }
        };
        xttp.open("GET", "includes/getProvincia.php?regione=" + regione, true);
        xttp.send();
    }
}

function popolaRegioniVendita() {
    // var cognome = this.value;
    var xttp = new ajaxRequest();
    xttp.onreadystatechange = function() {
        // console.log(this.readyState + ' ' + this.status);
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.response);
            risposta = JSON.parse(this.response);
            if (risposta.status == "ok") {
                regioni = risposta.contenuto;
                menu = document.getElementById('regioneVendita');
                for (var i = 0; i < regioni.length; i++) {
                    var item = document.createElement('option');
                    item.setAttribute("value", regioni[i]);
                    item.innerText = regioni[i];
                    menu.appendChild(item);
                }
            } else {
                alert(risposta.msg);
            }
        }
    };
    xttp.open("GET", "includes/getRegioni.php", true);
    xttp.send();
}

function popolaRegioniVisibilita() {
    console.log(document.getElementById("visibilita").value === "Visibilità ristretta")
    if (document.getElementById("visibilita").value === "Visibilità ristretta") {
        document.getElementById("regioneVisibilita").removeAttribute("disabled");
        document.getElementById("provinciaVisibilita").removeAttribute("disabled");
        document.getElementById("cittaVisibilita").removeAttribute("disabled");
        document.getElementById("cittaVisibilita").setAttribute("placeholder", "Città");
        // var cognome = this.value;
        var xttp = new ajaxRequest();
        xttp.onreadystatechange = function() {
            // console.log(this.readyState + ' ' + this.status);
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.response);
                risposta = JSON.parse(this.response);
                if (risposta.status == "ok") {
                    regioni = risposta.contenuto;
                    menu = document.getElementById('regioneVisibilita');
                    for (var i = 0; i < regioni.length; i++) {
                        var item = document.createElement('option');
                        item.setAttribute("value", regioni[i]);
                        item.innerText = regioni[i];
                        menu.appendChild(item);
                    }
                } else {
                    alert(risposta.msg);
                }
            }
        };
        xttp.open("GET", "includes/getRegioni.php", true);
        xttp.send();
    } else {
        document.getElementById("regioneVisibilita").setAttribute("disabled", true);
        document.getElementById("regioneVisibilita").selectedIndex = "0";
        document.getElementById("provinciaVisibilita").setAttribute("disabled", true);
        document.getElementById("provinciaVisibilita").innerHTML = "<option value=nessuna> </option>";
        document.getElementById("cittaVisibilita").setAttribute("disabled", true);
        document.getElementById("cittaVisibilita").removeAttribute("placeholder");
        document.getElementById("cittaVisibilita").innerText = "";
    }
}

function popolaProvinceVendita() {
    // var cognome = this.value;
    regioneMenu = document.getElementById('regioneVendita');
    regione = regioneMenu.options[regioneMenu.selectedIndex].value;

    if (regione != 'nessuna') {
        var xttp = new ajaxRequest();
        xttp.onreadystatechange = function() {
            // console.log(this.readyState + ' ' + this.status);
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.response);
                risposta = JSON.parse(this.response);
                if (risposta.status == "ok") {
                    var province = risposta.contenuto;
                    console.log(province);
                    var menu = document.getElementById('provinciaVendita');
                    menu.innerHTML = "";
                    for (var i = 0; i < province.length; i++) {
                        var item = document.createElement('option');
                        item.setAttribute("value", province[i].prov);
                        item.innerText = province[i].prov;
                        menu.appendChild(item);
                    }
                } else {
                    alert(risposta.msg);
                }
            }
        };
        xttp.open("GET", "includes/getProvincia.php?regione=" + regione, true);
        xttp.send();
    }
}

function popolaProvinceVisibilita() {
    // var cognome = this.value;
    regioneMenu = document.getElementById('regioneVisibilita');
    regione = regioneMenu.options[regioneMenu.selectedIndex].value;

    if (regione != 'nessuna') {
        var xttp = new ajaxRequest();
        xttp.onreadystatechange = function() {
            // console.log(this.readyState + ' ' + this.status);
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.response);
                risposta = JSON.parse(this.response);
                if (risposta.status == "ok") {
                    var province = risposta.contenuto;
                    console.log(province);
                    var menu = document.getElementById('provinciaVisibilita');
                    menu.innerHTML = "";
                    for (var i = 0; i < province.length; i++) {
                        var item = document.createElement('option');
                        item.setAttribute("value", province[i].prov);
                        item.innerText = province[i].prov;
                        menu.appendChild(item);
                    }
                } else {
                    alert(risposta.msg);
                }
            }
        };
        xttp.open("GET", "includes/getProvincia.php?regione=" + regione, true);
        xttp.send();
    }
}

function popolaStatoUsura() {
    statiArticolo = document.forms["statoArticoloForm"].elements["statoArticolo"];
    for (var i = 0, max = statiArticolo.length; i < max; i++) {
        statiArticolo[i].onclick = function() {
            statoArticolo = this.value;
            console.log(statoArticolo)

            if (statoArticolo == "Nuovo") {
                document.getElementById("statoUsura").setAttribute("disabled", true)
                document.getElementById("statoUsura").innerHTML = "<option value='nessuna'> </option>";
            } else {
                document.getElementById("statoUsura").removeAttribute("disabled")
                    // console.log(this.readyState + ' ' + this.status);
                statoUsuraMenu = document.getElementById('statoUsura');
                console.log(statoUsuraMenu);
                statoUsuraMenu.innerHTML = "";

                var comeNuovo = document.createElement('option');
                comeNuovo.setAttribute("value", "Come Nuovo");
                comeNuovo.innerText = "Come nuovo";
                statoUsuraMenu.appendChild(comeNuovo);

                var buono = document.createElement('option');
                buono.setAttribute("value", "Buono");
                buono.innerText = "Buono";
                statoUsuraMenu.appendChild(buono);

                var medio = document.createElement('option');
                medio.setAttribute("value", "Medio");
                medio.innerText = "Medio";
                statoUsuraMenu.appendChild(medio);

                var usurato = document.createElement('option');
                usurato.setAttribute("value", "Usurato");
                usurato.innerText = "Usurato";
                statoUsuraMenu.appendChild(usurato);
            }
        }
    }
}

function adattaPrezzo() {
    prezzo = document.getElementById("ad-productPrice").value;
    console.log(prezzo)
    prezzo = Number.parseFloat(prezzo).toFixed(2);
    console.log(prezzo)
    document.getElementById("ad-productPrice").value = prezzo;
}

function registraUtente() {
    console.log("eccomi");
    var name = document.getElementById("nameRegister").value;
    var surname = document.getElementById("surnameRegister").value;
    var cf = document.getElementById("cfRegister").value;
    var address = document.getElementById("addressRegister").value;
    var address_number = document.getElementById("address-numberRegister").value;
    var city = document.getElementById("cityRegister").value;
    var region = document.getElementById("regioneRegistrazione").value;
    var province = document.getElementById("provinciaRegistrazione").value;
    var email = document.getElementById("emailRegister").value;
    var pwd = document.getElementById("pwdRegister").value;
    var username = document.getElementById("userRegister").value;

    var data = JSON.stringify({
        "nome": name,
        "cognome": surname,
        "cod_fiscale": cf,
        "via_residenza": address,
        "n_civico_residenza": address_number,
        "citta_residenza": city,
        "regione_residenza": region,
        "provincia_residenza": province,
        "email": email,
        "password": pwd,
        "nome_utente": username
    });

    var xhr = new ajaxRequest();
    xhr.open("POST", "API/utente/create.php", true);
    xhr.setRequestHeader("Content-type", "application/json;charset=UTF-8");
    xhr.send(data);
    window.location = 'index.php'
}

function inserisciAnnuncio() {
    console.log("eccomi");
    var titolo = document.getElementById("ad-title").value;
    var foto = document.getElementById("ad-image").value;
    var nome_articolo = document.getElementById("ad-productName").value;
    var prezzo = document.getElementById("ad-productPrice").value;
    var categoria_articolo = document.getElementById("categoriaArticolo").value;
    var sottocategoria_articolo = document.getElementById("sottocategoriaArticolo").value;
    var regione_vendita = document.getElementById("regioneVendita").value;
    var provincia_vendita = document.getElementById("provinciaVendita").value;
    var citta_vendita = document.getElementById("cittaVendita").value;
    var visibilita = document.getElementById("visibilita").value;
    var regione_visibilita = document.getElementById("regioneVisibilita").value;
    var provincia_visibilita = document.getElementById("provinciaVisibilita").value;
    var citta_visibilita = document.getElementById("cittaVisibilita").value
    if (document.getElementById('articoloNuovo').checked) {
        var stato_articolo = document.getElementById('articoloNuovo').value;
    } else {
        stato_articolo = document.getElementById('articoloUsato').value;
    }
    var stato_usura = document.getElementById("statoUsura").value
    var periodo_utilizzo = document.getElementById("periodoUtilizzo").value
    var tipo_garanzia = document.getElementById("tipoGaranzia").value
    var periodo_garanzia = document.getElementById("periodoGaranzia").value

    var data = JSON.stringify({
        "titolo": titolo,
        "foto": window.uploadedImage,
        "nome_articolo": nome_articolo,
        "prezzo": prezzo,
        "categoria_articolo": categoria_articolo,
        "sottocategoria": sottocategoria_articolo,
        "regione_vendita": regione_vendita,
        "provincia_vendita": provincia_vendita,
        "comune_vendita": citta_vendita,
        "visibilita": visibilita,
        "regione_visibilita": regione_visibilita,
        "provincia_visibilita": provincia_visibilita,
        "citta_visibilita": citta_visibilita,
        "stato_articolo": stato_articolo,
        "stato_usura": stato_usura,
        "periodo_utilizzo": periodo_utilizzo,
        "tipo_garanzia": tipo_garanzia,
        "periodo_garanzia": periodo_garanzia
    });



    var xhr = new ajaxRequest();
    xhr.open("POST", "API/annuncio/create.php", true);
    xhr.setRequestHeader("Content-type", "application/json;charset=UTF-8");
    xhr.send(data);
    window.location = 'index.php'
}

function generateImageBase64() {
    if (this.files && this.files[0]) {
        var fileReader = new FileReader();
        fileReader.addEventListener("load", function(e) {
            document.getElementById("ad-image").src = e.target.result;
            window.uploadedImage = e.target.result;
        });
        fileReader.readAsDataURL(this.files[0]);
    }
}