<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class RamalList {
    private $_ramal = array();
    private $_ramalCount = 0;
    public function __construct() {
    }
    public function getRamalCount() {
      return $this->_ramalCount;
    }
    private function setRamalCount($newCount) {
      $this->_ramalCount = $newCount;
    }
    public function getRamal($_ramalNumberToGet) {
      if ( (is_numeric($_ramalNumberToGet)) && 
           ($_ramalNumberToGet <= $this->getRamalCount())) {
           return $this->_ramal[$_ramalNumberToGet];
         } else {
           return NULL;
         }
    }
    public function addRamal(Ramal $_ramal_in) {
      $this->setRamalCount($this->getRamalCount() + 1);
      $this->_ramal[$this->getRamalCount()] = $_ramal_in;
      return $this->getRamalCount();
    }
    public function removeRamal(Ramal $_ramal_in) {
      $counter = 0;
      while (++$counter <= $this->getRamalCount()) {
        if ($_ramal_in->getAuthorAndTitle() == 
          $this->_ramal[$counter]->getAuthorAndTitle())
          {
            for ($x = $counter; $x < $this->getRamalCount(); $x++) {
              $this->_ramal[$x] = $this->_ramal[$x + 1];
          }
          $this->setRamalCount($this->getRamalCount() - 1);
        }
      }
      return $this->getRamalCount();
    }
}
