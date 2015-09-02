<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SetorList {
    private $_setor = array();
    private $_setorCount = 0;
    public function __construct() {
    }
    public function getSetorCount() {
      return $this->_setorCount;
    }
    private function setSetorCount($newCount) {
      $this->_setorCount = $newCount;
    }
    public function getSetor($_setorNumberToGet) {
      if ( (is_numeric($_setorNumberToGet)) && 
           ($_setorNumberToGet <= $this->getSetorCount())) {
           return $this->_setor[$_setorNumberToGet];
         } else {
           return NULL;
         }
    }
    public function addSetor(Setor $_setor_in) {
      $this->setSetorCount($this->getSetorCount() + 1);
      $this->_setor[$this->getSetorCount()] = $_setor_in;
      return $this->getSetorCount();
    }
    public function removeSetor(Setor $_setor_in) {
      $counter = 0;
      while (++$counter <= $this->getSetorCount()) {
        if ($_setor_in->getAuthorAndTitle() == 
          $this->_setor[$counter]->getAuthorAndTitle())
          {
            for ($x = $counter; $x < $this->getSetorCount(); $x++) {
              $this->_setor[$x] = $this->_setor[$x + 1];
          }
          $this->setSetorCount($this->getSetorCount() - 1);
        }
      }
      return $this->getSetorCount();
    }
}
