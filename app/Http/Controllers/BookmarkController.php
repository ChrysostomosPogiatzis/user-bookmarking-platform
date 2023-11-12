<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); // Get the currently authenticated user

        // Retrieve contacts associated with the logged-in user
        $bookmarks = Bookmark::where('user_id', $user->id)->get();


        return view('bookmarks', compact('bookmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function show(bookmark $bookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(bookmark $bookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bookmark $bookmark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(bookmark $bookmark)
    {
        //
    }
}
