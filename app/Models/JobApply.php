<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class JobApply extends Model {

    use HasFactory,
        SoftDeletes,
        Userstamps;

    protected $table = 'job_apply';
    protected $fillable = [
        'job_id', 'first_name', 'last_name', 'email', 'phone_code', 'phone',
        'is_replay', 'specialization', 'currently_hiring', 'cv'
    ];

    public function job() {
        return $this->hasOne(Job::class, 'id', 'job_id');
    }

}
