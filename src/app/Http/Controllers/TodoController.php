<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = Todo::with('comment')->get();
        Log::debug('$todos="' .$todos. '"');

        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
	return view('todo.create');
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
	    $todo = new Todo();
        $todo->title = $request->input('title');
        $todo->save();

        $comment = new Comment([
            'body' => 'comment',
        ]);
        $todo->comment()->save($comment);

    	return redirect('todos')->with(
       		'status',
        	$todo->title . 'を登録しました!'
    	);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$todo = Todo::find($id);

    	return view('todo.show', compact('todo'));
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
	$todo = Todo::find($id);
	
	return view('todo.edit', compact('todo'));
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
	$todo = Todo::find($id);

	$todo->title = $request->input('title');
	$todo->save();

    	return redirect('todos')->with(
       		'status',
        	$todo->title . 'を更新しました!'
    	);
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
	$todo = Todo::find($id);
	$todo->delete();

    	return redirect('todos')->with(
       		'status',
        	$todo->title . 'を削除しました!'
    	);
    }
}
