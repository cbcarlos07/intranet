<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SetorIterator {
    protected $setor;
    protected $currentSetor = 0;

    public function __construct(Setor $setor_in) {
      $this->setor = $setor_in;
    }
    public function getCurrentSetor() {
      if (($this->currentSetor > 0) && 
          ($this->setor->getSetorCount() >= $this->currentSetor)) {
        return $this->setor->getSetor($this->currentSetor);
      }
    }
    public function getNextSetor() {
      if ($this->hasNextSetor()) {
        return $this->setor->getSetor(++$this->currentSetor);
      } else {
        return NULL;
      }
    }
    public function hasNextSetor() {
      if ($this->setor->getSetorCount() > $this->currentSetor) {
        return TRUE;
      } else {
        return FALSE;
      }
    }
}