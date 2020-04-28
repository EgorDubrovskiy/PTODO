<?php

namespace App\Interfaces\Services\DatabaseFactory;

use DateTime;
use Exception;
use InvalidArgumentException;

/**
 * Interface FactoryStateServiceInterface
 * @package App\Interfaces\Services\DatabaseFactory
 */
interface FactoryStateServiceInterface
{
    public function getUserIdAttribute(): int;

    /**
     * @return DateTime
     * @throws Exception
     */
    public function getDeletedAtAttribute(): DateTime;

    /**
     * @param array $attributeNames
     * @return array
     * @throws InvalidArgumentException
     */
    public function getStateByAttributes(array $attributeNames): array;
}
