<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ramais{
    private $cdRamal;
    private $nrRamal;
    private $dsDescricao;
    private $setor;
    private $snvisualiza;
    public function getCdRamal() {
        return $this->cdRamal;
    }

    public function getNrRamal() {
        return $this->nrRamal;
    }

    public function getDsDescricao() {
        return $this->dsDescricao;
    }

    public function getSetor() {
        return $this->setor;
    }

    public function getSnvisualiza() {
        return $this->snvisualiza;
    }

    public function setCdRamal($cdRamal) {
        $this->cdRamal = $cdRamal;
        return $this;
    }

    public function setNrRamal($nrRamal) {
        $this->nrRamal = $nrRamal;
        return $this;
    }

    public function setDsDescricao($dsDescricao) {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function setSetor(Setor $setor) {
        $this->setor = $setor;
        return $this;
    }

    public function setSnvisualiza($snvisualiza) {
        $this->snvisualiza = $snvisualiza;
        return $this;
    }


    
    
    
}