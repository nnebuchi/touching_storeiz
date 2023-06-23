<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'isTranslatable', 'plainValue'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'isTranslatable' => 'boolean',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    // protected $dispatchesEvents = [
    //     'saved' => SettingSaved::class,
    // ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = ['value'];

    /**
     * Get all settings with cache support.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    

    /**
     * Determine if the given setting name exists.
     *
     * @param string $name
     * @return bool
     */
    public static function has($name)
    {
        return static::where('name', $name)->exists();
    }

    /**
     * Get setting for the given name.
     *
     * @param string $name
     * @param mixed $default
     * @return string|array
     */
    public static function get($name, $default = null)
    {
        return static::where('name', $name)->first()->value ?? $default;
    }

    /**
     * Set the given setting.
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public static function set($name, $value)
    {
        if ($name === 'translatable') {
            return static::setTranslatableSettings($value);
        }

        static::updateOrCreate(['name' => $name], ['plainValue' => $value]);
    }

    /**
     * Set the given settings.
     *
     * @param array $settings
     * @return void
     */
    public static function setMany($settings)
    {
        foreach ($settings as $name => $value) {
            self::set($name, $value);
        }
    }

    /**
     * Set a translatable settings.
     *
     * @param array $settings
     * @return void
     */
    public static function setTranslatableSettings($settings = [])
    {
        foreach ($settings as $name => $value) {
            static::updateOrCreate(['name' => $name], [
                'isTranslatable' => true,
                'value' => $value,
            ]);
        }
    }

    /**
     * Get the value of the setting.
     *
     * @return mixed
     */
    public function getValueAttribute()
    {
        if ($this->isTranslatable) {
            return $this->translateOrDefault(locale())->value ?? null;
        }

        return unserialize($this->plainValue);
    }

    /**
     * Set the value of the setting.
     *
     * @param mixed $value
     * @return mixed
     */
    public function setPlainValueAttribute($value)
    {
        $this->attributes['plainValue'] = serialize($value);
    }
}
