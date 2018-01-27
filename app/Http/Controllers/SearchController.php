<?php

namespace App\Http\Controllers;


use App\Thread;
use App\Trending;
use App\Http\Requests;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Show the search results.
     *
     * @param  \App\Trending $trending
     * @return mixed
     */
    public function index(Request $request)
    {
        if($request->has('q')){

            $threads = Thread::search($request->q)
                ->paginate(6);

        }else{
            $threads = Thread::paginate(6);
        }
        return view('threads.search',compact('threads','trending'));
    }
}
