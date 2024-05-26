<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamsRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\GameMatch;
use App\Models\Team;
use Exception;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }
    public function create()
    {

        return view('teams.create');
    }

    public function store(CreateTeamsRequest $request)
    {
        $data = $request->validated();


        try {
            Team::create($data);

            return redirect()->route('teams.index')->with('status', 'Team created successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'An error has occurred');
        }
    }


    public function edit(string $id)
    {
        $team = Team::find($id);
        return view('teams.edit', compact('team'));
    }


    public function update(UpdateTeamRequest $request, string $id)
    {
        $data = $request->validated();

        try {
            $team = Team::findOrFail($id);
            $team->update($data);

            return redirect()->route('teams.index')->with('status', 'Team updated successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'An error has occurred');
        }
    }
    public function destroy(string $id)
    {

        try {
            $team = Team::findOrFail($id);
            $team->delete();

            return redirect()->route('teams.index')->with('status', 'Team deleted successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'An error has occurred');
        }
    }


    public function info(string $id)
    {
        $team = Team::find($id);
        $teamMatches =   $team->matches;
        $teamPlayers = $team->players;
        return view('teams.info', compact('teamMatches', 'teamPlayers', 'team'));
    }
}
