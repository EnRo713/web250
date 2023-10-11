<?php

class Bird {
  public $common_name;
  public $habitat;
  public $food;
  public $nest_placement;
  public $behavior;
  public $conservation_id;
  public $backyard_tips;

/*
Use the wnc-birds.csv file to create the properties
Make all of the properties public.
*/
  public const CATEGORIES_HABITAT = ['Open woodlands', 'Forests', 'Scrub'];

  public const CATEGORIES_DIET = ['Insects', 'Nectar', 'Omnivore'];
 
/*
Create a protected constant array called CONSERVATION_OPTIONS using the following scale.
Use the CONDITION_OPTIONS from the bicycle.class.php file
1 = Low concern
2 = Moderate concern
3 = Extreme concern
4 = Extinct
*/
  protected const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct'
  ];

 /*
   - Create a public __construct that accepts a list of $args[]
   - Use the Null coalescing operator
   - Create a default value of 1 for conservation_id
 */
  public function __construct($args=[]) {
    $this->common_name = $args['common_name'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->nest_placement = $args['nest_placement'] ?? '';
    $this->behavior = $args['behavior'] ?? '';
    $this->conservation_id = $args['conservation_id'] ?? '';
    $this->backyard_tips = $args['backyard_tips'] ?? '';
  }

/*
  Create a public method called conservation(). This method should mimic the
    public function condition() from the bicycle.class.php file
*/
  public function conservation() {
    if($this->conservation_id > 0) {
      return self::CONSERVATION_OPTIONS[$this->conservation_id];
    } else {
      return "Unknown";
    }
  }

}

?>
