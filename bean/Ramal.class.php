<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ramal {
    private $codigo;
    private $nrRamal;
    private $responsavel;
    private $setor;
    private $snVisutaliza;
    private $dsApelido;
    
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function getNrRamal() {
        return $this->nrRamal;
    }

    public function getResponsavel() {
        return $this->responsavel;
    }

    public function getSetor() {
        return $this->setor;
    }

    public function getSnVisutaliza() {
        return $this->snVisutaliza;
    }

    public function getDsApelido() {
        return $this->dsApelido;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
        return $this;
    }

    public function setNrRamal($nrRamal) {
        $this->nrRamal = $nrRamal;
        return $this;
    }

    public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
        return $this;
    }

    public function setSetor($setor) {
        $this->setor = $setor;
        return $this;
    }

    public function setSnVisutaliza($snVisutaliza) {
        $this->snVisutaliza = $snVisutaliza;
        return $this;
    }

    public function setDsApelido($dsApelido) {
        $this->dsApelido = $dsApelido;
        return $this;
    }


    
    
}