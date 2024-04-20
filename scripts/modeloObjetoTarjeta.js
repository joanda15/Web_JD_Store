// Creacion objeto tarjeta
function crearTarjeta(nombreProducto, descripcion, rutaImagen, precio) {
    // Crear un elemento div para la tarjeta
    var cardDiv = document.createElement('div');
    cardDiv.classList.add('card');
    cardDiv.style.width = '18rem';
    // Crear la imagen de la tarjeta
    var img = document.createElement('img');
    img.src = rutaImagen;
    img.classList.add('card-img-top');
    img.alt = nombreProducto;
    cardDiv.appendChild(img);
    // Crear el cuerpo de la tarjeta
    var cardBody = document.createElement('div');
    cardBody.classList.add('card-body');
    // Agregar título y descripción
    var title = document.createElement('h5');
    title.classList.add('card-title');
    title.textContent = nombreProducto;
    cardBody.appendChild(title);
    // Descripcion tarjeta
    var description = document.createElement('p');
    description.classList.add('card-text');
    description.textContent = descripcion;
    cardBody.appendChild(description);
    cardDiv.appendChild(cardBody);
    // Crear la lista de grupos
    var ul = document.createElement('ul');
    ul.classList.add('list-group', 'list-group-flush');
    // Agregar elementos de la lista (talla, color, cantidad, precio)
    var liTalla = document.createElement('li');
    liTalla.classList.add('list-group-item');
    liTalla.innerHTML = `
        <div class="talla">
            <label for="selectTalla"></label>
            <select class="form-select" id="selectTalla">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
            </select>
        </div>
    `;
    ul.appendChild(liTalla);
    // Agregar más elementos de la lista aquí (color, cantidad, precio)
    cardDiv.appendChild(ul);
    // Crear el cuerpo de la tarjeta (parte inferior)
    var cardBodyBottom = document.createElement('div');
    cardBodyBottom.classList.add('card-body');
    // Agregar enlaces (Carrito, Comprar)
    var carritoLink = document.createElement('a');
    carritoLink.href = '#';
    carritoLink.classList.add('card-link', 'text-danger');
    carritoLink.textContent = 'Carrito';
    cardBodyBottom.appendChild(carritoLink);
    // Variable comprar
    var comprarLink = document.createElement('a');
    comprarLink.href = '#';
    comprarLink.classList.add('card-link', 'text-danger');
    comprarLink.textContent = 'Comprar';
    cardBodyBottom.appendChild(comprarLink);
    cardDiv.appendChild(cardBodyBottom);
    // Agregar la tarjeta al contenedor
    document.getElementById('contenedor-tarjetas').appendChild(cardDiv);
}

// Ejemplo de cómo llamar a la función para crear una tarjeta
crearTarjeta('Nombre Producto', 'Descripción breve del producto.', 'imgs/prendas/Calzado/calzado2.jfif', '$100.000');