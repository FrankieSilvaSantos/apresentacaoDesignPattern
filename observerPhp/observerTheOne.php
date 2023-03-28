<?php

// Subject - objeto que mantém uma lista de seus observadores e notifica seus observadores sobre mudanças em seu estado
class Loja {
  private $inventario = array();
  private $observers = array();

  public function addItem($item, $quantidade) {
    if (array_key_exists($item, $this->inventario)) { #checa se a chave existe do array
      $this->inventario[$item] += $quantidade;
    } else {
      $this->inventario[$item] = $quantidade;
    }
    $this->notifyObservers();
  }

  public function anexarObserver($observer) {
    array_push($this->observers, $observer);
  }

  public function destacarObserver($observer) {
    $index = array_search($observer, $this->observers);
    if ($index !== false) {
      array_splice($this->observers, $index, 1);
    }
  }

  public function notifyObservers() {
    foreach ($this->observers as $observer) {
      $observer->update($this);
    }
  }

  public function getInventario() {
    return $this->inventario;
  }
}

// Observer - interface que define um método de atualização que é chamado quando o estado do Subject é alterado
interface Observer {
  public function update($subject);
}

// Concrete Observer - implementação específica de Observer que mantém um estado e é atualizado quando o estado do Subject é alterado
class Cliente implements Observer {
  private $name;
  private $listaCompras = array();

  public function __construct($name, $listaCompras) {
    $this->name = $name;
    $this->listaCompras = $listaCompras;
  }

  public function update($subject) {
    $inventario = $subject->getInventario();
    foreach ($this->listaCompras as $item) {
      if (array_key_exists($item, $inventario) && $inventario[$item] > 0) {
        echo "{$this->name}: A loja tem $inventario[$item] $item(s) disponíveis<br>";
      } else {
        echo "{$this->name}: A loja não tem $item em estoque<br>";
      }
    }
  }
}

// Uso
$loja = new Loja();
$cliente1 = new Cliente("João", array("Camiseta", "Calça"));
$cliente2 = new Cliente("Maria", array("Camiseta", "Sapato"));

// Adicionando os observadores à loja
$loja->anexarObserver($cliente1);
$loja->anexarObserver($cliente2);

// Adicionando itens ao inventário
$loja->addItem("Camiseta", 10);
$loja->addItem("Calça", 5);
$loja->addItem("Sapato", 0);

// Adicionando mais itens ao inventário
$loja->addItem("Camiseta", 5);
$loja->addItem("Calça", 3);

// Removendo um observador da loja
$loja->destacarObserver($customer2);

// Adicionando mais itens ao inventário
$loja->addItem("Sapato", 2);
