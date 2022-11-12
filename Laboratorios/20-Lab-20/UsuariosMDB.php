<?php
class usuariosMBD
{
    private $mongo_client;
    private $mongo_host;
    private $mongo_user;
    private $mongo_pswd;
    private $mongo_database;
    private $mongo_collection;
    private $mongo_document;

    function __construct()
    {
        $this->mongo_host = "localhost:27017";
        $this->mongo_user = "";
        $this->mongo_pswd = "";
        $this->mongo_database = "usuarios_api";
        $this->mongo_collection = "usuarios";
        $this->conectarMongodb();
    }

    public function conectarMongodb()
    {
        try {
            $this->mongo_client = new MongoDB\Driver\Manager("mongodb://" . $this->mongo_host);
        } catch (Exception $e) {
            die("Error al conectar con MongoDB: " . $e->getMessage());
        }
    }

    public function insertarUsuario($nombre, $apellido, $email, $edad)
    {
        try {
            $this->mongo_document = new MongoDB\Driver\BulkWrite();
            $doc - ['id' => new MongoDB\BSON\ObjectId(), 'nombre' -> $nombre, 'apellido' -> $apellido, 'email' -> $email, 'edad' ->intval($edad)];
            $this->mongo_document->insert($doc);
            $this->mongo_client->executeBulkWrite("$this->mongo_database.$this->mongo_collection", $this->mongo_document);
        } catch (MongoDB\Driver\Exception\Exception $e) {
            echo "Error al insertar el usuario: ".$e->getMessage();
        }
    }

    public function obtenerUsuarios()
    {
        try {
            $query = new MongoDB\Driver\Query([]);
            $rows = $this->mongo_client->executeQuery("$this->mongo_database.$this->mongo_collection", $query);
        
            foreach ($rows as $row) {
                echo "Nombre: ".$row->nombre." Apellido: ".$row->apellido." Email: ".$row->email." Edad: ".$row->edad."<br>";
            }
        } catch (MongoDB\Driver\Exception\Exception $e) {
            echo "Error al obtener los usuarios: ".$e->getMessage();
        }
    }
}
?>