<?php

namespace App\Http\Controllers;

use App\Actions\UserAvatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display the Edit Profile page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function editProfile()
    {
        $devices = DB::table('sessions')
            ->where('user_id', auth()->user()->id)
            ->get()
            ->reverse();

        return view('profile.edit', ['devices' => $devices]);
    }

    /**
     * Update the Avatar
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function updateAvatar(Request $request)
    {
        // validate
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=200,min_height=200',
        ]);

        // remove old avatar from storage
        $this->removeOldAvatar(true);

        // process avatar and redirect back
        if ($this->processAvatar($request)) {
            return redirect()
                ->back()
                ->with('success', 'Updated the avatar successfully!');
        }

        return redirect()
            ->back()
            ->withErrors(['avatar', 'Failed to update the avatar']);
    }

    /**
     * Process the resize and storage of the image
     *
     * @param $request
     * @return boolean
     */
    private function processAvatar($request)
    {
        $file = (new UserAvatar)->upload($request->file('avatar'));

        // if avatar has been stored successfully
        if ($file) {
            // update user table
            $user = auth()->user();
            $user->avatar = $file;
            $user->save();

            // return success
            return true;
        }

        return false;
    }

    /**
     * Remove avatar currently in use
     *
     * @param bool $internalRequest
     * @return bool|\Illuminate\Http\RedirectResponse
     * @return \Illuminate\Http\Response
     */
    public function removeOldAvatar(bool $internalRequest = false)
    {
        $user = auth()->user();

        if ((new UserAvatar)->delete($user) !== false) {
            $user->avatar = null;
            $user->save();
        }

        return redirect()
            ->back()
            ->with('success', 'The avatar has been deleted successfully!');
    }

    /**
     * Remove unused device
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function removeDevice($id)
    {
        DB::table('sessions')
            ->where('id', $id)
            ->delete();

        return redirect()
            ->back()
            ->with('success', 'The device has been deleted successfully!');
    }
}
