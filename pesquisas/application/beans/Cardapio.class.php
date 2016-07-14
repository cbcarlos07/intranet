<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Cardapio{
    private $cdCardapio;
    private $titulo;
    private $descricao;
    private $dtCardapio;
    
    public function getCdCardapio() {
        return $this->cdCardapio;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDtCardapio() {
        return $this->dtCardapio;
    }

    public function setCdCardapio($cdCardapio) {
        $this->cdCardapio = $cdCardapio;
        return $this;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    public function setDtCardapio($dtCardapio) {
        $this->dtCardapio = $dtCardapio;
        return $this;
    }

   
    
    
}
