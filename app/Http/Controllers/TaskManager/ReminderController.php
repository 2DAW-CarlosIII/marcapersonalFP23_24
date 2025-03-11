<?php

namespace App\Http\Controllers\TaskManager;

use App\Models\TaskManager\Reminder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReminderController extends Controller
{
    public function index()
    {
        $reminders = Auth::user()->reminders()->latest()->get();
        return view('taskmanager.reminders.index', compact('reminders'));
    }

    public function create()
    {
        return view('taskmanager.reminders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'nullable|date',
            'time' => 'nullable|date_format:H:i',
        ]);

        Auth::user()->reminders()->create($request->all());

        return redirect()->route('reminders.index')->with('success', 'Reminder created successfully.');
    }

    public function edit(Reminder $reminder)
    {
        return view('taskmanager.reminders.edit', compact('reminder'));
    }

    public function update(Request $request, Reminder $reminder)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'nullable|date',
            'time' => 'nullable|date_format:H:i',
        ]);

        $reminder->update($request->all());

        return redirect()->route('reminders.index')->with('success', 'Reminder updated successfully.');
    }

    public function destroy(Reminder $reminder)
    {
        $reminder->delete();
        return redirect()->route('reminders.index')->with('success', 'Reminder deleted successfully.');
    }
}
