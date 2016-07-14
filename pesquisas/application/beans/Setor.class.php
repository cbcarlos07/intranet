<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Setor{
    private $cdSetor;
    private $nmSetor;
    public function getCdSetor() {
        return $this->cdSetor;
    }

    public function getNmSetor() {
        return $this->nmSetor;
    }

    public function setCdSetor($cdSetor) {
        $this->cdSetor = $cdSetor;
        return $this;
    }

    public function setNmSetor($nmSetor) {
        $this->nmSetor = $nmSetor;
        return $this;
    }


}