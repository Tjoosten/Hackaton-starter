<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;    // <- Install needed
use Spatie\Referer\Referer;             // <- Install needed

/**
 * Class FormResponse 
 * 
 * @package App\Models
 */
class FormResponse extends Model
{
    /** @var array $guarded The field names inside the array is not mass-assignable */
    protected $guarded = ['id'];

    /**
     * The "booting" method of the FormResponse model.
     *
     * @return void
     */
    public static function boot(): void 
    {
        static::creating(function (FormResponse $formResponse) {
            $formResponse->referer = app(Referer::class)->get();
        });
    }
}
