<?php
class Pedido{
    private ?int $id;
    private string $usuarioId;
    private DateTime $fecha;
    private array $productos;

    public function __construct(?int $id,$usuarioId,$fecha,$productos)
    {
        $this->id = $id;
        $this->usuarioId = $usuarioId;
        $this->fecha = $fecha;
        $this->productos = $productos;
    }

    
    public function __toString() {
        $fechaFormateada = $this->fecha->format('Y-m-d H:i:s');
        return "Id del pedido: " . $this->getId() . " , UsuarioId: " . $this->getUsuarioId() . " , Fecha: " . $fechaFormateada . " , Productos: " . implode(", ", $this->productos);
    }


    /**
     * Get de la variable id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set de la variable id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get de la variable usuarioId
     */ 
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * Set de la variable usuarioId
     *
     * @return  self
     */ 
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * Get de la variable fecha
     */  
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set de la variable fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

     /**
     * Get de la variable productos
     */ 
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Set de la variable fecha
     *
     * @return  self
     */ 
    public function setProductos($productos)
    {
        $this->productos = $productos;

        return $this;
    }
}
?>