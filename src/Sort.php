<?php

/**
 * Sorting Utility Collection
 *
 * Licensed under The MIT License
 * Redistribution of these files must retain the above copyright notice.
 *
 * @author    Josh Sherman <hello@joshtronic.com>
 * @copyright Copyright 2007-2017, Josh Sherman
 * @license   http://www.opensource.org/licenses/mit-license.html
 * @link      https://github.com/joshtronic/php-sort
 */

namespace joshtronic;

/**
 * Sort Class
 *
 * I got tired of writing separate usort functions to sort by different array
 * keys in the array, this class solves that.
 */
class Sort
{
    /**
     * Ascending
     *
     * Variable to utilize ascending sort
     *
     * @var string
     */
    const ASC = 'ASC';

    /**
     * Descending
     *
     * Variable to utilize descending sort
     *
     * @var string
     */
    const DESC = 'DESC';

    /**
     * Sort By
     *
     * Sorts an array by the specified column, optionally in either direction.
     *
     * @param string $field field to sort by
     * @param array $array array to sort
     * @param string $direction optional direction to sort
     * @return boolean true because sorting is done by reference
     */
    public static function by($field, &$array, $direction = Sort::ASC)
    {
        usort($array, function ($a, $b) use ($field, $direction) {
            $a = $a[$field];
            $b = $b[$field];

            if ($a === $b) {
                return 0;
            }

            return ($a < $b ? -1 : 1) * ($direction === Sort::DESC ? -1 : 1);
        });

        return true;
    }
}

