<?php

class Producto {
    // conexion de base de datos y tabla productos
    private $conn;
    private $nombre_tabla = 'productos';
    // atributos de la clase
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $categoria_id;
    public $categoria_desc;
    public $creado;
    // constructor con $db como conexion a base de datos

    public function __construct( $db ) {
        $this->conn = $db;
    }
    // leer productos
    // leer productos

    function read() {
        // query para seleccionar todos
        $query = "SELECT c.nombre as categoria_desc, p.id, p.nombre, p.descripcion, p.precio, p.categoria_id, p.creado FROM " . $this->nombre_tabla . " p LEFT JOIN categorias c ON p.categoria_id = c.id ORDER BY p.creado DESC";
        // sentencia para preparar query
        $stmt = $this->conn->prepare( $query );
        // ejecutar query
        $stmt->execute();
        return $stmt;
    }
    // crear producto
    function crear() {
        // query para insertar
        $query = "INSERT INTO " . $this->nombre_tabla . " SET nombre=:nombre, precio=:precio, descripcion=:descripcion, categoria_id=:categoria_id, creado=:creado";
        // sentencia para preparar query
        $stmt = $this->conn->prepare( $query );
        // limpiar
        $this->nombre = htmlspecialchars( strip_tags( $this->nombre ) );
        $this->precio = htmlspecialchars( strip_tags( $this->precio ) );
        $this->descripcion = htmlspecialchars( strip_tags( $this->descripcion ) );
        $this->categoria_id = htmlspecialchars( strip_tags( $this->categoria_id ) );
        $this->creado = htmlspecialchars( strip_tags( $this->creado ) );
        // vincular valores
        $stmt->bindParam( ":nombre", $this->nombre );
        $stmt->bindParam( ":precio", $this->precio );
        $stmt->bindParam( ":descripcion", $this->descripcion );
        $stmt->bindParam( ":categoria_id", $this->categoria_id );
        $stmt->bindParam( ":creado", $this->creado );
        // ejecutar query
        if ( $stmt->execute() ) {
            return true;
        }
        return false;
    }
    
    // leer un solo producto
    function readOne() {
        // query para seleccionar un solo registro
        $query = "SELECT c.nombre as categoria_desc, p.id, p.nombre, p.descripcion, p.precio, p.categoria_id, p.creado FROM " . $this->nombre_tabla . " p LEFT JOIN categorias c ON p.categoria_id = c.id WHERE p.id = ? LIMIT 0,1";
        // sentencia para preparar query
        $stmt = $this->conn->prepare( $query );
        // vincular id del producto a actualizar
        $stmt->bindParam( 1, $this->id );
        // ejecutar query
        $stmt->execute();
        // obtener fila
        $row = $stmt->fetch( PDO::FETCH_ASSOC );
        // establecer valores a propiedades del objeto
        $this->nombre = $row[ 'nombre' ];
        $this->precio = $row[ 'precio' ];
        $this->descripcion = $row[ 'descripcion' ];
        $this->categoria_id = $row[ 'categoria_id' ];
        $this->categoria_desc = $row[ 'categoria_desc' ];
    }

    // actualizar producto
    function actualizar() {
        // query para actualizar
        $query = "UPDATE " . $this->nombre_tabla . " SET nombre=:nombre, precio=:precio, descripcion=:descripcion, categoria_id=:categoria_id WHERE id=:id";
        // sentencia para preparar query
        $stmt = $this->conn->prepare( $query );
        // limpiar
        $this->nombre = htmlspecialchars( strip_tags( $this->nombre ) );
        $this->precio = htmlspecialchars( strip_tags( $this->precio ) );
        $this->descripcion = htmlspecialchars( strip_tags( $this->descripcion ) );
        $this->categoria_id = htmlspecialchars( strip_tags( $this->categoria_id ) );
        $this->id = htmlspecialchars( strip_tags( $this->id ) );
        // vincular valores
        $stmt->bindParam( ":nombre", $this->nombre );
        $stmt->bindParam( ":precio", $this->precio );
        $stmt->bindParam( ":descripcion", $this->descripcion );
        $stmt->bindParam( ":categoria_id", $this->categoria_id );
        $stmt->bindParam( ":id", $this->id );
        // ejecutar query
        if ( $stmt->execute() ) {
            return true;
        }
        return false;
    }

    // eliminar producto
    function eliminar() {
        // query para eliminar
        $query = "DELETE FROM " . $this->nombre_tabla . " WHERE id = ?";
        // sentencia para preparar query
        $stmt = $this->conn->prepare( $query );
        // limpiar
        $this->id = htmlspecialchars( strip_tags( $this->id ) );
        // vincular id del producto a eliminar
        $stmt->bindParam( 1, $this->id );
        // ejecutar query
        if ( $stmt->execute() ) {
            return true;
        }
        return false;
    }
}
?>