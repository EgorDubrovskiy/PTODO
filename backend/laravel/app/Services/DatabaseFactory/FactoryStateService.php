<?php

namespace App\Services\DatabaseFactory;

use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use App\Interfaces\Services\User\UserServiceInterface;
use DateTime;
use Exception;
use Illuminate\Support\Str;

/**
 * Class FactoryStateService
 * @package App\Services\DatabaseFactory
 */
class FactoryStateService implements FactoryStateServiceInterface
{
    /**
     * @var UserServiceInterface $userService
     */
    protected $userService;

    /**
     * @var Str $stringService
     */
    protected $stringService;

    /**
     * FactoryStateService constructor.
     * @param UserServiceInterface $userService
     * @param Str $stringService
     */
    public function __construct(UserServiceInterface $userService, Str $stringService)
    {
        $this->userService = $userService;
        $this->stringService = $stringService;
    }

    /**
     * @return int
     */
    public function getUserIdAttribute(): int
    {
        return $this->userService->getRandomModelId();
    }

    /**
     * @return DateTime
     * @throws Exception
     */
    public function getDeletedAtAttribute(): DateTime
    {
        return new DateTime();
    }

    /**
     * @param array $attributeNames
     * @return array
     */
    public function getStateByAttributes(array $attributeNames): array
    {
        $state = [];

        foreach ($attributeNames as $attributeName) {
            $getterName = 'get' . $this->stringService::studly($attributeName) . 'Attribute';

            $state[$attributeName] = $this->$getterName();
        }

        return $state;
    }
}