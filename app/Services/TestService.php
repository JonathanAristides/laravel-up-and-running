<?php

namespace App\Services;

class TestService
{
//    #23
    public function monthlyUsers(): int
    {
        // Simulated logic (e.g., query DB, use cache)
        return 174;
    }

    public function activeRate(): float
    {
        return 0.82;
    }
}
