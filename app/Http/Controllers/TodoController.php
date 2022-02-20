<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.todos.create');
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
        // return $request;
        try {
            $data = [
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'description' => $request->description,
                'deadline' => $request->deadline
            ];
            // return $data;
            Todo::create($data);
            Session::flash('success', 'Todo added!');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong! ' . $e->getMessage());
        }
        return redirect('dashboard');
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
        $todo = Todo::find($id);
        return view('user.todos.show', compact('todo'));
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
        return view('user.todos.edit', compact('todo'));
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
        // return $request;
        // return $id;
        try {
            $data = [
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'description' => $request->description,
                'deadline' => $request->deadline,
                'status' => $request->status
            ];
            // return $data;
            $todo = Todo::find($id);
            $todo->update($data);
            Session::flash('success', 'Todo updated!');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong! ' . $e->getMessage());
        }
        return redirect('dashboard');
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
        try {
            $todo = Todo::find($id);
            $todo->delete();
            Session::flash('deleted', 'Todo deleted!');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong! ' . $e->getMessage());
        }
        return redirect('dashboard');
    }
}
