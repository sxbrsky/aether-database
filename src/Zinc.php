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

/**
 * @phpstan-import-type Params from ZincInterface
 */
final class Zinc implements ZincInterface
{
    /**
     * @param Params $params
     */
    public function __construct(
        protected \Zinc\Driver $driver,
        #[\SensitiveParameter] protected array $params,
    ) {

    }
}
