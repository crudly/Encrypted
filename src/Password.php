<?php

namespace Crudly\Encrypted;

use Illuminate\Contracts\Database\Eloquent\CastsInboundAttributes;

class Password implements CastsInboundAttributes
{
	/**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
	{
		return $value;
	}

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, string $key, $value, array $attributes)
	{
		return bcrypt($value);
	}
}