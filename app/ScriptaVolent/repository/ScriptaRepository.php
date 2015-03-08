<?php
namespace ScriptaVolent\repository;

use ScriptaVolent\Model\Scriptum;

class ScriptaRepository {

    private $pdo;

    function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insert($scriptum) {
        $stmt = $this->pdo->prepare('INSERT INTO scriptum (ref, title, content, destruction) VALUES (:ref, :title, :content, :destruction)');
        $stmt->execute([
                           'ref' => $scriptum->ref,
                           'title' => $scriptum->title,
                           'content' => $scriptum->content,
                           'destruction' => $scriptum->destruction,
                       ]);
        $scriptum->id = $this->pdo->lastInsertId();

        return $scriptum;
    }

    public function get($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM scriptum WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(Scriptum::class);
    }

}
