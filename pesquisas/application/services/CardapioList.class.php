<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CardapioList {
    private $cardapio = array();
    private $cardapioCount = 0;
    public function __construct() {
    }
    public function getCardapioCount() {
      return $this->cardapioCount;
    }
    private function setCardapioCount($newCount) {
      $this->cardapioCount = $newCount;
    }
    public function getCardapio($cardapioNumberToGet) {
      if ( (is_numeric($cardapioNumberToGet)) && 
           ($cardapioNumberToGet <= $this->getCardapioCount())) {
           return $this->cardapio[$cardapioNumberToGet];
         } else {
           return NULL;
         }
    }
    public function addCardapio(Cardapio $cardapio_in) {
      $this->setCardapioCount($this->getCardapioCount() + 1);
      $this->cardapio[$this->getCardapioCount()] = $cardapio_in;
      return $this->getCardapioCount();
    }
    public function removeCardapio(Cardapio $cardapio_in) {
      $counter = 0;
      while (++$counter <= $this->getCardapioCount()) {
        if ($cardapio_in->getAuthorAndTitle() == 
          $this->cardapio[$counter]->getAuthorAndTitle())
          {
            for ($x = $counter; $x < $this->getCardapioCount(); $x++) {
              $this->cardapio[$x] = $this->cardapio[$x + 1];
          }
          $this->setCardapioCount($this->getCardapioCount() - 1);
        }
      }
      return $this->getCardapioCount();
    }
}
