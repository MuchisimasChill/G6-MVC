<?php

namespace app\basic;

class Database
{
    public \PDO $pdo;

    public function __construct(array $data){
        $dsn = $data['dsn'] ?? '';
        $user = $data['user'] ?? '';
        $password = $data['password'] ?? '';
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $doneMigration = $this->getDoneMigrations();

        $newMigrations = [];
        $files = scandir(Application::$ROOT_DIR . '/migrations');        
        $ToDoMigrations = array_diff($files, $doneMigration);
        foreach ($ToDoMigrations as $toDoMigration) {
            if ($toDoMigration === '.' || $toDoMigration === '..') continue;

            require_once Application::$ROOT_DIR.'/migrations/'.$toDoMigration;
            $className = pathinfo($toDoMigration, PATHINFO_FILENAME);
            $inst = new $className();
            echo "Doing migration $toDoMigration" . PHP_EOL;
            $inst->up();
            echo "Done migration $toDoMigration" . PHP_EOL;
            $newMigrations[] = $toDoMigration;
        }

        if (!empty($newMigrations)) {
              $this->saveMigrations($newMigrations);
        } else {
            echo 'All migrations done';
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations(
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;");
    }

    public function getDoneMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {
        $sql_string = implode(",", array_map(fn($m) => "('$m')", $migrations));
        // echo '<pre>';
        // var_dump($sql_string);
        // echo '</pre>';
        // exit;
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES
            $sql_string
        ");
        $statement->execute();
    }
}