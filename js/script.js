// alert ("Bienvenido");

var contador = 1;

    function sumar() {
        contador++;
        document.getElementById('unidades').textContent = contador;
    }

    function restar() {
        if (contador > 1) {
            contador--;
            document.getElementById('unidades').textContent = contador;
        }
    }

// Pago
function pago() {
    alert("Pago realizado con exito")
    window.location.reload();
}