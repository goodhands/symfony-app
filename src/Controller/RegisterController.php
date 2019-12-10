<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class RegisterController
{
    public function show()
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}
