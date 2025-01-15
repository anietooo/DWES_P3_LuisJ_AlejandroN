<?php
class Monitor extends Producto{
    private int $hz;

    public function __construct($hz,$id, $nombre, $descripcion, $precio, $stock)
    {
        parent::__construct($id, $nombre, $descripcion, $precio, $stock);
        $this->hz = $hz;
    }

    /**
     * Metodo toString() con herencia
     */
    public function __toString()
    {
        return parent::__toString() . ", Hz: $this->hz";
    }

    
    /**
     * Get de la variable hz
     */ 
    public function getHz()
    {
        return $this->hz;
    }

    /**
     * Set de la variable hz
     *
     * @return  self
     */ 
    public function setHz($hz)
    {
        $this->hz = $hz;

        return $this;
    }
}
?>