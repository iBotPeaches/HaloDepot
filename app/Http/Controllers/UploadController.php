<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Factories\PatchFactory;
use App\Http\Requests\UploadPatchRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UploadController extends Controller
{
    public function show(Request $request): View
    {
        return view('pages/upload');
    }

    public function store(UploadPatchRequest $request): RedirectResponse
    {
        return DB::transaction(function() use ($request) {
            $patch = PatchFactory::identifyAddPatch($request->file('patch'));

            return redirect()->route('patch.show', [$patch]);
        });
    }
}
