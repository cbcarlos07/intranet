<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class RamalList {
    private $ramal = array();
    private $ramalCount = 0;
    public function __construct() {
    }
    public function getRamalCount() {
      return $this->ramalCount;
    }
    private function setRamalCount($newCount) {
      $this->ramalCount = $newCount;
    }
    public function getRamal($ramalNumberToGet) {
      if ( (is_numeric($ramalNumberToGet)) && 
           ($ramalNumberToGet <= $this->getRamalCount())) {
           return $this->ramal[$ramalNumberToGet];
         } else {
           return NULL;
         }
    }
    public function addRamal(Ramais $ramal_in) {
      $this->setRamalCount($this->getRamalCount() + 1);
      $this->ramal[$this->getRamalCount()] = $ramal_in;
      return $this->getRamalCount();
    }
    public function removeRamal(Ramais $ramal_in) {
      $counter = 0;
      while (++$counter <= $this->getRamalCount()) {
        if ($ramal_in->getAuthorAndTitle() == 
          $this->ramal[$counter]->getAuthorAndTitle())
          {
            for ($x = $counter; $x < $this->getRamalCount(); $x++) {
              $this->ramal[$x] = $this->ramal[$x + 1];
          }
          $this->setRamalCount($this->getRamalCount() - 1);
        }
      }
      return $this->getRamalCount();
    }
}
