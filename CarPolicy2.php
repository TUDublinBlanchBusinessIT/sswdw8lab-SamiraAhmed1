<?php

class CarPolicy {
    private $policyNumber;
    private $policyHolder;
    private $premium;
    private $dateOfLastClaim;

    public function __construct($policyNumber, $policyHolder, $premium) {
        $this->policyNumber = $policyNumber;
        $this->policyHolder = $policyHolder;
        $this->premium = $premium;
        $this->dateOfLastClaim = null; 
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
            return 0; 
        }
        $currentDate = new DateTime();
        $lastDate = new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastDate);
        return $interval->format("%y");
    }

    public function getDiscount() {
        $yearsNoClaims = $this->getTotalYearsNoClaims();
        if ($yearsNoClaims >= 3 && $yearsNoClaims <= 5) {
            return 0.10; 
        } elseif ($yearsNoClaims > 5) {
            return 0.15; 
        }
        return 0.00; 
    }

    public function getDiscountedPremium() {
        $discount = $this->getDiscount();
        return $this->premium * (1 - $discount); 
    }

    public function __toString() {
        return "PN: " . $this->policyNumber;
    }
}

