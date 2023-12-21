<?php

class DatabaseCrud
{
    private $host = "your_host";
    private $username = "your_username";
    private $password = "your_password";
    private $database = "your_database";
    private $connection;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->database}";
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function create($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $values = implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES (:$values)";

        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute($data);
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            die("Create failed: " . $e->getMessage());
        }
    }

    public function select($table, $columns = "*", $conditions = [], $limit = null, $fetchOnlyOne = false)
    {
        $sql = "SELECT $columns FROM $table";

        if (!empty($conditions)) {
            $sql .= " WHERE ";
            $sqlConditions = [];
            foreach ($conditions as $key => $value) {
                if (is_array($value) && count($value) === 2) {
                    $operator = $value[0];
                    $conditionValue = $value[1];
                } else {
                    $operator = '=';
                    $conditionValue = $value;
                }

                $sqlConditions[] = "$key $operator :$key";
            }
            $sql .= implode(" AND ", $sqlConditions);
        }

        if (!is_null($limit)) {
            $sql .= " LIMIT $limit";
        }

        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute($conditions);

            if ($fetchOnlyOne) {
                return $statement->fetch(PDO::FETCH_ASSOC);
            }

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Select failed: " . $e->getMessage());
        }
    }

    public function update($table, $data, $conditions)
    {
        $setClause = [];
        foreach ($data as $key => $value) {
            $setClause[] = "$key = :$key";
        }

        $sql = "UPDATE $table SET " . implode(", ", $setClause);
        if (!empty($conditions)) {
            $sql .= " WHERE ";
            $sqlConditions = [];
            foreach ($conditions as $key => $value) {
                $sqlConditions[] = "$key = :$key";
            }
            $sql .= implode(" AND ", $sqlConditions);
        }

        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute(array_merge($data, $conditions));
        } catch (PDOException $e) {
            die("Update failed: " . $e->getMessage());
        }
    }

    public function delete($table, $conditions)
    {
        $sql = "DELETE FROM $table";
        if (!empty($conditions)) {
            $sql .= " WHERE ";
            $sqlConditions = [];
            foreach ($conditions as $key => $value) {
                $sqlConditions[] = "$key = :$key";
            }
            $sql .= implode(" AND ", $sqlConditions);
        }

        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute($conditions);
        } catch (PDOException $e) {
            die("Delete failed: " . $e->getMessage());
        }
    }
}

// // Contoh penggunaan kelas DatabaseCrud
// $crud = new DatabaseCrud();

// // Contoh CREATE
// $newUserData = [
//     'username' => 'new_user',
//     'email' => 'new_user@example.com',
//     'status' => 'active'
// ];
// $newUserId = $crud->create('users', $newUserData);
// echo "New user created with ID: $newUserId\n";

// // Contoh SELECT dengan WHERE dan LIMIT
// $conditions = [
//     'status' => 'active',
//     'role' => 'admin'
// ];
// $limitedResults = $crud->select('users', 'id, username, email', $conditions, 5);
// print_r($limitedResults);

// // Contoh SELECT satu data dengan WHERE
// $singleUser = $crud->select('users', 'id, username, email', ['id' => 1], null, true);
// print_r($singleUser);

// // Contoh UPDATE
// $updateData = ['status' => 'inactive'];
// $updateConditions = ['id' => 2];
// $crud->update('users', $updateData, $updateConditions);

// // Contoh DELETE
// $deleteConditions = ['id' => 3];
// $crud->delete('users', $deleteConditions);
