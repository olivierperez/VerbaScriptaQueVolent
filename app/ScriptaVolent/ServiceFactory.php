<?php
namespace ScriptaVolent;

use ScriptaVolent\repository\ScriptaRepository;

class ServiceFactory {

    private static $pdo;

    public static function init(\PDO $pdo) {
        self::$pdo = $pdo;
    }

    /**
     * @return ScriptaRepository
     */
    public static function ScriptaRepository() {
        return new ScriptaRepository(self::$pdo);
    }


}
