<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * @property string $status
 * @property array $payload
 */
class Document extends Model
{
    use Uuid;

    protected $fillable = [
        'status',
        'payload'
    ];

    protected $casts = [
        'payload' => 'array'
    ];

    /**
     * Находим документ по uuid
     *
     * @param $query
     * @param $uuid
     */
    public function scopeGetId($query, $uuid)
    {
        try {
            return $query->where('id', $uuid)->firstOrFail();
        } catch (\Exception $exception) {
            abort(404);
        }
    }
}
