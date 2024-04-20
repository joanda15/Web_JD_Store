// Escucho el registro por medio de el evento del boton
document.getElementById("formularioRegistro").addEventListener("submit", function (event) {
    event.preventDefault();
    // Obtengo valores de los campos
    var name = document.getElementById("name").value;
    var apellido = document.getElementById("apellido").value;
    var email = document.getElementById("email").value;
    var adress = document.getElementById("adress").value;
    var pass = document.getElementById("passC").value;
    // Verifica que los campos requeridos no estén vacíos
    if (!name || !apellido || !email || !adress || !pass) {
        alert("Por favor, completa todos los campos.");
        return;
    }
    // Variable con los datos a enviar
    var data = {
        name: name,
        apellido: apellido,
        email: email,
        adress: adress,
        pass: pass
    };
    // Metodo para enviar la solicitud al servidor
    fetch("apis/registrarPerfilUsuario.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
    // Metodo de respuesta
    .then(function (response) {
        if (!response.ok) {
            throw new Error("Error en la solicitud. Código de estado: " + response.status);
        }
        return response.json();
    })
    .then(function (responseData) {
        console.log(responseData);
        alert("Envío exitoso.");
    })
    // Metodo con el que manejo errores
    .catch(function (error) {
        console.error("Error en la solicitud:", error);
        alert("Hubo un error al enviar el mensaje. Por favor, intenta nuevamente más tarde.");
    });
});
