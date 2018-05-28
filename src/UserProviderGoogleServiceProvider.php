<?php

namespace yedincisenol\UserProviderGoogle;

use Laravel\Passport\Bridge\RefreshTokenRepository;
use Laravel\Passport\Bridge\UserRepository;
use Laravel\Passport\Passport;
use yedincisenol\UserProvider\UserProviderServiceProviderAbstract;

class UserProviderGoogleServiceProvider extends UserProviderServiceProviderAbstract
{

    /**
     * Create and configure a Password grant instance.
     *
     */
    protected function makeUserProviderGrant()
    {
        $grant = new UserProviderGoogleGrant(
            $this->config,
            $this->app->make(UserRepository::class),
            $this->app->make(RefreshTokenRepository::class)
        );

        $grant->setRefreshTokenTTL(Passport::refreshTokensExpireIn());

        return $grant;
    }
}