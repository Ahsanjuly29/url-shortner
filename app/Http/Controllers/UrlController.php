<?php

namespace App\Http\Controllers;

use App\Actions\Url\CreateShortUrl;
use App\Actions\Url\IncrementClickCount;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('url.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CreateShortUrl $createShortUrl)
    {
        $request->validate([
            'long_url' => 'required|url',
        ]);

        $url = $createShortUrl->execute($request->long_url);

        return back()->with('data', [
            'longUrl' => $request->long_url,
            'shortUrl' => route('urls.show', $url->short_code),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($shortCode, IncrementClickCount $incrementClickCount)
    {
        try {
            $url = $incrementClickCount->execute($shortCode);

            return redirect($url->long_url);
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
        }
    }

    public function dashboard()
    {
        return view('url.dashboard', [
            'data' => Url::where('user_id', Auth::user()->id)->paginate(10),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Url::destroy(explode(',', $request->ids));

        return redirect()->route('urls.dashboard');
    }
}
