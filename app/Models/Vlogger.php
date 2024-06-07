<?php
/**
 * Bekende Vloggende Nederlanders
 */

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vlogger
 *
 * @package App\Models
 */
class Vlogger extends Model
{
    /**
     * Database table name
     *
     * @var string
     */
    protected $table = 'vloggers';

    /**
     * The video's of the vlogger
     */
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    /**
     * The users that has the vlogger as favorite.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'vlogger_user', 'vlogger_id', 'user_id');
    }
}
