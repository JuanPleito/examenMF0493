<?php
// require_once(__DIR__ . '/../..config/Database.php');

class Producto { 
    private $id;
    private $nombre_producto;
    private $descripcion;
    private $precio;
    private $stock;
    private $imagen_url;
    private $idCategoria;
    private $bd;

    public function __construct($nombreProducto, $descripcion, $precio, $stock, $imagen_url, $idCategoria, $bd, $id = 0) {
        $this->nombre_producto = $nombreProducto;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->imagen_url = $imagen_url;
        $this->idCategoria = $idCategoria;
        $this->bd = $bd;
        $this->id = $id;
    }

    public static function getProductoPorNombre($nombreProducto, $bd) {
        $stmt = $bd->prepare("SELECT * FROM productos WHERE nombre_producto = ?");
        $stmt->execute([$nombreProducto]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new Producto(
                $fila['nombre_producto'],
                $fila['descripcion'],
                $fila['precio'],
                $fila['stock'],
                $fila['imagen_url'],
                $fila['idCategoria'],
                $bd,
                $fila['id']
            );
        }

        return null; // Si no encuentra nada, devuelve null
    }

    public static function getListaProductos($bd) {
        $stmt = $bd->query("SELECT * FROM productos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar() {
        if ($this->id == 0) {
            // INSERTAR NUEVO
            $stmt = $this->bd->prepare(
                "INSERT INTO productos (nombre_producto, descripcion, precio, stock, imagen_url, idCategoria) 
                 VALUES (?, ?, ?, ?, ?, ?)"
            );
            $resultado = $stmt->execute([
                $this->nombre_producto,
                $this->descripcion,
                $this->precio,
                $this->stock,
                $this->imagen_url,
                $this->idCategoria
            ]);
            if ($resultado) {
                $this->id = $this->bd->lastInsertId();
            }
        } else {
            // ACTUALIZAR EXISTENTE
            $stmt = $this->bd->prepare(
                "UPDATE productos 
                 SET nombre_producto = ?, descripcion = ?, precio = ?, stock = ?, imagen_url = ?, idCategoria = ? 
                 WHERE id = ?"
            );
            $resultado = $stmt->execute([
                $this->nombre_producto,
                $this->descripcion,
                $this->precio,
                $this->stock,
                $this->imagen_url,
                $this->idCategoria,
                $this->id
            ]);
        }
        return $resultado;
    }

    public  static function getProductoPorId($bd, $id) {
        $stmt = $bd->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new Producto(
                $fila['nombre_producto'],
                $fila['descripcion'],
                $fila['precio'],
                $fila['stock'],
                $fila['imagen_url'],
                $fila['idCategoria'],
                $bd,
                $fila['id'],
            );
        }

        return null; // Si no encuentra nada, devuelve null
}

    /**
     * Get the value of nombre_producto
     */
    public function getNombreProducto()
    {
        return $this->nombre_producto;
    }

    /**
     * Set the value of nombre_producto
     */
    public function setNombreProducto($nombre_producto): self
    {
        $this->nombre_producto = $nombre_producto;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion($descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio($precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     */
    public function setStock($stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of imagen_url
     */
    public function getImagenUrl()
    {
        return $this->imagen_url;
    }

    /**
     * Set the value of imagen_url
     */
    public function setImagenUrl($imagen_url): self
    {
        $this->imagen_url = $imagen_url;

        return $this;
    }

    /**
     * Get the value of idCategoria
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * Set the value of idCategoria
     */
    public function setIdCategoria($idCategoria): self
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }
}
?>
