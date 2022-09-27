<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Http\Resources\SkillResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkillController extends Controller
{
    public function index()
    {
        return SkillResource::collection(Skill::with('users', 'positions')
            ->orderBy('id','desc')->paginate());
    }

    public function show($id)
    {
        return new SkillResource(Skill::with('users', 'positions')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->update($request->only(['name']));
        return response(new SkillResource($skill), Response::HTTP_ACCEPTED);
    }

    public function store(Request $request)
    {
        $skill = Skill::create($request->only(['name']));
        return response(new SkillResource($skill), Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        Skill::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
