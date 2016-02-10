<?php
    class JobOpening
    {
        private $title = '';
        private $description = '';
        private $contact_info;

        function __construct($title, $description, $contact_info)
        {
            $this->title = $title;
            $this->description = $description;
            $this->contact_info = $contact_info;
        }
        function getTitle()
        {
            return $this->title;
        }
        function getDescription()
        {
            return $this->description;
        }
        function getContactInfo()
        {
            return $this->contact_info;
        }
        function save()
        {
            array_push($_SESSION['list_of_jobs'], $this);
        }
        static function getAll()
        {
           return $_SESSION['list_of_jobs'];
        }
    }
 ?>
