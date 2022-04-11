<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\ChangeUserPassword;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Actions\UserAvatar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Show all users
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        $search = $request->input('search', null);

        if (! empty($search)) {
            $this->validateSearch($request->all());
        }

        $users = new User;

        if (! is_null($search)) {
            $users = $users->where( function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('username', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            });
        }

        $total = $users->count();

        $users = $users->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('users.index', compact(
            'users', 'search', 'total',
        ));
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

        $action->update($user, $request->only('name', 'email', 'username', 'avatar'));

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
        if (! empty($user->avatar)) {
            (new UserAvatar)->delete($user);
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('status', __('User deleted!'));
    }

    /**
     * Delete a user
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAvatar(User $user)
    {
        if (! empty($user->avatar)) {
            (new UserAvatar)->delete($user);
        }

        $user->avatar = null;
        $user->save();

        return redirect()
            ->back()
            ->with('status', __('Profile picture deleted!'));
    }

    private function validateSearch($input)
    {
        Validator::make($input, [
            'search' => [
                'string',
                'min:3'
            ],
        ])->validate();
    }
}
