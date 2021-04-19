<?php
namespace ScriptaVolent\repository;

use ScriptaVolent\model\Scriptum;

class ScriptumRepository {

    private $pdo;

    function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * TODO
     *
     * @param $scriptum Scriptum
     * @return Scriptum
     */
    public function insert($scriptum) {
        $stmt = $this->pdo->prepare('
            INSERT INTO scriptum (ref, title, content, publication, destruction, onelife)
            VALUES (:ref, :title, :content, :publication, :destruction, :onelife)
        ');
        $stmt->execute([
                           'ref' => $scriptum->ref,
                           'title' => $scriptum->title,
                           'content' => $scriptum->content,
                           'publication' => $scriptum->publication,
                           'destruction' => $scriptum->destruction,
                           'onelife' => $scriptum->onelife,
                       ]);
        $scriptum->id = $this->pdo->lastInsertId();

        return $scriptum;
    }

    /**
     * TODO
     *
     * @param $id int
     * @return Scriptum
     */
    public function get($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM scriptum WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(Scriptum::class);
    }

    /**
     * TODO
     *
     * @param $scriptum Scriptum
     */
    public function delete($scriptum) {
        $stmt = $this->pdo->prepare('DELETE FROM scriptum WHERE id=:id');
        $stmt->execute(['id' => $scriptum->id]);
    }

}
