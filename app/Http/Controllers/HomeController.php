<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Patch;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $recentPatches = Patch::query()
            ->latest()
            ->limit(5)
            ->get();

        return view('pages/home', [
            'recentPatches' => $recentPatches
        ]);
    }
}
