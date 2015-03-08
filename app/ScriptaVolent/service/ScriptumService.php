<?php
namespace ScriptaVolent\service;

use ScriptaVolent\ServiceFactory;

class ScriptumService {

    private $scriptaRepository;

    function __construct() {
        $this->scriptaRepository = ServiceFactory::ScriptumRepository();
    }

    public function createScriptum($scriptum) {
        $scriptum->ref = $this->generateRef();
        return $this->scriptaRepository->insert($scriptum);
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
        $scriptum = $this->scriptaRepository->get($id);

        if ($scriptum != null && $scriptum->ref === $ref) {
            if ($scriptum->onelife) {
                $this->scriptaRepository->delete($scriptum);
            }
            return $scriptum;
        } else {
            return null;
        }
    }

}
