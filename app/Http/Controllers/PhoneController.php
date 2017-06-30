<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Storage::get('phones/phones.json');
    }


    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $path = sprintf('phones/%s.json', $slug);

        if (! Storage::exists($path)) {
            abort(404);
        }

        return Storage::get($path);
    }
}
