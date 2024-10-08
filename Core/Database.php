<?php

namespace App\Core;

use PDO;

class Database
{
    public $pdo;
    public $statement;
    public $user_id = 1;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $id = null)
    {
        $this->statement = $this->pdo->prepare($sql);
        if ($id !== null) {
            $this->statement->bindValue(':id', $id);
        };
        $this->statement->execute();

        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function register($sql, $validatedData)
    {
        if (empty($validatedData)) {
            return;
        }
        $this->statement = $this->pdo->prepare($sql);
        $this->statement->bindValue(':name', $validatedData['name']);
        $this->statement->bindValue(':email', $validatedData['email']);
        $this->statement->bindValue(':created_at', date('d M Y H:i:s'));
        $this->statement->bindValue(':password', $validatedData['password']);

        $this->statement->execute();

        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUser($sql, $email = '')
    {
        $this->statement = $this->pdo->prepare($sql);

        if ($email !== '') {
            $this->statement->bindValue(':email', $email);
        }


        if ($this->statement->execute()) {
            return $this->statement->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function find($table, $id)
    {
        $this->statement = $this->pdo->prepare("select * from $table where id = :id");
        $this->statement->bindValue(':id', $id);

        $this->statement->execute();

        return $this->statement;
    }

    public function findOrFail($table, $id)
    {
        $data = $this->find($table, $id)->fetch();

        hasData($data);
        isAuth(isset($data['user_id']) && $data['user_id'] === $this->user_id);
        return $data;
    }

    public function fetch()
    {
        return $this->statement->fetch();
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAll($table)
    {
        $this->statement = $this->pdo->prepare("select * from $table");
        $this->statement->execute();

        $posts = $this->statement->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }

    public function orderBy($table, $by, $direction)
    {
        $this->statement = $this->pdo->prepare("select * from $table order by $by $direction");
        $this->statement->execute();

        $posts = $this->statement->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }

    public function update($table, $id, $key, $value)
    {
        $this->statement = $this->pdo->prepare("update $table set $key = :value where id = :id");
        $this->statement->bindValue(':value', $value);
        $this->statement->bindValue(':id', $id);
        if ($this->statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateTitle($title, $id)
    {
        $this->statement = $this->pdo->prepare("update posts set title = :title where id = :id");
        $this->statement->bindValue(':id', $id);
        $this->statement->bindValue(':title', $title);
        if ($this->statement->execute()) {
            echo 'everything looks good';
        } else {
            echo 'something went wrong';
        }
    }

    public function delete($table, $id)
    {
        $this->statement = $this->pdo->prepare("delete from $table where id = :id");
        $this->statement->bindValue(':id', $id);
        if ($this->statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function selectUsers($sql)
    {
        $id = $_GET['id'];
        $this->statement = $this->pdo->prepare($sql);

        $this->statement->bindValue(':id', $id);
        $this->statement->execute();

        $users = $this->statement->fetchAll(PDO::FETCH_ASSOC);


        return $users;
    }

    public function create($table, $data)
    {
        $this->statement = $this->pdo->prepare("INSERT INTO $table (body, user_id) VALUES (:body, :user_id)");
        $this->statement->bindValue(':body', $data['body']);
        $this->statement->bindValue(':user_id', $data['user_id']);

        if ($this->statement->execute()) {
            http_response_code(201);
        } else {
            http_response_code(500);
        }
    }
}
