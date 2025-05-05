<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosApiController extends Controller
{
    public function index()
    {
        $todos = auth()->user()->todos()->get();

        return response()->json([
            'todos' => $todos,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $todo = auth()->user()->todos()->create([
            'title' => $request->input('title'),
        ]);

        return response()->json([
            'todo' => $todo,
        ]);
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'completed' => 'required|boolean',
        ]);

        $todo->update([
            'completed' => $request->input('completed'),
        ]);

        return response()->json([
            'todo' => $todo,
        ]);
    }
}
