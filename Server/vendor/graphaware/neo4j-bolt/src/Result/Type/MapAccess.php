<?php

/*
 * This file is part of the GraphAware Bolt package.
 *
 * (c) Graph Aware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Bolt\Result\Type;

use GraphAware\Common\Type\MapAccessor;

class MapAccess implements MapAccessor
{
    protected $properties;

    /**
     * @inheritdoc
     */
    public function value($key, $default = null)
    {
        if (!array_key_exists($key, $this->properties) && 1 === func_num_args()) {
            throw new \InvalidArgumentException(sprintf('this object has no property with key %s', $key));
        }

        return array_key_exists($key, $this->properties) ? $this->properties[$key] : $default;
    }

    /**
     * @inheritdoc
     */
    public function hasValue($key)
    {
        return array_key_exists($key, $this->properties);
    }


    /**
     * @return array
     */
    public function keys()
    {
        return array_keys($this->properties);
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->value($key);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function containsKey($key)
    {
        return array_key_exists($key, $this->properties);
    }

    /**
     * @return array
     */
    public function values()
    {
        return $this->properties;
    }

    /**
     * @return array
     */
    public function asArray()
    {
        return $this->properties;
    }
}