<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SetorList {
    private $setor = array();
    private $setorCount = 0;
    public function __construct() {
    }
    public function getSetorCount() {
      return $this->setorCount;
    }
    private function setSetorCount($newCount) {
      $this->setorCount = $newCount;
    }
    public function getSetor($setorNumberToGet) {
      if ( (is_numeric($setorNumberToGet)) && 
           ($setorNumberToGet <= $this->getSetorCount())) {
           return $this->setor[$setorNumberToGet];
         } else {
           return NULL;
         }
    }
    public function addSetor(SetorPaciente $setor_in) {
      $this->setSetorCount($this->getSetorCount() + 1);
      $this->setor[$this->getSetorCount()] = $setor_in;
      return $this->getSetorCount();
    }
    public function removeSetor(SetorPaciente $setor_in) {
      $counter = 0;
      while (++$counter <= $this->getSetorCount()) {
        if ($setor_in->getAuthorAndTitle() == 
          $this->setor[$counter]->getAuthorAndTitle())
          {
            for ($x = $counter; $x < $this->getSetorCount(); $x++) {
              $this->setor[$x] = $this->setor[$x + 1];
          }
          $this->setSetorCount($this->getSetorCount() - 1);
        }
      }
      return $this->getSetorCount();
    }
}
