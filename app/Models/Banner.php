<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Banner extends Model {

    use HasFactory,
        SoftDeletes,
        Userstamps;

    protected $table = 'banner';
    protected $fillable = [
        'about', 'people', 'specializations', 'services', 'community', 'partnership',
        'volunteering', 'diversityandinclusion', 'job', 'joinabblesearch', 'news',
        'thoughtleadership', 'salarysurveys', 'contact'
    ];

    public function userCreated() {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function userUpdated() {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

}
