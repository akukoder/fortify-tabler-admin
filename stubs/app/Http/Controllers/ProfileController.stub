<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Show profile page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        $devices = DB::table('sessions')
            ->where('user_id', auth()->user()->id)
            ->get()
            ->reverse();

        return view('profile.show', compact('devices'));
    }

    /**
     * Remove unused device
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeDevice($id)
    {
        DB::table('sessions')
            ->where('id', $id)
            ->delete();

        return redirect()
            ->back()
            ->with('success', __('The device has been deleted successfully!'));
    }
}
