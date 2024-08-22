<?php
namespace Leazycms\Simpel\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AdminController extends Controller  implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),

        ];
    }
public function index(Request $request){
    return view('simpel::admin.dashboard');
}
}
