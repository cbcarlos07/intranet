<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Setor{
    
    private $codigo;
    private $nome;
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }


}