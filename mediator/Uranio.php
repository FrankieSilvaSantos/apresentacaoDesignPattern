<?php

class Uranio {
    private $massa;

    function __construct($novoMassa) { #construtor para inserir propriedades na classe
        $this->massa = $novoMassa; #associado ao valor q ta na nossa classe
    }

    #como é privador precisa disponibiliza-lo para quem ta fora ver ele, usando um getter

    public function getMassa() {
        return $this->massa;
    }
}

?>