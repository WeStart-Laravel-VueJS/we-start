<?php 

class Person {
    protected $name;
    protected $age;

    public static $country = 'Palestine';

    function __construct($name , $age)
    {
        // echo 'Construct Run';
        $this->name = $name;
        $this->age = $age;
    }

    public function getName() {
        echo $this->name;
    }

    public function getAge() {
        echo $this->age;
    }

    function getLastName() {
        $name = explode(' ', $this->name);
        return end($name);
    }

    public static function get($uri, $action) {
        return 'New get Route';
    }

    function __destruct()
    {
        // echo "Destructor called";
    }
}
$p1 = new Person('Ahmed Mohammed Ali', 30);
// echo $p1->country;
// var_dump($p1->getLastName());


class Doctor extends Person {
    protected $special;

    function __construct($name, $age, $special)
    {
        parent::__construct($name, $age);
        $this->special = $special;
    }

    function getFullData() {
        return $this->name . " " . $this->age . " " . $this->special;
    }
}

$d1 = new Doctor('Ezz', 40, 'Heart');

// var_dump($p1 instanceof Doctor);

echo Person::get('/about', [SiteController::class, 'index']);
