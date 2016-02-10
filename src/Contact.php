<?php

  Class Contact{

    private $name = '';
    private $phone = '';
    private $email = '';

    public function __construct($name, $phone, $email)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function getName()
    {
      return $this->name;
    }

    function getPhone()
    {
      return $this->phone;
    }

    function getEmail()
    {
      return $this->email;
    }

    // static function getAll()
    // {
    //   return
    // }
  }


 ?>
