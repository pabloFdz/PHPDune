<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SandboxController extends Controller
{
    public function execute(Request $request)
    {
        $code = $request->input('code');

        // WARNING: Using eval() can be dangerous. Ensure proper sandboxing in production.
        ob_start();

        try {
            eval($code);
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }

        return ob_get_clean();
    }
}
