<?php

namespace App\Http\Controllers;

use App\Models\Event; //importando model event (model acessa o banco)
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {

        $search = request('search'); //pegando atributo search

        if ($search) {

            $events = Event::where([ //model sempre no singular
                ['title', 'like', '%' . $search . '%'] //array para busca contendo campo
            ])->get(); //especificando que quero pegar dados

        } else {
            $events = Event::all(); //all() seleciona todos os dados da db
        }

        return view('welcome', ['events' => $events, 'search' => $search]); //enviar dados para a view entre []
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
        $event->date = $request->date;
        $event->productor = $request->productor;
        $event->private = $request->private;
        $event->itens = $request->itens;

        //image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            //$imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $imageName =  $request->local . "_" . $request->city . "." . $extension;

            $request->image->move(public_path('image/events'), $imageName);

            $event->image = $imageName;
        };

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {

        $event = Event::findOrFail($id); //resgate dados no banco ou retornar erro

        return view('events.show', ['event' => $event]); //mostrar view com os dados 
    }
}
