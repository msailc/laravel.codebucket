<?php

namespace App\Http\Controllers;

use App\Http\Resources\PositionResource;
use App\Models\Position;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PositionController extends Controller
{
    public function index()
    {
        return PositionResource::collection(Position::with('team', 'skills')->paginate());
    }

    public function show($id)
    {
        return new PositionResource(Position::with('team', 'skills')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $team = Position::findOrFail($id);
        $team->update($request->only(['name']));
        return response(new PositionResource($team), Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Position::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
