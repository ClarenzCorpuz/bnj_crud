<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'firstname',
        'lastname',
        'middlename',
        'email',
        'age',
        'birthdate',
        'gender',
    ];

    public const DATE_FORMAT = 'M d, Y';
    public const DATETIME_FORMAT = 'M d, Y h:i A';

    public function getBirthdateFormattedAttribute()
    {
        return $this->birthdate ? \Carbon\Carbon::parse($this->birthdate)->format(self::DATE_FORMAT) : null;
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at ? $this->created_at->format(self::DATETIME_FORMAT) : null;
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at ? $this->updated_at->format(self::DATETIME_FORMAT) : null;
    }
}
