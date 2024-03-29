<?php

class Usuario {
    private $idusuario; 
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this->idusuario;
    }

    public function setIdusuario($idusuario){
        $this->idusuario = $idusuario;  
    }

    public function getDeslogin(){
        return $this->deslogin;
    }

    public function setDeslogin($deslogin){
        $this->deslogin = $deslogin;  
    }

    public function getDessenha(){
        return $this->dessenha;
    }

    public function setDessenha($dessenha){
        $this->dessenha = $dessenha;  
    }

    public function getDtcadastro(){
        return $this->dtcadastro;
    }

    public function setDtcadastro($dtcadastro){
        $this->dtcadastro = $dtcadastro;  
    }

    public function loadById($id){
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuario WHERE idusuario = :ID", array(":ID" => $id));
        
        if (count($result) > 0 ) {
            $row = $result[0];
            
            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));
    
        }
    }

    public function __toString()
    {
        return json_encode(array(
            "Idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")          
        ));
    }

    public static function getList(){
        $sql = new sql();
        
        return $sql->select("SELECT * FROM tb_usuario");
        
        
    }

    public static function search($login){

        $sql = new sql();
        return $sql->select("SELECT * FROM tb_usuario  where deslogin like  :SEARCH ", array(
            ":SEARCH"=>"%".$login."%" 
        ));


    }

    //Depois eu faço 
    // public function insert(){

    //     $sql = new sql();
    //     return $sql->select(""

    // }

    public function update($login, $password, $id){

        $this->setDeslogin($login);
        $this->setDessenha($password);

        $sql = new sql();
        $sql->query("UPDATE tb_usuario SET deslogin = :USUARIO, dessenha = :SENHA WHERE idusuario = :ID", array(
            ":USUARIO"=>$this->getDeslogin(),
            ":SENHA"=>$this->getDessenha(),
            ":ID"=>$this->getIdusuario()
        )); 

    }

}


?>