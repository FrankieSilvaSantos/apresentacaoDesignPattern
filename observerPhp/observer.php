<?php

// Define an interface for Observers to implement
interface Observer {
  public function update($data);
}

// Define an interface for Observable objects to implement
interface Observable {
  public function addObserver(Observer $observer);
  public function removeObserver(Observer $observer);
  public function notifyObservers();
}

// Define a concrete Observable class
class ConcreteObservable implements Observable { # implements declara q a classe deve ter os metodos descritos na interface
  private $observers = array();
  private $data;

  public function addObserver(Observer $observer) {
    $this->observers[] = $observer;
  }

  public function removeObserver(Observer $observer) {
    $index = array_search($observer, $this->observers);
    if ($index !== false) {
      array_splice($this->observers, $index, 1);
    }
  }

  public function notifyObservers() {
    foreach ($this->observers as $observer) { #deficne quais variaveis contem a key e o valor do
      $observer->update($this->data);
    }
  }

  public function setData($data) {
    $this->data = $data;
    $this->notifyObservers();
  }
}

// Define a concrete Observer class
class ConcreteObserver implements Observer {
  private $data;

  public function update($data) {
    $this->data = $data;
    echo "Data updated to: " . $this->data . "\n";
  }
}

// Usage example:
$observable = new ConcreteObservable();
$observer1 = new ConcreteObserver();
$observer2 = new ConcreteObserver();

$observable->addObserver($observer1);
$observable->addObserver($observer2);

$observable->setData("Hello, world!");

$observable->removeObserver($observer2);

$observable->setData("Goodbye, world!");

?>