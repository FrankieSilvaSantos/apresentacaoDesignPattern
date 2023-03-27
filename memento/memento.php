<?php

// Classe que representa o estado do objeto
class Memento {
  private $state;

  public function __construct($state) { #permite declarar metodos para a classe
    $this->state = $state;
  }

  public function getState() {
    return $this->state;
  }
}

// Classe que contém o estado do objeto e implementa o padrão Memento
class Originator {
  private $state;

  public function setState($state) {
    $this->state = $state;
  }

  public function getState() {
    return $this->state;
  }

  public function saveStateToMemento() {
    return new Memento($this->state);
  }

  public function getStateFromMemento($memento) {
    $this->state = $memento->getState();
  }
}

// Classe que mantém uma lista de estados do objeto
class Caretaker {
  private $mementoList = array();

  public function add($memento) {
    array_push($this->mementoList, $memento);
  }

  public function get($index) {
    return $this->mementoList[$index];
  }
}

// Exemplo de uso
$originator = new Originator();
$caretaker = new Caretaker();

$originator->setState("Estado 1");
$originator->setState("Estado 2");
$caretaker->add($originator->saveStateToMemento());
$originator->setState("Estado 3");
$caretaker->add($originator->saveStateToMemento());
$originator->setState("Estado 4");

echo "Estado atual: " . $originator->getState() . "\n";
$originator->getStateFromMemento($caretaker->get(0));
echo "Primeiro estado salvo: " . $originator->getState() . "\n";
$originator->getStateFromMemento($caretaker->get(1));
echo "Segundo estado salvo: " . $originator->getState() . "\n";

?>