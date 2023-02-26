<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class KnowledgeSalary extends Model {

    use HasFactory,
        SoftDeletes,
        Userstamps;

    protected $table = 'knowledge_salary';
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'specialization', 'currently_hiring'
    ];

    public function userCreated() {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function userUpdated() {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

}
