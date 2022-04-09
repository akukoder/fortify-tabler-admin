<?php

namespace App\Actions;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserAvatar
{
    protected $avatarFolder = 'avatars';

    /**
     * Get user avatar URL
     *
     * @param $user
     * @return string
     */
    public function get($user = null)
    {
        $user = is_null($user) ? auth()->user() : $user;

        return Storage::url('public/' . $this->avatarFolder . '/' . $user->avatar);
    }

    /**
     * Upload user avatar
     *
     * @param $file
     * @return false|string
     */
    public function upload($file)
    {
        // get filename name with extension
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        // remove unwanted characters
        $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
        $filename = preg_replace("/\s+/", '-', $filename);

        // create unique file name
        $uniqueFileName = substr(md5($filename), 0, 15).'_'.time().'.'.$file->getClientOriginalExtension();

        // resize avatar
        $image = Image::make($file)->fit(400, null, function($constraint){
            $constraint->upsize();
        })->encode('png');

        // save avatar to public storage
        $success = Storage::put("public/{$this->avatarFolder}/{$uniqueFileName}", $image->__toString());

        // if avatar has been stored successfully
        if ($success) {
            // return success
            return $uniqueFileName;
        }

        return false;
    }

    /**
     * Delete user avatar
     *
     * @param $user
     * @return bool
     */
    public function delete($user = null)
    {
        $user = is_null($user) ? auth()->user() : $user;

        // if user has an avatar currently in use
        if ($user->avatar) {
            // delete avatar from storage
            return Storage::delete('public/'.$this->avatarFolder.'/'.$user->avatar);
        }

        return false;
    }
}
