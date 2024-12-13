<?php
class Ordenador extends Producto{
    private int $ram;

    public function __construct($ram)
    {
        $this->ram = $ram;
    }

    public function __toString()
    {
        return parent::__toString() . ", Ram: $this->ram";
    }

    /**
     * Get the value of ram
     */ 
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set the value of ram
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