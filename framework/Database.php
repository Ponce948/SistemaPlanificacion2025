<?php

declare(strict_types=1);

namespace Framework;

use PDO;
use PDOException;

class Database
{
    // Conexion activa a la base de datos
    private PDO $connection;

    // Ultima sentencia preparada/ejecutada
    private ?\PDOStatement $statement = null;

    public function __construct()
    {
        // Conexion PDO. Los datos salen de /config (ver helpers.php)
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            config('host', 'localhost'),
            config('dbname', 'web'),
            config('charset')
        );

        // Opciones basicas: errores como excepcion y fetch como array asociativo
        $defaultOptions = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        // Si en config hay mas opciones, se juntan aqui
        $options = array_replace($defaultOptions, (array) config('options', []));

        try {
            $this->connection = new PDO(
                $dsn,
                (string) config('username'),
                (string) config('password'),
                $options
            );
        } catch (PDOException $e) {
            // Mensaje simple para el usuario (sin mostrar credenciales)
            die('Error de conexión a la base de datos. Verifica host/usuario/clave y que MySQL esté encendido.');
        }
    }

    // Prepara y ejecuta una consulta con parametros
    public function query(string $sql, array $params = []): self
    {
        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($params);

        return $this;
    }

    // Trae todos los registros
    public function get(): array
    {
        return $this->statement?->fetchAll() ?? [];
    }

    // Trae un solo registro
    public function first(): array|false
    {
        return $this->statement?->fetch() ?? false;
    }

    // Trae un registro o devuelve 404
    public function firstOrFail(): array
    {
        $result = $this->first();

        if (!$result) {
            http_response_code(404);
            exit('404 Not Found');
        }

        return $result;
    }
}