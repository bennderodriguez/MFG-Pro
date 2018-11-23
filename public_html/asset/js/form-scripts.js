$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Todos los campos  requeridos");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});

function submitForm() {
    // Initiate Variables With Form Content
    var usuario = $("#usuario").val();
    console.log('usuario: ' + usuario);
    var Password = $("#Password").val();
    console.log('Password: ' + Password);
    $.ajax({
        type: "POST",
        url: host+"/MFG-RockJS/",
        data: "action=auth&usuario=" + usuario + "&Password=" + Password,
        success: function (text) {
            console.log(text);
            if (text.message[0].auth == "success") {
                localStorage.setItem("jwt", text.message[2].JWT);
                var obj = JSON.stringify(text.message[1]);
                console.log(obj);
                localStorage.setItem("Opciones", obj);
                formSuccess();
            } else {
                formError();
                submitMSG(false, text.message[0].auth);
            }
        }
    });
}

function formSuccess() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Bienvenido!");
    location.href = "menu.php";
}

function formError() {
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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