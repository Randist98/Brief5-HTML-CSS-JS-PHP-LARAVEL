<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'location',
        'details',
        'image' => 'default_image.jpg',
    ];

    public function user(): BelongsTo // تم تعديل اسم الدالة من User إلى user (بداية الحرف صغيرة)
    {
        return $this->belongsTo(User::class);
    }

    public function images()
{
    return $this->hasMany(Image::class, 'office_id');
}
}
