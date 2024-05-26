<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlayerRequest;
use App\Models\Player;
use App\Models\Team;
use Exception;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('players.index', compact('players'));
    }
    public function create()
    {

        $teams = Team::all();
        return view('players.create', compact('teams'));
    }

    public function store(CreatePlayerRequest $request)
    {
        $data = $request->validated();

        try {
            Player::create($data);

            return redirect()->route('players.index')->with('status', 'Player created successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'An error has occurred');
        }
    }


    public function edit(string $id)
    {
        $player = Player::find($id);
        $teams = Team::all();
        return view('players.edit', compact('player', 'teams'));
    }


    public function update(CreatePlayerRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $player = Player::findOrFail($id);
            $player->update($data);
            return redirect()->route('players.index')->with('status', 'Player updated successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'An error has occurred');
        }
    }
    public function destroy(string $id)
    {

        try {
            $player = Player::findOrFail($id);
            $player->delete();

            return redirect()->route('players.index')->with('status', 'Player deleted successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'An error has occurred');
        }
    }
}
