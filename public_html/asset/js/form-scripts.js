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
        url: "http://127.0.0.1/MFG-RockJS/",
        data: "action=auth&usuario=" + usuario + "&Password=" + Password,
        success: function (text) {
            console.log(text);
            if (text.message.auth == "success") {
                formSuccess();
                console.log(text.message.JWT);
                localStorage.setItem("jwt", text.message.JWT);
            } else {
                formError();
                submitMSG(false, text.message.auth);
            }
        }
    });
}

function formSuccess() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Bienvenido!");
    location.href = "menu.html";
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