<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocietyRule extends Model
{
    // Table Name
    protected $table = 'society_rules';

    // Primary Key
    public $primaryKey = 'society_rule';

    // Stop it from assuming primary key is autoincrement
    public $incrementing = false;
}
