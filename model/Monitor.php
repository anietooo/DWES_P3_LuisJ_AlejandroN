<?php
class Monitor extends Producto{
    private int $hz;

    public function __construct($hz,$id, $nombre, $descripcion, $precio, $stock)
    {
        parent::__construct($id, $nombre, $descripcion, $precio, $stock);
        $this->hz = $hz;
    }

    public function __toString()
    {
        return parent::__toString() . ", Hz: $this->hz";
    }

    
    /**
     * Get the value of hz
     */ 
    public function getHz()
    {
        return $this->hz;
    }

    /**
     * Set the value of hz
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