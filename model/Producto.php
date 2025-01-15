<?php
abstract class Producto{
    private int $id;
    private string $nombre;
    private string $descripcion;
    private int $precio;
    private int $stock;

    public function __construct($id,$nombre,$descripcion,$precio,$stock)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function __toString()
    {
        return "Id: $this->id , Nombre: $this->nombre , Descripcion: $this->descripcion , Precio: $this->precio ,  Stock: " . ($this->stock);
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
     * Get de la variable descripción
     */  
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set de la variable descripción
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get de la variable precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set de la variable precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get de la variable stock
     */  
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set de la variable stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }
}
?>