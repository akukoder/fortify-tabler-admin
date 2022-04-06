<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\ChangeUserPassword;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Show all users
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::orderBy('name')
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Create a user
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $action = new CreateNewUser;

        $action->create($request->all());

        return redirect()
            ->route('users.index')
            ->with('status', __('User created!'));
    }

    /**
     * Edit a user
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update user information
     *
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, Request $request)
    {
        $action = new UpdateUserProfileInformation;

        $action->update($user, $request->only('name', 'email'));

        return redirect()
            ->route('users.index')
            ->with('status', __('User profile updated!'));
    }

    /**
     * Change user password
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function changePassword(User $user)
    {
        return view('users.edit-password', compact('user'));
    }

    /**
     * Update user password
     *
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(User $user, Request $request)
    {
        $action = new ChangeUserPassword;

        $action->update($user, $request->all());

        return redirect()
            ->route('users.index')
            ->with('status', __('User password updated!'));
    }

    /**
     * Delete a user
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('status', __('User deleted!'));
    }
}
