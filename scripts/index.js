// Envio de mensaje
document.getElementById("formularioMensajes").addEventListener("submit", function (event) {
    event.preventDefault();
    // Obtenemos valores de los campos
    var name = document.getElementById("nameMensaje").value;
    var email = document.getElementById("emailMensaje").value;
    var comment = document.getElementById("comment").value;
    // Verificamos que los campos requeridos no estén vacíos
    if (!name || !comment) {
        alert("Por favor, completa los campos obligatorios.");
        return;
    }
    // Objeto con los datos a enviar
    var data = {
        name: name,
        email: email,
        comment: comment
    };
    // Metodo con el cual envio solicitud al servidor
    fetch("apis/registrarMensaje.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
    // Metodo que utilizo para poder evaluar la promesa y responder
    .then(function (response) {
        if (!response.ok) {
            throw new Error("Error en la solicitud. Código de estado: " + response.status);
        }
        return response.json();
    })
    .then(function (responseData) {
        console.log(responseData);
        alert("Envío exitoso.");
        window.location.href = 'index.php';
    })
    // Metodo con el cual manejo los erroes
    .catch(function (error) {
        console.error("Error en la solicitud:", error);
        alert("Hubo un error al enviar el mensaje. Por favor, intenta nuevamente más tarde.");
    });
});

// Contador de unidades de la tarjeta
var contador = 1;
// Funcion para aumentar = mas
function sumar() {
    contador++;
    document.getElementById('unidades').textContent = contador;
}
// Funcion para disminuir = menos
function restar() {
    if (contador > 1) {
        contador--;
        document.getElementById('unidades').textContent = contador;
    }
}

// Funcion para enviar el pago
function pago() {
    alert("Pago realizado con exito")
    window.location.reload();
}
