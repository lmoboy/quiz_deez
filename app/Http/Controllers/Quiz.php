<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

abstract class Quiz
{
    public function index() {
        return Inertia::render('Dashboard');
    }

    public function show() {
        return Inertia::render('Dashboard');
    }

    public function create(Request $request) {
        $request->validate([
            'id' => 'required',
            'owner_id' => 'required',
            'qestion' => 'required',
            'answers' => 'required',
            'correct_answer' => 'required',
        ]);
    }

    public function new() {
        return Inertia::render('Dashboard');
    }

    public function edit() {
        return Inertia::render('Dashboard');
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'owner_id' => 'required',
            'qestion' => 'required',
            'answers' => 'required',
            'correct_answer' => 'required',
        ]);
    }

    public function destroy(Request $request) {
        $request->validate([
            'id' => 'required',
            'owner_id' => 'required',
        ]);
    }

}