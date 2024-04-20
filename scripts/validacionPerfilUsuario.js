// Peticion ajax
$.ajax({
    type: "POST",
    url: "apis/peticionPerfilUsuario.php",
    data: { email: email },
    success: function(response) {
        $("#user-info").html(response);
    }
});