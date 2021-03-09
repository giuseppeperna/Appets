<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use App\Tipologia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $user = User::find($userId);

        return view('dashboard', compact('user'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $tipologie = Tipologia::all();

        return view('dashboard.show', compact('user', 'tipologie'));;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $tipologie = Tipologia::all();

        return view('dashboard.edit', compact('user', 'tipologie'));;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $data = $request->validated();
        $user->rist_nome = $data['rist_nome'];
        if($data['email'] !== $user->email) {
            $user->email = $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }
        $user->rist_indirizzo = $data['rist_indirizzo'];
        $user->rist_descrizione = $data['rist_descrizione'];
        $user->rist_p_iva = $data['rist_p_iva'];
        $user->save();

        return redirect()->route('utente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
