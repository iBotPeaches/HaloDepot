<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Enums\Game;
use App\Enums\Map;
use App\Patch;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class HistoryController extends Controller
{
    public function index(Request $request, string $game, string $map = null): View
    {
        $gameEnum = Game::coerce($game);
        $mapEnum = Map::coerce($map);
        abort_if(empty($gameEnum), Response::HTTP_NOT_FOUND, 'Game not found.');

        $patches = Patch::ofMap($map)
            ->where('game', $gameEnum->value)
            ->latest()
            ->paginate(25);

        $mapNames = Map::getMaps($gameEnum);

        return view('pages/history', [
            'patches'  => $patches,
            'gameEnum' => $gameEnum,
            'mapEnum'  => $mapEnum,
            'maps'     => $mapNames,
        ]);
    }

    public function patches(Request $request, string $patchType): View
    {
        $patchEnum = \App\Enums\Patch::coerce(strtoupper($patchType));
        abort_if(empty($patchEnum), Response::HTTP_NOT_FOUND, 'Patch format not found.');

        $patches = Patch::query()
            ->where('patch', $patchEnum->value)
            ->latest()
            ->paginate(25);

        return view('pages/patches', [
            'patches'   => $patches,
            'patchEnum' => $patchEnum,
        ]);
    }
}
