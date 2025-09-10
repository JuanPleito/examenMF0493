
<h2>Nuevo producto</h2>
<form class="form-producto" action="<?= BASE_URL ?>/productos/guardar" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre_producto">Nombre:</label>
        <input type="text" id="nombre_producto" name="nombre_producto" required maxlength="50">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required maxlength="500"></textarea>
    </div>
    <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required step="0.01" min="0">
    </div>
    <div class="form-group">
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required min="0">
    </div>

    <div class="form-group">
        <label for="categoria">Categoría:</label>
        <select id="categoria" name="idCategoria" required>
            <option value="">Seleccione una categoría</option>
            <?php
            foreach ($categorias as $categoria): ?>
                <option value="<?= htmlspecialchars($categoria['id'], ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($categoria['nombre_categoria'], ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="imagen_url">Imagen:</label>
        <input type="file" id="imagen_url" name="imagen_url" accept="image/*" required>
    </div>
    <button type="submit" class="btn-principal">Crear producto</button>
</form>