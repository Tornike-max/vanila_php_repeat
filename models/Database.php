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

    public function query($sql)
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }

    public function find($id)
    {
        $statement = $this->pdo->prepare("select * from posts where id = $id");
        $statement->execute();

        $post = $statement->fetch(PDO::FETCH_OBJ);

        return $post;
    }

    public function findAll()
    {
        $statement = $this->pdo->prepare("select * from posts");
        $statement->execute();

        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }

    public function orderBy($by, $direction)
    {
        $statement = $this->pdo->prepare("select * from posts order by $by $direction");
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
