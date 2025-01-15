<?php
class Periferico extends Producto{
    private string $tipo;
    private string $marca;

    public function __construct($tipo,$marca,$id, $nombre, $descripcion, $precio, $stock)
    {
        parent::__construct($id, $nombre, $descripcion, $precio, $stock);
        $this->tipo = $tipo;
        $this->marca = $marca;
    }

    /**
     * Metodo toString() con herencia
     */
    public function __toString()
    {
        return parent::__toString() . ", Tipo: $this->tipo , Marca: $this->marca";
    }

    /**
     * Get de la variable tipo
     */  
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set de la variable tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
    

    /**
     * Get de la variable marca
     */ 
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set de la variable marca
     *
     * @return  self
     */ 
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }
}
?>