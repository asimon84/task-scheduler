<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTaskLink extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [

    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'project_id' => 'integer',
            'task_id' => 'integer',
            'priority' => 'integer',
        ];
    }
}
