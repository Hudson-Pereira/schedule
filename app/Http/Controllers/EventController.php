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
}
