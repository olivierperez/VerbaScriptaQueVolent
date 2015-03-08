<?php
namespace ScriptaVolent;

use ScriptaVolent\repository\ScriptumRepository;

class ServiceFactory {

    private static $pdo;

    public static function init(\PDO $pdo) {
        self::$pdo = $pdo;
    }

    /**
     * @return ScriptumRepository
     */
    public static function ScriptumRepository() {
        return new ScriptumRepository(self::$pdo);
    }


}
