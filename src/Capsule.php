<?php

/*
 * This file is part of the sxbrsky/database.
 *
 * Copyright (C) 2024 Dominik Szamburski
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Sxbrsky\Database;

/**
 * @phpstan-import-type Params from CapsuleInterface
 */
final class Capsule implements CapsuleInterface
{
    /**
     * @param Params $params
     */
    public function __construct(
        protected \Sxbrsky\Database\Driver $driver,
        #[\SensitiveParameter] protected array $params,
    ) {

    }
}
