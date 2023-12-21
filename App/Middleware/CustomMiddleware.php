<?php

namespace App\Middleware;

class CustomMiddleware {
    public function handle($next) {
        echo "Executing Example Middleware<br>";
        // Lakukan logika middleware di sini
        return $next();
    }
}
