<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryTask extends Model
{
   use HasFactory;
   protected $fillable = ['title', 'description', 'due_date', 'category', 'priority', 'status'];
   protected $table = 'history_tasks';
}
