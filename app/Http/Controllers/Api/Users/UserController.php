<?php


namespace App\Http\Controllers\Api\Users;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\Users\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * The user index response.
     *
     * @return UserResource
     */
    public function index()
    {
        return new UserResource(auth()->user());
    }

    /**
     * Update User.
     *
     * @param UpdateUserRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $this->updateUserDetails($user, $request);

        return response()->json(['image' => 'success']);
    }

    /**
     * Update user details.
     *
     * @param $user
     * @param $request
     *
     * @return void
     */
    public function updateUserDetails($user, $request)
    {
        $user->first_name  = $request->first_name;
        $user->last_name   = $request->last_name;
        $user->description = $request->description;

        $user->save();
    }


}
