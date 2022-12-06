<?php

namespace App\Services;

class PaymentService {

    protected $balence;

    public function __construct($balence) {
        $this->balence = $balence;
    }

    public function getBalence() {
        return $this->balence;
    }

    public function incrementBalence() {
        return ++$this->balence;
    }

    public static function increment() {
        return app(PaymentService::class)->incrementBalence();
    }
}
