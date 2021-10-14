<?php
/// tentando criar conexão via orientação a objetos 
class cadastroController{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Cadastro();
        $this->incluir();
    }
}
?>