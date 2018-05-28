<?php

namespace yedincisenol\UserProviderGoogle;

use yedincisenol\UserProvider\UserProviderGrantAbstract;

class UserProviderGoogleGrant extends UserProviderGrantAbstract
{

    /**
     * {@inheritdoc}
     */
    public function getIdentifier()
    {
        return 'google';
    }

}