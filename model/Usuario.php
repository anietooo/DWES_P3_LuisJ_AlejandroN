<?php
class Usuario{
    private string $email;
    private string $nombre;
    private string $password;
    private int $admin1;

    public function __construct($email,$nombre,$password,$admin1 = 0)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->admin1 = $admin1;
    }

    public function __toString()
    {
        return "Nombre: $this->nombre, Email: $this->email, Contraseña: $this->password , Admin $this->admin1";
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

    

    

    /**
     * Get the value of admin1
     */ 
    public function getAdmin1()
    {
        return $this->admin1;
    }

    /**
     * Set the value of admin1
     *
     * @return  self
     */ 
    public function setAdmin1($admin1)
    {
        $this->admin1 = $admin1;

        return $this;
    }
}

?>