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

        // Retrieve bookmark associated with the logged-in user
        $bookmarks = Bookmark::where('user_id', $user->id)
    ->orderBy('title', 'asc')
    ->get();


        return view('bookmarks.bookmarks', compact('bookmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('bookmarks.bookmarks_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:15',
            'url' => 'required|url',
           
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
            // This redirects back to the form with validation errors and input data.
        }

        $bookmark = new Bookmark([
            'title' => $request->title,
            'url' => $request->url,
            'user_id' =>$user->id,
        ]);

        $bookmark->save();
        return redirect()->route('bookmarks')
            ->with('success', 'Bookmark created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
  
      $bookmark= Bookmark::find($id);
      if (auth()->id() !== $bookmark->user_id) {
         abort(403); // Unauthorized access
     }
      return view('bookmarks.bookmarks_edit', compact('bookmark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
  
  
  
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:15',
            'url' => 'required|url',
           
        ]);
  
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
          // This redirects back to the form with validation errors and input data.
      }
      $bookmark = Bookmark::find($id);
  
      $bookmark->update($request->all());
      return redirect()->route('bookmarks')
        ->with('success', 'Bookmark updated successfully.');
    }
  

    public function delete($id)
    {
  
      $bookmark= Bookmark::find($id);
      if (auth()->id() !== $bookmark->user_id) {
         abort(403); // Unauthorized access
     }
      return view('bookmarks.bookmarks_delete', compact('bookmark'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function delete_confirmed($id)
    {
        $bookmark = Bookmark::find($id);
        if (auth()->id() !== $bookmark->user_id) {
            abort(403); // Unauthorized access
        }
         $bookmark->delete();
         return redirect()->route('bookmarks')
           ->with('success', 'Bookmarks deleted successfully');
    }

}
