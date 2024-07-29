<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;

class ReminderController extends Controller
{
    public function index()
    {
        // Retrieve all reminders from the database
        $reminders = Reminder::all();

        // Return the view with the reminders data
        return view('reminders.index', ['reminders' => $reminders]);
    }

    public function create()
    {
        // Return the view for creating a new reminder
        return view('reminders.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            // Add validation rules here
        ]);

        // Create a new reminder record in the database
        Reminder::create([
            // Assign request data to database fields
        ]);

        // Redirect back to the index page or any other page
        return redirect('/reminders');
    }

    // Define other CRUD methods like show, edit, update, and destroy
}
