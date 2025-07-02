document.addEventListener("DOMContentLoaded", function() {
    const productos = document.querySelectorAll(".grid-item");
    const carrito = document.getElementById("carrito");
    const totalCarrito = document.getElementById("total-carrito");
    let total = 0;

    productos.forEach(producto => {
        producto.addEventListener("click", function() {
            const precio = parseInt(producto.querySelector("p").textContent.slice(1)); 
            total += precio;
            totalCarrito.textContent = "Total: $" + total; 
        });
    });

    carrito.addEventListener("mouseover", function() {
        carrito.title = "Total: $" + total;
    });
});
