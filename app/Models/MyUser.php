<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * MyUser model
 */
class MyUser implements Authenticatable
{
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getId();
    }

    public function getId(): int
    {
        return 1;
    }

    public function getAuthPassword(): string
    {
        throw new Exception(sprintf('Not implemented: %s->%s()', self::class, __FUNCTION__));
    }

    public function getRememberToken(): string
    {
        throw new Exception(sprintf('Not implemented: %s->%s()', self::class, __FUNCTION__));
    }

    public function setRememberToken($value): void
    {
        throw new Exception(sprintf('Not implemented: %s->%s()', self::class, __FUNCTION__));
    }

    public function getRememberTokenName(): string
    {
        throw new Exception(sprintf('Not implemented: %s->%s()', self::class, __FUNCTION__));
    }
}
