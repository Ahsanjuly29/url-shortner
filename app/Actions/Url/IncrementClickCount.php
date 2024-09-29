<?php

namespace App\Actions\Url;

use App\Models\Url;

class IncrementClickCount
{
    public function execute($shortCode)
    {
        $url = Url::where('short_code', $shortCode)->firstOrFail();
        $url->increment('click_count');

        return $url;
    }
}
