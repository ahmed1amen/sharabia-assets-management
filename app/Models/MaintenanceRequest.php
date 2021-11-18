<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'maintenance_requests';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = [ 'id' ];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function printSticker($crud = false)
    {
        return '<button  class="btn btn-sm btn-link"   onclick="printSticker(' .$this->id .')" data-toggle="tooltip" title=" طباعة الاستيكرز "><i class="fa fa-print"></i>  طباعة الاستيكرز  </button  >';
    }

    public function PrintPos($crud = false)
    {
        return '<button  class="btn btn-sm btn-link"   onclick="printPosinvoice(' .$this->id .')" data-toggle="tooltip" title=" طباعة الاستيكرز "><i class="fa fa-print"></i>  طباعة الايصال  </button  >';
    }
    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function assets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ClientAsset::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */







    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('l,d/m/Y - h:i:s A');
    }





    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
