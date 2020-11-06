<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Traffic extends Model
{
    use HasFactory;
    use SoftDeletes;
    use FullTextSearch;

    protected $guarded = [];

    /**
     * The columns of the full text index
     */
    protected $searchable = [
        'salesman',
        'make',
        'model',
        'sn',
        'attachments',
        'customer',
    ];

//    Need this for recent livewire update to edit on the front end?
//    protected $appends = ['date_for_editing'];

    const BRANCHES = [
        'Detroit' => 'Detroit',
        'Grand Rapids' => 'Grand Rapids',
        'Lansing' => 'Lansing',
        'Richmond' => 'Richmond',
        'Saginaw' => 'Saginaw',
        'Traverse City' => 'Traverse City',
    ];

    public function getDateForDisplayAttribute()
    {
        return $this->created_at->format('M, d Y \a\t g:i a');
    }

    public function getDateForEditingAttribute()
    {
        return $this->created_at->format('m/d/Y');
    }

    public function setDateForEditingAttribute($value)
    {
        $this->created_at = Carbon::parse($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(Details::class);
    }
}
