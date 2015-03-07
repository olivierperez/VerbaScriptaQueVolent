<?php
namespace ScriptaVolent\repository;

class ScriptaRepository {

    private $pdo;

    function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insert($scriptum) {
        $stmt = $this->pdo->prepare('INSERT INTO scripta (ref, label, content) VALUES (:ref, :label, :content)');
        $stmt->execute([
                           'ref' => $scriptum->ref,
                           'label' => $scriptum->label,
                           'content' => $scriptum->content,
                       ]);
        $scriptum->id = $this->pdo->lastInsertId();

        return $scriptum;
    }

    public function get($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM scripta WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject('ScriptaVolent\\Model\\Scriptum');
    }

}
