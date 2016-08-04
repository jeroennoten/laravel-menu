<?php


namespace JeroenNoten\LaravelMenu\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed displayOrder
 * @property mixed id
 * @method static Builder latest($column)
 * @method static Builder where($column, $operator, $value = null)
 */
class MenuItem extends Model
{
    protected $fillable = ['text', 'url'];

    public static function boot()
    {
        parent::boot();

        static::creating(function (MenuItem $item) {
            $item->displayOrder = static::getNextDisplayOrder();
        });

        static::deleted(function (MenuItem $item) {
            $items = MenuItem::where('display_order', '>', $item->displayOrder)->get();
            $items->each(function (MenuItem $item) {
                $item->decrement('display_order');
            });
        });

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('display_order');
        });
    }

    private static function getNextDisplayOrder()
    {
        /** @var MenuItem $item */
        if ($item = static::latest('display_order')->first()) {
            return $item->displayOrder + 1;
        }

        return 0;
    }

    public function setDisplayOrderAttribute($value)
    {
        $this->attributes['display_order'] = $value;
    }

    public function getDisplayOrderAttribute()
    {
        return $this->attributes['display_order'];
    }

    public function moveDown()
    {
        $this->displayOrder = $this->displayOrder + 1;
        /** @var static $other */
        $other = static::where('display_order', $this->displayOrder)->first();
        $other->displayOrder = $other->displayOrder - 1;
        $this->save();
        $other->save();
    }

    public function moveUp()
    {
        $this->displayOrder = $this->displayOrder - 1;
        /** @var static $other */
        $other = static::where('display_order', $this->displayOrder)->first();
        $other->displayOrder = $other->displayOrder + 1;
        $this->save();
        $other->save();
    }
}