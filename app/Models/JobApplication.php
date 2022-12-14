<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $table = 'job_applications';

    protected $primaryKey = 'id';

    protected $fillable = ['full_name', 'gender', 'email', 'date_of_birth', 'link'];

    protected $connection = 'mysql2';

}
