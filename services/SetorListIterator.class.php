<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SetorListIterator {
    protected $setorList;
    protected $currentSetor = 0;

    public function __construct(SetorList $setorList_in) {
      $this->setorList = $setorList_in;
    }
    public function getCurrentSetor() {
      if (($this->currentSetor > 0) && 
          ($this->setorList->getSetorCount() >= $this->currentSetor)) {
        return $this->setorList->getSetor($this->currentSetor);
      }
    }
    public function getNextSetor() {
      if ($this->hasNextSetor()) {
        return $this->setorList->getSetor(++$this->currentSetor);
      } else {
        return NULL;
      }
    }
    public function hasNextSetor() {
      if ($this->setorList->getSetorCount() > $this->currentSetor) {
        return TRUE;
      } else {
        return FALSE;
      }
    }
}