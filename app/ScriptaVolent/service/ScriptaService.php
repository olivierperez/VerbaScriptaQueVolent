<?php
namespace ScriptaVolent\service;

use ScriptaVolent\ServiceFactory;

class ScriptaService {

    private $scriptaRepository;

    function __construct() {
        $this->scriptaRepository = ServiceFactory::ScriptaRepository();
    }

    public function createScriptum($scriptum) {
        $scriptum->ref = $this->generateRef();
        return $this->scriptaRepository->insert($scriptum);
    }

    private function generateRef() {
        $alphabet = "azertyuiopqsdfghjklmwxcvbn1234567890";
        $ref = "";
        for ($i = 0; $i < REF_SIZE; $i++) {
            $ref .= $alphabet[mt_rand(0, strlen($alphabet) - 1)];
        }

        return $ref;
    }

    public function findScripta($id, $ref) {
        $scripta = $this->scriptaRepository->get($id);

        if ($scripta->ref === $ref) {
            return $scripta;
        } else {
            return null;
        }
    }

}
