<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    public function user(): BelongsTo // تم تعديل اسم الدالة من User إلى user (بداية الحرف صغيرة)
    {
        return $this->belongsTo(User::class);
    }

    public function office(): BelongsTo // تم تعديل اسم الدالة من Office إلى office (بداية الحرف صغيرة)
    {
        return $this->belongsTo(Office::class);
    }
}

