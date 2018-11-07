$("#ccxc").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Todos los campos  requeridos");
    } else {
        submitMSG(false, "");
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm() {
    // Initiate Variables With Form Content
    var Cobra = $("#Cobra").val();
    console.log('Cobra: ' + Cobra);

    var Solo_Abiert = $("#Solo_Abiert").val();
    console.log('Solo_Abiert: ' + Solo_Abiert);

    var Moneda = $("#Moneda").val();
    console.log('Moneda: ' + Moneda);

    var Balance = $("#Balance").val();
    console.log('Balance: ' + Balance);

    var Ord = $("#Ord").val();
    console.log('Ord: ' + Ord);

    var MonedaRep = $("#MonedaRep").val();
    console.log('MonedaRep: ' + MonedaRep);

    var Salida = $("#Salida").val();
    console.log('Salida: ' + Salida);

    //get JWT
    var jwt = localStorage.getItem("jwt");

    document.getElementById("help2").innerHTML = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... espere <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';


    $.ajax({
        type: "POST",
        url: "http://localhost/MFG-RockJS/",
        data: "action=ccxc&jwt=" + jwt + "&Cobra=" + Cobra + "&Solo_Abiert=" + Solo_Abiert
                + "&Moneda=" + Moneda + "&MonedaRep=" + MonedaRep + "&Salida=" + Salida,
        success: function (text) {
            console.log(text.message[0].Salida);


           // document.getElementById("help2").innerHTML = text.message[0].Salida;

            helper("help2", "info",  text.message[0].Salida, true);
//            if (text.message.auth == "success") {
//                formSuccess();
//                console.log(text.message.JWT);
//                localStorage.setItem("jwt", text.message.JWT);
//            } else {
//                formError();
//                submitMSG(false, text.message.auth);
//            }
        }
    });
}

function formSuccess() {
    $("#ccxc")[0].reset();
    submitMSG(true, "Bienvenido!");
    location.href = "menu.html";
}

function formError() {
    $("#ccxc").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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

/**
 * helper
 * Bootstrap 4 provides an easy way to create predefined alert messages:
 * @param {type} String idiv Selecciona un div 
 * @param {type} Select type success, info, warning, danger, primary
 * @param {type} String message Content to alert
 * @param {type} Boolean dismissible true, false
 * @returns {undefined}
 */
function helper(idiv, type, message, dismissible = false) {
    switch (type) {
        case 'success':
            if (dismissible) {
                document.getElementById(idiv).innerHTML = '<div class="alert alert-success alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Message!</strong> ' + message + '</div>'
            } else {
                document.getElementById(idiv).innerHTML = '<div class="alert alert-success"><strong>Mensaje!</strong> ' + message + '</div>';
            }
            break;
        case 'info':
            if (dismissible) {
                document.getElementById(idiv).innerHTML = '<div class="alert alert-info alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Message!</strong> ' + message + '</div>'
            } else {
                document.getElementById(idiv).innerHTML = '<div class="alert alert-info"><strong>Mensaje!</strong> ' + message + '</div>';
            }
            break;
        case 'warning':
            if (dismissible) {
                document.getElementById(idiv).innerHTML = '<div class="alert alert-warning alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Message!</strong> ' + message + '</div>'
            } else {
                document.getElementById(idiv).innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + message + '</div>';
            }
            break;
        case 'danger':
            if (dismissible) {
                document.getElementById(idiv).innerHTML = '<div class="alert alert-danger alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Message!</strong> ' + message + '</div>'
            } else {
                document.getElementById(idiv).innerHTML = '<div class="alert alert-danger"><strong>Mensaje!</strong> ' + message + '</div>';
            }
            break;
        case 'primary':
            if (dismissible) {
                document.getElementById(idiv).innerHTML = '<div class="alert alert-primary alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Message!</strong> ' + message + '</div>'
            } else {
                document.getElementById(idiv).innerHTML = '<div class="alert alert-primary"><strong>Mensaje!</strong> ' + message + '</div>';
            }
            break;
        default:
            document.getElementById(idiv).innerHTML = '<div class="alert alert-dark alert-dark"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Message!</strong> ' + message + '</div>'
            break;
}
}