<?php
namespace ScriptaVolent\service;

use ScriptaVolent\ServiceFactory;

class ScriptumService {

    private $scriptumRepository;

    function __construct() {
        $this->scriptumRepository = ServiceFactory::ScriptumRepository();
    }

    public function createScriptum($scriptum) {
        $scriptum->ref = $this->generateRef();
        return $this->scriptumRepository->insert($scriptum);
    }

    private function generateRef() {
        $alphabet = 'azertyuiopqsdfghjklmwxcvbn1234567890';
        $ref = '';
        for ($i = 0; $i < REF_SIZE; $i++) {
            $ref .= $alphabet[mt_rand(0, strlen($alphabet) - 1)];
        }

        return $ref;
    }

    public function read($id, $ref) {
        $scriptum = $this->scriptumRepository->get($id);
        if ($scriptum && $scriptum->ref === $ref) {
            if ($scriptum->destruction < date('Y-m-d 00:00:00')) { // Can't read anymore
                $this->scriptumRepository->delete($scriptum);
                return null;
            } elseif($scriptum->publication && $scriptum->publication > date('Y-m-d 00:00:00')) { // Can't read for now
                return null;
            } elseif ($scriptum->onelife) { // Can read one time
                $this->scriptumRepository->delete($scriptum);
                return $scriptum;
            } else { // Can read
                return $scriptum;
            }
        } else { // Scriptum not found, or ref mismatch
            return null;
        }
    }

}
