<?php

class Database
{
    public $pdo;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $id)
    {
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($table, $id, $user_id = null)
    {
        $statement = $this->pdo->prepare("select * from $table where id = :id");
        $statement->bindValue(':id', $id);

        $statement->execute();

        $data = $statement->fetch(PDO::FETCH_OBJ);

        if (!$data) {
            abort(404);
        }

        if ($user_id !== 1) {
            abort(403);
        }

        return $data;
    }

    public function findAll($table)
    {
        $statement = $this->pdo->prepare("select * from $table");
        $statement->execute();

        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }

    public function orderBy($table, $by, $direction)
    {
        $statement = $this->pdo->prepare("select * from $table order by $by $direction");
        $statement->execute();

        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }

    public function updateTitle($title, $id)
    {
        $statement = $this->pdo->prepare("update posts set title = :title where id = :id");
        $statement->bindValue(':id', $id);
        $statement->bindValue(':title', $title);
        if ($statement->execute()) {
            echo 'everything looks good';
        } else {
            echo 'something went wrong';
        }
    }

    public function delete($id)
    {
        $statement = $this->pdo->prepare('delete from posts where id = :id');
        $statement->bindValue(':id', $id);
        if ($statement->execute()) {
            echo 'post deleted successfully';
        } else {
            echo "can't delete post";
        }
    }

    public function selectUsers($sql)
    {
        $id = $_GET['id'];
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(':id', $id);
        $statement->execute();

        $users = $statement->fetchAll(PDO::FETCH_ASSOC);


        return $users;
    }
}
