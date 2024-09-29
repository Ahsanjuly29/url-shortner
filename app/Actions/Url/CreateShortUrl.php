<?php

namespace App\Actions\Url;

use App\Models\Url;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateShortUrl
{
    public function execute($longUrl)
    {
        $shortCode = Str::random(6); // Creating randonm String(6 char)
        $userId = (Auth::check() == false) ? 1 : Auth::user()->id; //1 is guest id

        // Stop shortening Duplicate Url 
        return Url::updateOrCreate(
            [
                'long_url' => $longUrl,
            ],
            [
                'long_url' => $longUrl,
                'short_code' => $shortCode,
                'user_id' => $userId,
            ]);
    }
}
