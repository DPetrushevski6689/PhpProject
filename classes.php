<?php 
    class Hobby{
        private $Id, $Type, $Name, $Approved;

        public function __construct($Id, $Type, $Name, $Approved){
            $this->Id = $Id;
            $this->Type = $Type;
            $this->Name = $Name;
            $this->Approved = $Approved;
        }
    }
?>