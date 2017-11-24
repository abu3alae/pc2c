// Classe XMLHttpRequest
// Code d'implementation generique qui doit etre mise en ouvre afin de gerer la coniguration du Classe XMLHttpRequest
function getXMLHttpRequest() {
    if(window.XMLHttpRequest) {
        var xmlHttpReq = new XMLHttpRequest(); // Eviter un bogue navigateur SAFARI
        if(xmlHttpReq.overrideMimeType) {
            xmlHttpReq.overrideMimeType("text/xml");
        }
        return xmlHttpReq;
    } else if (window.ActiveXObject) {
        try {
           return new ActiveXObject("Msxml2.XMLHTTP");
        }  catch(err){}
        try {
            return new ActiveXObject("Microsoft.XMLHTTP");
        } catch(err){}
   } throw new error("Impossible de cree l'objet XMLHttpRequest pour le navigateur.");
}

function msgDelete(ce, nom , prenom, niveau, classe) {
    var msgdel = confirm("هل أنت متأكد من حذف : " +nom +" "+prenom);
    var transport = getXMLHttpRequest();
    var ctrl="scolarity";
    var action="delete";
    var adresse = [];
    adresse.push("?ctrl=");
    adresse.push(ctrl);
    adresse.push("&action=");
    adresse.push(action);
    adresse.push("&id_ce=");
    adresse.push(ce);
    if(msgdel){
        transport.open("get", adresse.join(""), true);
        transport.send(null);
    }
}

function msgUpdate(ce, nom , prenom) {
    var msgdel = confirm("هل أنت متأكد من تحيين معطيات : " +prenom +" "+nom);
    var transport = getXMLHttpRequest();
    var ctrl="scolarity";
    var action="update";
    var adresse = [];
    adresse.push("?ctrl=");
    adresse.push(ctrl);
    adresse.push("&action=");
    adresse.push(action);
    adresse.push("&id_ce=");
    adresse.push(ce);
    if(msgdel){
        transport.open("get", adresse.join(""), true);
        transport.send(null);
    }
}

function executerRequeteGet(adresse, parametres) {
    var requete = [];
    // Spécification de l’adresse de la requête
    requete.push("http://localhost/pc/index.php");
    // Spécification des paramètres de la requête
    var premierParametre = true;
    for( parametre in parametres ) {
        if( premierParametre ) {
            requete.push("?");
        } else {
            requete.push("&");
        }
        requete.push(parametre);
        requete.push("=");
        requete.push(parametres[parametre]);
        premierParametre = false;
    }
    // Envoi de la requête
    var iframe = document.getElementById("iframeCachee");
    iframe.src = requete.join("");
}