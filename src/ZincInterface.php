<?php

/*
 * This file is part of the nulxrd/zinc.
 *
 * Copyright (C) 2024 Dominik Szamburski
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Zinc;

use JetBrains\PhpStorm\Language;

/**
 * @phpstan-type Params array{
 *     driver?: string,
 *     dsn?: string,
 *     username?: string,
 *     password?: string,
 *     options?: array
 * }
 */
interface ZincInterface
{
    /**
     * Fetches the next row from a result set as an associative array.
     *
     * @param non-empty-string $query
     *  The SQL statement.
     * @param array<string, mixed>|list<mixed> $params
     *  An array of parameters to bind to the SQL statement.
     *
     * @return mixed
     *  The next row of the result set as an associative array, or <b>FALSE</b> if there are no more rows.
     */
    public function fetchAssoc(#[Language('SQL')] string $query, array $params = []): mixed;

    /**
     * Fetches the next row from a result set as a numerically indexed array.
     *
     * @param non-empty-string $query
     *   The SQL statement.
     * @param array<string, mixed>|list<mixed> $params
     *   An array of parameters to bind to the SQL statement.
     *
     * @return mixed
     *  The next row of the result set as a numerically indexed array, or <b>FALSE</b> if there are no more rows.
     */
    public function fetchNumeric(#[Language('SQL')] string $query, array $params = []): mixed;

    /**
     * Fetches the next row from a result set as an object.
     *
     * @param non-empty-string $query
     *   The SQL statement.
     * @param array<string, mixed>|list<mixed> $params
     *   An array of parameters to bind to the SQL statement.
     *
     * @return mixed
     *  The next row of the result set as an object, or <b>FALSE</b> if there are no more rows.
     */
    public function fetchObject(#[Language('SQL')] string $query, array $params = []): mixed;

    /**
     * Fetches all rows from a result set as an array of associative arrays.
     *
     * @param non-empty-string $query
     *   The SQL statement.
     * @param array<string, mixed>|list<mixed> $params
     *   An array of parameters to bind to the SQL statement.
     *
     * @return array<string, mixed>
     *  An array of all rows in the result set as associative arrays.
     */
    public function fetchAllAssoc(#[Language('SQL')] string $query, array $params = []): array;

    /**
     * Fetches all rows from a result set as an array of numerically indexed arrays.
     *
     * @param non-empty-string $query
     *   The SQL statement.
     * @param array<string, mixed>|list<mixed> $params
     *   An array of parameters to bind to the SQL statement.
     *
     * @return array<int, mixed>
     *  An array of all rows in the result set as numerically indexed arrays.
     */
    public function fetchAllNumeric(#[Language('SQL')] string $query, array $params = []): array;

    /**
     * Fetches all rows from a result set as an array of objects.
     *
     * @param non-empty-string $query
     *   The SQL statement.
     * @param array<string, mixed>|list<mixed> $params
     *   An array of parameters to bind to the SQL statement.
     *
     * @return array<string, object>
     *  An array of all rows in the result set as objects.
     */
    public function fetchAllObject(#[Language('SQL')] string $query, array $params = []): array;

    /**
     * Initiates a transaction.
     *
     * @return bool
     *  <b>TRUE</b> on success, <b>FALSE</b> on failure.
     */
    public function beginTransaction(): bool;

    /**
     * Commits a transaction.
     *
     * @return bool
     *  <b>TRUE</b> on success, <b>FALSE</b> on failure.
     */
    public function commit(): bool;

    /**
     * Rollbacks a transaction.
     *
     * @return bool
     *  <b>TRUE</b> on success, <b>FALSE</b> on failure.
     */
    public function rollback(): bool;
}
