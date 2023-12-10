<?php

namespace App\Http\Filters;
use Illuminate\Database\Eloquent\Builder;
class RequestFilter extends AbstractFilter
{
    public const STATUS = 'status';
    public const START_DATE = 'start_date';
    public const END_DATE = 'end_date';


    protected function getCallbacks(): array
    {
        return [
            self::STATUS => [$this, 'status'],
            self::START_DATE => [$this, 'start_date'],
            self::END_DATE => [$this, 'end_date'],
        ];
    }

    public function status(Builder $builder, $value)
    {
        $builder->where('status', '=', "{$value}");
    }

    public function start_date(Builder $builder, $value)
    {
        $builder->where('created_at', '>=', "{$value}");
    }
    public function end_date(Builder $builder, $value)
    {
        $builder->where('created_at', '<=', "{$value}");
    }
}
