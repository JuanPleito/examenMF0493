
<div class="detalle-producto-container">
    <div class="detalle-producto-img">
        <img src="<?= BASE_URL ?>/assests/<?= htmlspecialchars($producto->getImagenUrl()) ?>" ?>">
    </div>
    <div class="detalle-producto-info">
        <h2><?= htmlspecialchars($producto->getNombreProducto()) ?></h2>
        <p class="detalle-producto-descripcion"><?= htmlspecialchars($producto['descripcion']) ?></p>
        <p class="detalle-producto-precio"><strong>Precio:</strong> <?= htmlspecialchars($producto['precio']) ?> €</p>
        <p class="detalle-producto-stock"><strong>Unidades disponibles:</strong> <?= htmlspecialchars($producto['stock']) ?></p>
        <form action="<?= BASE_URL ?>/carrito/agregar" method="post" class="form-agregar-carrito">
            <input type="hidden" name="producto_id" value="<?= htmlspecialchars($producto['id']) ?>">
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="1" min="1" max="<?= htmlspecialchars($producto['stock']) ?>" required>
            <button type="submit" class="btn-principal">Añadir al carrito</button>
        </form>
    </div>
</div>