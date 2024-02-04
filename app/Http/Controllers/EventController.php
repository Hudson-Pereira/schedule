<?php

namespace App\Http\Controllers;

use App\Models\Event; //importando model event (model acessa o banco)
use App\Models\User;
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

        $user = auth()->user(); //método para pegar dados do user logado

        $event = new Event();

        $event->user_id = $user->id;
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

        $date = $request->date . ' 00:00:00';
        $allEvents = Event::all(); //filtrar por data

        foreach ($allEvents as $event) {
            if ($event->date == $date)
                return redirect('/')->with('msg', 'Já existe evento para essa data!');
        };

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {

        $event = Event::findOrFail($id); //resgate dados no banco ou retornar erro

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]); //mostrar view com os dados 
    }

    public function dashboard()
    {

        $user = auth()->user();

        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Evento excluido com sucesso!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request)
    {

        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            //$imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $imageName =  $request->local . "_" . $request->city . "." . $extension;

            $request->image->move(public_path('image/events'), $imageName);

            $data['image'] = $imageName;
        };

        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento alterado com sucesso!');
    }
}
