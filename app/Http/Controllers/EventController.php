<?php

namespace App\Http\Controllers;

use App\Models\Event; //importando model event (model acessa o banco)
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::all(); //all() seleciona todos os dados da db

        return view('welcome', ['events' => $events]); //enviar dados para a view entre []
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    { //Request para receber dados do form post

        $event = new Event();

        $event->title = $request->title;
        $event->description = $request->description;
        $event->local = $request->local;
        $event->country = $request->country;
        $event->state = $request->state;
        $event->city = $request->city;
        $event->date = '1991-10-25';
        $event->productor = $request->productor;
        $event->private = $request->private;

        $event->save();

        return redirect('/');
    }
}
