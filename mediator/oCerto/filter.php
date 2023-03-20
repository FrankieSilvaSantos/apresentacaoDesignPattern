<?php

interface Filtro #quais metodos a classe deve implementar
{
    public function check();
}


class OleoFiltro implements Filtro # tem que ter os metodos de filter
{
     public function check()
     {
         echo "Checando o filtro do oleo... OK\n";
     }
}


class ArFiltro implements Filtro
{
     public function check()
     {
         echo "Checando o filtro de ar... OK\n";
     }
}

// === A Mediador ===

class Carro
{
    protected $filtros; #so pode ser usado na classe que foi definida

    public function adicionarFiltro(Filtro $filtro)
    {
        $this->filtros[] = $filtro;
    }

    public function check()
    {
        foreach ($this->filtros as $filtro) {
            $filtro->check();
        }
    }
}

$carro = new Carro();
$carro->adicionarFiltro( new OleoFiltro() );
$carro->adicionarFiltro( new ArFiltro() );
$carro->check();
?>