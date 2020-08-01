<?php

namespace App\Models\Contribution;

use App\Models\Admin\User;
use App\Models\Crm\Person;
use Illuminate\Database\Eloquent\Model;

class PeopleContribution extends Model
{
    public $table = 'people_contributions';

    protected $fillable = [
        'title',
        'description',
        'people_id',
    ];
    
    public static $validator = [
        'title' => 'required|string|max:50',
        'description' => 'string|max:255',
        'people_id' => 'required|exists:people,id',
    ];


    public function user()
    {
        return $this->belongsTo(Person::class)->orderBy('id');
    }
}
