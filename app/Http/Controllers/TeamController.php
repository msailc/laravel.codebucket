<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    public function index()
    {
        return TeamResource::collection(Team::with('users')->paginate());
    }

    public function show($id)
    {
        return new TeamResource(Team::with('users', 'positions')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->update($request->only(['name']));
        return response(new TeamResource($team), Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Team::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
