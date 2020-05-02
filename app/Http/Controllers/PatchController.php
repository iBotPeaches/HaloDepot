<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Patch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PatchController extends Controller
{
    public function show(Patch $patch, Request $request): View
    {
        return view('pages.patch', [
            'patch' => $patch
        ]);
    }

    public function download(Patch $patch, Request $request): StreamedResponse
    {
        Patch::query()->where('id', $patch->id)->increment('downloads');

        return Storage::disk('s3')->download($patch->file_path, $patch->patchFileName());
    }
}
