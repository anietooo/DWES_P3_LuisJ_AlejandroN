<?php
class Pedido{
    private string $id;
    private string $usuarioId;
    private DateTime $fecha;
    private array $productos;

    public function __construct($id,$usuarioId,$fecha,$productos)
    {
        $this->id = $id;
        $this->usuarioId = $usuarioId;
        $this->fecha = $fecha;
        $this->productos = $productos;
    }

    public function __toString()
    {
        return "Id del pedido: $this->id , UsuarioId: $this->usuarioId , Fecha: $this->fecha , Productos: $this->productos";
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of usuarioId
     */ 
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * Set the value of usuarioId
     *
     * @return  self
     */ 
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }
}
?>