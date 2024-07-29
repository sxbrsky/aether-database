<?php

/*
 * This file is part of the nulxrd/zinc.
 *
 * Copyright (C) 2024 Dominik Szamburski
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Zinc\Driver;

interface Result
{
    /**
     * Fetches the next row from a result set as an associative array.
     *
     * @return mixed
     *  The next row of the result set as an associative array, or <b>FALSE</b> if there are no more rows.
     */
    public function fetchAssoc(): mixed;

    /**
     * Fetches the next row from a result set as a numerically indexed array.
     *
     * @return mixed
     *  The next row of the result set as a numerically indexed array, or <b>FALSE</b> if there are no more rows.
     */
    public function fetchNumeric(): mixed;

    /**
     * Fetches the next row from a result set as an object.
     *
     * @return mixed
     *  The next row of the result set as an object, or <b>FALSE</b> if there are no more rows.
     */
    public function fetchObject(): mixed;

    /**
     * Fetches all rows from a result set as an array of associative arrays.
     *
     * @return array<string, mixed>
     *  An array of all rows in the result set as associative arrays.
     */
    public function fetchAllAssoc(): array;

    /**
     * Fetches all rows from a result set as an array of numerically indexed arrays.
     *
     * @return array<int, mixed>
     *  An array of all rows in the result set as numerically indexed arrays.
     */
    public function fetchAllNumeric(): array;

    /**
     * Fetches all rows from a result set as an array of objects.
     *
     * @return array<string, object>
     *  An array of all rows in the result set as objects.
     */
    public function fetchAllObject(): array;

    /**
     * Returns the number of rows affected by the last SQL statement.
     *
     * @return int
     *  The number of rows.
     */
    public function rowCount(): int;

    /**
     * Returns the number of columns in the result.
     *
     * @return int
     *  The number of columns in the result. If the columns cannot be counted, <b>Result::columnCount</b> return 0.
     */
    public function columnCount(): int;

    /**
     * Closes the cursor, enabling the statement to be executed again.
     *
     * @return void
     */
    public function free(): void;
}
