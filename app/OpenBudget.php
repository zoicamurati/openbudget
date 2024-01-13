<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenBudget extends Model
{
    public $timestamps = false;
    protected $table = 'financial_transactions_2019';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [];
}
