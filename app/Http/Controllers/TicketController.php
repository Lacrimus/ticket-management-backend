<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Create a new TicketController instance.
     * 
     * @return void
     */
    public function __construct()
    {
        //
    }
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* TODO input validation via middleware and validators*/
        Validator::make($ticket, [
            'id' => ['required', 'string', 'unique:tickets'],
            'task' => ['required', 'string', 'unique:tickets', 'max:60'],
            'tasklong' => ['nullable', 'string', 'max:100'], 
            'archived' => ['required', 'boolean'],
            'creationdate' => ['required', 'date_format:d m Y'],
            'author' => ['required', 'string'],
            'room' => ['nullable', 'string'],
            'duedate' => ['required', 'date_format:d m Y', 'after:creationdate']
        ]);

        // Mass assignment option
        $ticket = Ticket::create([
            ''
        ]);

        // "Attribute by attribute" option
        $ticket = new Ticket;
        $ticket->task = $request->task;
        $ticket->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return $ticket;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->all());

        return $ticket;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
