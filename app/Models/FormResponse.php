<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Referer\Referer;
use Maatwebsite\Excel\Facades\Excel;

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
    protected static function boot(): void 
    {
        parent::boot();

        static::creating(function (FormResponse $formResponse) {
            $formResponse->referer = app(Referer::class)->get();
        });
    }

    /**
     * Method for downloading all the contact responses in the application. 
     * 
     * @return void
     */
    public static function downloadAll(): void
    {
        Excel::create('Responses '.date('Y-m-d'), function ($excel) {
            $excel->sheet('Responses', function ($sheet) {
                $sheet->freezeFirstRow();
                $sheet->cells('A1:Z1', function ($cells) {
                    $cells->setFontWeight('bold');
                    $cells->setBorder('node', 'none', 'solid', 'none');
                });
                $sheet->fromModel(self::all());
            });
        })->download('xlsx');
    }
}
