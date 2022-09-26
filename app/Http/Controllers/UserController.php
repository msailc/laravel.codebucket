<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller

{
    public function index()
    {
        return UserResource::collection(User::with('team')->paginate());
    }

    public function show($id)
    {
        return new UserResource(User::with('team')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['name']));
        return response(new UserResource($user), Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
