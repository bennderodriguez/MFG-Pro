$("#icloiq").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Llene los campos requeridos");
    } else {
        submitMSG(false, "");
        $("#bodyReport").empty();
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm() {
    document.getElementById("bodyReport").innerHTML = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... espere <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';

    // Initiate Variables With Form Content
    var Articulos = $("#Articulos").val();
    console.log('Articulos: ' + Articulos);
    var Almacen = $("#Almacen").val();
    console.log('Almacen: '+ Almacen);
    var Ubicacion = $("#Ubicacion").val();
    console.log('Ubicacion: '+ Ubicacion);
    var Lote = $("#Lote").val();
    console.log('Lote: '+ Lote);
    var Status = $("#Status").val();
    console.log('Status: '+ Status);
    var Salida = $("#Salida").val();
    console.log('Salida: '+ Salida);

    //get JWT
    var jwt = localStorage.getItem("jwt");

    $.ajax({
        type: "POST",
        url: host + "/MFG-RockJS/",
        data: "action=icloiq&jwt=" + jwt + "&vpart=" + Articulos + "&valmacen=" + Almacen
                + "&vubica=" + Ubicacion + "&vloster=" + Lote + "&vstatus=" + Status,
        success: function (text) {
            console.log(text);
            //Validamos que la sesion este activa
            if (text.status.toString() == "Error") {
                document.getElementById("bodyReport").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + text.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
            } else {
                var folio = text.message[0].Consulta;

                console.log(folio);
                ///mfg-pro/public_html/mfg/
                var uri = ""
                if (host == "http://localhost") {
                    uri = 'reporte';
                } else {
                    uri = host + "/mfg-pro/public_html/mfg/" + folio.toString();
                }

                setTimeout(function () {
                    if (Salida == "Terminal") {
                        $("#bodyReport").empty();
                        readTextFile(uri + '.prn');
                    } else {
                        $("#bodyReport").empty();
                        //loadPDF(uri + '.pdf');
                        document.getElementById("bodyReport").innerHTML =
                                '<iframe src="' + uri + '.pdf" style="width:100%;height:700px;"></iframe>';
                    }

                }, 5000);
                formSuccess();
            }


        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            alert("No fue posible conectar con la nube. Verifique su conexión a internet");
            //submitMSG(false, "No fue posible conectar con la nube :( verifique su conexión a internet");
        }
    });
}

//$(document).ready(function () {
//    readTextFile('reporte.rpm');
//});

function readTextFile(file)
{
    var txtFile = new XMLHttpRequest();
    txtFile.open("GET", file, false);
    txtFile.onreadystatechange = function ()
    {
        if (txtFile.readyState === 4)
        {
            if (txtFile.status === 200 || txtFile.status == 0)
            {
                var result = txtFile.responseText;
                var lines = result.split("\n");
                console.log(result);
                for (var i = 0; i < lines.length; i++) {
                    //create option
                    var el = $('<pre value="' + i + '">' + lines[i] + '</pre>');
                    //append option to select
                    $('#bodyReport').append(el);
                }

            }
        }
    }
    txtFile.send(null);
}

function loadXMLDoc(uri) {
    $.get('reporte.rpm', function (data) {
        //split on new lines
        var lines = data.split('\n');
        //create select
        var dropdown = $('<select>');
        //iterate over lines of file and create a option element
        for (var i = 0; i < lines.length; i++) {
            //create option
            var el = $('<option value="' + i + '">' + lines[i] + '</option>');
            //append option to select
            $(dropdown).append(el);
        }
        //append select to page
        $('bodyReport').append(dropdown);
    });
}

function formSuccess() {
    $("#icloiq")[0].reset();
    //submitMSG(true, "Bienvenido!");
    //location.href = "menu.html";
}

function formError() {
    $("#icloiq").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass();
    });
}

function submitMSG(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}

function printDiv() {
    //Get the HTML of div
    var divElements = document.getElementById("bodyReport").innerHTML;
    //Get the HTML of whole page
    var oldPage = document.body.innerHTML;

    //Reset the page's HTML with div's HTML only
    document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

    //Print Page
    window.print();

    //Restore orignal HTML
    document.body.innerHTML = oldPage;


}
