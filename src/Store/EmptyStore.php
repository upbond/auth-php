<?php
declare(strict_types=1);

namespace Upbond\Auth\SDK\Store;

/**
 * Class EmptyStore.
 * Used to fulfill an interface without providing actual storage.
 *
 * @package Upbond\Auth\SDK\Store
 */
class EmptyStore implements StoreInterface
{
    /**
     * Do nothing.
     *
     * @param string $key   Key to set.
     * @param mixed  $value Value to set.
     *
     * @return void
     */
    public function set(string $key, $value) : void
    {
    }

    /**
     * Return the default.
     *
     * @param string      $key     Key to get.
     * @param null|string $default Return value if key not found.
     *
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return $default;
    }

    /**
     * Do nothing.
     *
     * @param string $key Key to delete.
     *
     * @return void
     */
    public function delete(string $key) : void
    {
    }
}
