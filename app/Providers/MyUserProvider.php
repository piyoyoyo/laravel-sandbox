<?php

namespace App\Providers;

use App\Models\MyUser;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class MyUserProvider implements UserProvider
{
    public function retrieveById($identifier): ?Authenticatable
    {
        $user = new MyUser();
        $user->name = "koyama";
        $user->email = "koyama@example.com";
        $user->password = "password";

        return $user;
    }

    public function retrieveByToken($identifier, $token): ?Authenticatable
    {
        throw new Exception(sprintf('Not implemented: %s->%s()', self::class, __FUNCTION__));
    }

    public function updateRememberToken(Authenticatable $user, $token): void
    {
        throw new Exception(sprintf('Not implemented: %s->%s()', self::class, __FUNCTION__));
    }

    public function retrieveByCredentials(array $credentials): ?Authenticatable
    {
        // ここで$credentialsにあるメールアドレスとパスワードをもとに外部APIを呼ぶ
        // 下記のようにしてemail/passwordが取れる
        // $credentials['email']
        // $credentials['password']
        $user = new MyUser();
        $user->name = "koyama";
        $user->email = "koyama@example.com";
        $user->password = "password";

        return $user;
    }

    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        return true;
    }
}
