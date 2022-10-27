<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livros;
use App\Models\Reservas;
use App\Models\user;
use Response;
use Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $livrosFree = Livros::where('role', 'free')->get();
        $livrosPremium = Livros::where('role', 'premium')->get();
        $livrosMaster = Livros::where('role', 'master')->get();
        return view('home', compact('livrosFree', 'livrosPremium', 'livrosMaster'));
    }

    public function planos()
    {
        return view('planos');
    }

    public function mudarPlano($role)
    {
        $user = User::find(Auth::user()->id);
        $user->role = $role;
        $user->save();
        Auth::logout();
        return redirect()->route('home.index')->with('success', "Seu plano foi alterado, faça login para começar a usar.");
    }

    public function livro(Livros $livro)
    {
        return view('livro', compact('livro'));
    }

    public function showPdf(Livros $livro)
    {
        $path = public_path() . "/img/livros/" . $livro->pdf;
        $filename = $livro->pdf;

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }

    public function reservarLivro($livro)
    {
        $reserva = new Reservas;
        $reserva->livros_id = $livro;
        $reserva->user_id = Auth::user()->id;
        $reserva->retirada = date('Y-m-d');
        $reserva->save();

        return redirect()->route('home.minhas.reservas')->with('message', 'O livro foi reservado com sucesso!');
    }

    public function minhasReservas()
    {
        $reservas = Reservas::where('user_id', Auth::user()->id)->whereNull('devolucao')->get();
        return view('reservas',  compact('reservas'));
    }


    public function devolverLivro(Reservas $reserva)
    {
        $reserva->devolucao = date('Y-m-d');
        $reserva->save();

        return redirect()->back()->with('message', 'O livro foi devolvido com sucesso!');
    }

}