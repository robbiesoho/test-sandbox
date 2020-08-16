<!-- This isn't used in the app. It is just used for testing -->
<?php
  class Task {
    public $name;

    function __construct($name) {
      $this->name = $name;
    }

    function get_name() {
    return $this->name;
  }

  }

?>