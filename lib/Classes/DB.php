<?php

declare(strict_types=1);

namespace Lib\Classes;

use DateTime;
use DateTimeZone;
use PDOException;
use PDOStatement;
use PDO;

enum DBDriver: string
{
    case MYSQL = 'mysql';
    case SQLITE = 'sqlite';
    case POSTGRESQL = 'postgresql';
    case SQLSERVER = 'sqlserver';
}


final class DB
{

    private static ?DB $instance = null;

    public ?PDO $connection = null;
    private PDOStatement $stmt;
    /**
     * @var array<string>
     */
    private array $sql_queries = [];

    private function __construct(array $db_config, string $driver = 'mysql')
    {


        $dsn = match ($driver) {
            DBDriver::MYSQL->value => "mysql:host={$db_config['db'][$driver]['host']};dbname={$db_config['db'][$driver]['dbname']};charset={$db_config['db'][$driver]['charset']}",
            DBDriver::SQLITE->value => "sqlite:{$db_config['db'][$driver]['dbname']}",
            DBDriver::POSTGRESQL->value => "pgsql:host={$db_config['db'][$driver]['host']};dbname={$db_config['db'][$driver]['dbname']}",
            DBDriver::SQLSERVER->value => "sqlsrv:Server={$db_config['db'][$driver]['host']};Database={$db_config['db'][$driver]['dbname']}",
            default => '',
        };


        try {
            $this->connection = new PDO(
                $dsn,
                $db_config['db'][$driver]['username'],
                $db_config['db'][$driver]['password'],
                $db_config['db'][$driver]['options']
            );

            //echo "<script>console.log('DB Connected!')</script>";
        } catch (PDOException $e) {
            echo "DB Error: {$e->getMessage()}";
            die;
        }
    }


    private function __clone(): void
    {
        echo 'cloned db';
    }


    /**
     * Disable unserialize() to prevent potential injection attacks.
     */
    public function __wakeup(): void {}


    /**
     * @param array $db_config The configuration of the database connection.
     * The expected keys in the array are:
     * - db: array with the following keys:
     *   - host: string with the hostname of the database server
     *   - dbname: string with the name of the database
     *   - username: string with the username to use when connecting to the database
     *   - password: string with the password to use when connecting to the database
     *   - charset: string with the charset to use when connecting to the database
     *   - options: array with the options to use when connecting to the database
     * @return DB The instance of the database connection.
     */
    public static function getInstance(array $db_config, string $driver = 'mysql'): DB
    {
        if (self::$instance === null) {

            self::$instance = new self($db_config, $driver);
        }

        return self::$instance;
    }


    /**
     * A description of the entire PHP function.
     *
     * @param string $query description
     * @param array $params description
     * @return DB|null
     * @throws PDOException description of exception
     */
    final public function custom_query(string $query, array $params = []): DB|null
    {

        try {
            $this->stmt = $this->connection->prepare($query);

            $this->stmt->execute($params);
            ob_start();
            $this->stmt->debugDumpParams();
            $this->sql_queries[] = ob_get_clean();
            return $this;
        } catch (PDOException $e) {
            switch ($e->getCode()) {
                case 23000:
                    sessionSet('db_error', 'Such user already exists!');
                    header('Location: ' . $_SERVER['PHP_SELF']);
                    die;
                default:
                    sessionRemove('db_error');
            }
            die;
        }
    }

    final public function find(): mixed
    {
        return $this->stmt->fetch();
    }

    /**
     * @return false|array
     * gets all rows from the table
     */
    final public function findAll(): false|array
    {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    final public function findColumn(): mixed
    {
        return $this->stmt->fetchColumn();
    }

    /**
     * @return string[]
     * @throws \Exception
     */
    final public function getSqlQueries(string $timezone = 'UTC'): array
    {
        $currentTime = new DateTime('now', new DateTimeZone($timezone));

        $sql_data = DB::$instance->sql_queries; // Get the current SQL queries



        file_put_contents('sql.log.mdx', 'Log time - [' . $currentTime->format('Y-m-d H:i:s') . '] - '  . print_r(json_encode($sql_data), true), FILE_APPEND);

        return $this->sql_queries;
    }
}
