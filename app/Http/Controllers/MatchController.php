<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatchController;
use App\Http\Requests\CreateMatchRequest;
use App\Http\Requests\CreateTeamsRequest;
use App\Models\GameMatch;
use App\Models\Team;
use Exception;
use Illuminate\Http\Request;

class MatchController extends Controller
{

    public function index()
    {
        $matches = GameMatch::all();
        return view('matches.index', compact('matches'));
    }
    public function create()
    {

        $teams = Team::all();
        return view('matches.create', compact('teams'));
    }

    public function store(CreateMatchRequest $request)
    {

        $data = $request->validated();

        if ($data["team_1_id"] == $data['team_2_id']) {
            return redirect()->back()->with('error', "Teams can't be the same");
        };


        try {
            GameMatch::create($data);

            return redirect()->route('matches.index')->with('status', 'Match created successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'An error has occurred');
        }
    }


    public function edit(string $id)
    {
        $match = GameMatch::find($id);
        $teams = Team::all();
        return view('matches.edit', compact('match', 'teams'));
    }


    public function update(CreateMatchRequest $request, string $id)
    {
        $data = $request->validated();
        if ($data["team_1_id"] == $data['team_2_id']) {
            return redirect()->back()->with('error', "Teams can't be the same");
        };

        try {
            $match = GameMatch::findOrFail($id);
            $match->update($data);
            return redirect()->route('matches.index')->with('status', 'Match updated successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'An error has occurred');
        }
    }
    public function destroy(string $id)
    {

        try {
            $match = GameMatch::findOrFail($id);
            $match->delete();

            return redirect()->route('matches.index')->with('status', 'Player deleted successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'An error has occurred');
        }
    }
}
