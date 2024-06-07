<?php
/**
 * Bekende Vloggende Nederlanders
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Video
 *
 * @package App\Models
 */
class Video extends Model
{
    /**
     * Database table name
     *
     * @var string
     */
    protected $table = 'videos';

    /**
     * The vlogger the video belongs to
     */
    public function vlogger()
    {
        return $this->belongsTo( Vlogger::class, 'vlogger_id');
    }
}
