# Decorator

```php
interface CarService
{
    public function getCost();
}

class BasicInspection implements CarService
{
    public function getCost()
    {
        return 20;
    }
}

class OilChange implements CarService
{
    public $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return $this->carService->getCost() + 15;
    }
}

class TireRotation implements CarService
{
    public $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return $this->carService->getCost() + 10;
    }
}

$basic = new BasicInspection();
echo 'Basic(20) = ' . $basic->getCost() . "\n";

$basic_and_oil = new OilChange($basic);
echo 'Basic(20) + Oil Change(15) = ' . $basic_and_oil->getCost() . "\n";

$basic_and_tire_rotation = new TireRotation($basic);
echo 'Basic(20) + Tire Rotation(10) = ' . $basic_and_tire_rotation->getCost() . "\n";

$all_services = new TireRotation((new OilChange($basic)));
echo 'All Services = ' . $all_services->getCost() . "\n";
```
