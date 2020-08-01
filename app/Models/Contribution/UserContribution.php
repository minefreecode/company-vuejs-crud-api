<?php

namespace App\Models\Contribution;

use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Model;

class UserContribution extends Model
{
    public $table = 'user_contributions';

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];
    
    public static $validator = [
        'title' => 'required|string|max:50',
        'description' => 'string|max:255',
        'user_id' => 'required|exists:users,id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class)->orderBy('id');
    }
}
