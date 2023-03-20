<?php
#require "Orcamento.php";

class calculadoraMeiaVida {
    public function calculadoraMeiaVida(Uranio $Uranio) { #recebe o Uranio
    return $Uranio->getMassa() / 2; # e devolve o valor da massa do uranio
    }
}

?>