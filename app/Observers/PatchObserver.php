<?php
declare(strict_types = 1);

namespace App\Observers;

use App\Patch;
use Illuminate\Support\Str;

class PatchObserver
{
    public function creating(Patch $patch)
    {
        if ($patch->author !== 'Unknown') {
            $slug = Str::slug($patch->name . '-' . $patch->author);
        } else {
            $slug = Str::slug($patch->name);
        }

        while (Patch::query()->where('slug', $slug)->exists()) {
            $slug .= '-' . Str::random(6);
        }

        $patch->slug = $slug;
    }
}
