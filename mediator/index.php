<?php
require "CalculadoraMeiaVida.php";
require "Uranio.php";

$resultado = new Uranio(235); #massa

$calculadora = new CalculadoraMeiaVida();

echo "O valor de decaimento do uranio depois de passar sua primeira
meia vida é: ", $calculadora->calculadoraMeiaVida($resultado);


?>