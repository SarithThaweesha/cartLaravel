<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'book_id',
        'book_name',
        'name',
        'address',
        'country',
        'city',
        'ZIP',
        'phone',
        'status',
        'total'

    ];

    // Order.php model
public function books()
{
    return $this->belongsToMany(Book::class, 'orders', 'id', 'book_id');
}

protected $casts = [
    'book_id' => 'array',
];

}
