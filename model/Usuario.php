<?php
class Usuario{
    private string $email;
    private string $nombre;
    private string $password;

    public function __construct($email,$nombre,$password)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->password = $password;

    }

    public function __toString()
    {
        return "Nombre: $this->nombre , Email: $this->email , Contraseña: $this->password";
    }

    /**
     * Get de la variable email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set de la variable email
     *
     * @return  self
     */  
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get de la variable nombre
     */  
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set de la variable nombre
     *
     * @return  self
     */  
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get de la variable password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set de la variable password
     *
     * @return  self
     */  
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}

?>