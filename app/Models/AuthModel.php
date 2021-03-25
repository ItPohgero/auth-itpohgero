<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'auth';
    protected $allowedFields    = ['pin', 'name', 'email', 'password', 'phone'];
}
