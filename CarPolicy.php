<?php

class CarPolicy {
    private $policyNumber;
    private $policyHolder;
    private $premium;
    private $dateOfLastClaim;

    public function __construct($policyNumber, $policyHolder, $premium) 
    {
        $this->policyNumber = $policyNumber;
        $this->policyHolder = $policyHolder;
        $this->premium = $premium;
        $this->dateOfLastClaim = null; // Initialize as null
    }

    public function getPolicyNumber() {
        return $this->policyNumber;
    }

    public function getPolicyHolder() {
        return $this->policyHolder;
    }

    public function getPremium() {
        return $this->premium;
    }

    public function setDateOfLastClaim($dateOfLastClaim) {
        $this->dateOfLastClaim = $dateOfLastClaim;
    }

    public function getTotalYearsNoClaims() {
        if (!$this->dateOfLastClaim) {
            return 0; // If there is no claim date set, return 0
        }
        $currentDate = new DateTime();
        $lastDate = new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastDate);
        return $interval->format("%y");
    }

    public function __toString() {
        return "PN: " . $this->policyNumber;
    }
}

?>