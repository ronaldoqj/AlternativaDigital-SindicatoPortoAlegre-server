<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgreementConvention extends Model
{
    use HasFactory;

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }


    public function category()
    {
        return $this->belongsTo(CategoryAgreementConvention::class, 'category_id');
    }

    public function categories()
    {
        return $this->belongsTo(CategoryAgreementConvention::class, 'category_id');
    }
}
