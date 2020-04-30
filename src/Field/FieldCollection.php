<?php

namespace Anomaly\Streams\Platform\Field;

use Illuminate\Support\Collection;

/**
 * Class FieldCollection
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class FieldCollection extends Collection
{

    /**
     * Return field slugs.
     * 
     * @param null $prefix
     * @return FieldCollection
     */
    public function slugs($prefix = null)
    {
        return $this->map(function ($field) use ($prefix) {
            return ($prefix ?: null) . $field->slug;
        });
    }

    /**
     * Return translatable fields.
     * 
     * @return FieldCollection
     */
    public function translatable($translatable = true)
    {
        return $this->filter(function ($field) use ($translatable) {
            return $field->translatable === $translatable ? $field : null;
        });
    }

    /**
     * Return translatable fields.
     * 
     * @return FieldCollection
     */
    public function dates($translatable = true)
    {
        return $this->filter(function ($field) use ($translatable) {
            return $field->translatable === $translatable ? $field : null;
        });
    }

    /**
     * Map attributes to get.
     *
     * @param string $key
     */
    public function __get($key)
    {
        return $this->get($key);
    }
}
