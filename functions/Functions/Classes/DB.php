<?php
declare(strict_types=1);

namespace Functions\Classes;

use DateTime;
use DateTimeZone;
use PDOException;
use PDOStatement;
use PDO;


class DB
{

    private static ?DB $instance = null;

    public ?PDO $connection = null;
    private PDOStatement $stmt;
    /**
     * @var array<string>
     */
    private array $sql_queries = [];

    private function __construct(array $db_config)
    {

        $dsn = "mysql:host={$db_config['db']['host']};dbname={$db_config['db']['dbname']};charset={$db_config['db']['charset']}";

        try {
            $this->connection = new PDO(
                $dsn,
                $db_config['db']['username'],
                $db_config['db']['password'],
                $db_config['db']['options']
            );

            echo "<script>console.log('DB Connected!')</script>";
        } catch (PDOException $e) {
            echo "DB Error: {$e->getMessage()}";
            die;
        }
    }


    private function __clone()
    {
        echo 'cloned db';
    }

    public function __wakeup()
    {
    }

    /**
     * Get the database instance.
     *
     * @param array $db_config The configuration array for the database connection.
     * @return DB The database instance.
     */
    public static function getInstance(array $db_config): DB
    {
        if (self::$instance === null) {
            self::$instance = new self($db_config);
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

        $sql_data = $this->sql_queries; // Get the current SQL queries


        file_put_contents('sql.log.mdx', 'Log time - [' . $currentTime->format('Y-m-d H:i:s') . '] - ' . PHP_EOL . print_r($sql_data, true), FILE_APPEND);

        return $this->sql_queries;
    }

}

