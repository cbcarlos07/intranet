<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RamalListIterator {
    protected $ramalList;
    protected $currentRamal = 0;

    public function __construct(RamalList $ramalList_in) {
      $this->ramalList = $ramalList_in;
    }
    public function getCurrentRamal() {
      if (($this->currentRamal > 0) && 
          ($this->ramalList->getRamalCount() >= $this->currentRamal)) {
        return $this->ramalList->getRamal($this->currentRamal);
      }
    }
    public function getNextRamal() {
      if ($this->hasNextRamal()) {
        return $this->ramalList->getRamal(++$this->currentRamal);
      } else {
        return NULL;
      }
    }
    public function hasNextRamal() {
      if ($this->ramalList->getRamalCount() > $this->currentRamal) {
        return TRUE;
      } else {
        return FALSE;
      }
    }
}