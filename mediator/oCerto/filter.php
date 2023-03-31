<?php

interface Padaria #quais metodos a classe deve implementar
{
    public function check();
}


class Ingredientes implements Padaria # tem que ter os metodos de padaria
{
     public function check()
     {
         echo "Checando ingredientes da padaria... OK\n";
     }
}


class FerramentasDeCozinha implements Padaria
{
     public function check()
     {
         echo "Checando ferramentas de cozinha.. OK\n";
     }
}

// === A Mediador ===

class CoordenacaoPadaria
{
    protected $padaria; #so pode ser usado na classe que foi definida

    public function adicionarPadaria(Padaria $padaria)
    {
        $this->padaria[] = $padaria;
    }

    public function check()
    {
        foreach ($this->padaria as $padaria) {
            $padaria->check();
        }
    }
}

$padarias = new CoordenacaoPadaria();
$padarias->adicionarPadaria( new Ingredientes() );
$padarias->adicionarPadaria( new FerramentasDeCozinha() );
$padarias->check();
?>