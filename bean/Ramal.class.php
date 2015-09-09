<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ramal {
    private $codigo;
    private $nrRamal;
    private $descricao;
    private $setor;
    private $snVisutaliza;
    private $dsApelido;
    
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function getNrRamal() {
        return $this->nrRamal;
    }

    public function getDescricao() {
        return $this->descricao;
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

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    public function setSetor(Setor $setor) {
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