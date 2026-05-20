<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'email', 'subject', 'message'])]
class ContactMessage extends Model
{
    use HasFactory;

    public function markAsRead(): void
    {
        $this->update(['is_read' => true]);
    }

    protected function casts(): array
    {
        return [
            'is_read' => 'boolean',
        ];
    }
}
