<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 緊急連作先モデル
 */
class UserContact extends Model
{
    protected $fillable = ['name', 'phone', 'type', 'user_id'];

    public static function deleteUserContact($userId)
    {
        UserContact::where('user_contacts.user_id', '=', $userId)->delete();
    }
}
