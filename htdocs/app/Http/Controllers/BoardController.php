<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Board;
use Auth;
class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        if(!Auth::check())
        {
            return response()->json('Please login');
        }
        $allBoards = Board::getBoardsByUserId(Auth::user()->user_id);
        return response()->json($allBoards);
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
    //POST board
    public function store(Request $request)
    {
        //
        if(!Auth::check())
            return response()->json("Please login to create");
        $title = $request->input('title');
        $description = $request->has('description')?$request->input('description'):null;
        $cover_link = $request->has('cover_link')?$request->input('cover_link'):null;
        $user_id = Auth::user()->user_id;
        // $user_id = 11;
        $board = Board::createBoard($title,$description,$cover_link,$user_id);  
        return response()->json($board);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $result = Board::getBoardById($id);
        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
