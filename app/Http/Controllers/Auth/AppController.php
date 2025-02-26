<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * @return Response
     */
    public function index()
    {

        $app_data = [
            'name' => config('app.name'),
            'domain' => config('app.domain'),
            'frontend' => [
                'discovery' => config('frontend.discovery')
            ]
        ];

        return response()->view('auth', [
            'app_data' => $app_data
        ]);
    }

    public function test(Request $request)
    {
        return response()->json(['message' => 'Hola desde auth']);
    }
}
