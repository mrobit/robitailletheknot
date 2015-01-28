<?php namespace Knot\Users;

use Illuminate\Database\Eloquent\Model;
use Hash, Eloquent;

class User extends Eloquent {

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email'    => 'required|email',
        'password' => 'required',
    ];

    /**
     * Values hidden from the JSON response
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Auto-hash the password attribute.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}