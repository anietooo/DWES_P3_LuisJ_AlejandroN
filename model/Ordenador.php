<?php
class Ordenador extends Producto{
    private int $ram;

    public function __construct($ram,$id, $nombre, $descripcion, $precio, $stock)
    {
        parent::__construct($id, $nombre, $descripcion, $precio, $stock);
        $this->ram = $ram;
    }

    /**
     * Metodo toString() con herencia
     */
    public function __toString()
    {
        return parent::__toString() . ", Ram: $this->ram";
    }

    /**
     * Get de la variable ram
     */ 
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set de la variable ram
     *
     * @return  self
     */ 
    public function setRam($ram)
    {
        $this->ram = $ram;

        return $this;
    }
}
?>