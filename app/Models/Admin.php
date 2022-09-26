<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin
 *
 * @property int $admin_id
 * @property string $admin_email
 * @property string $admin_password
 * @property string $admin_name
 * @property string $admin_phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAdminEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAdminName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAdminPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAdminPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Admin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'admin_id',
        'admin_email',
        'password_password',
        'admin_name',
        'admin_phone',
    ];

}
