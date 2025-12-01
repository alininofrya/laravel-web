<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multipleuploads extends Model
{
    protected $table      = 'multiuploads';
    protected $primaryKey = 'id';
    protected $fillable   = ['filename', 'created_at', 'updated_at'];
}
