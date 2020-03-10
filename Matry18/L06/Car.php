class Car implements iCar{
    private $lenght;
    private $brand;

    public function setLenght($lenght){
        $this->lenght = $lenght;
    }
    
    public function setBrand($brand){
        $this->brand = $brand;
    }
}