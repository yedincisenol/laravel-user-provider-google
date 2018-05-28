<?php

namespace yedincisenol\UserProviderGoogle;

use Illuminate\Contracts\Validation\Rule;

class GoogleTokenValidationRule implements Rule
{

    private static $endpoint = 'https://www.googleapis.com/oauth2/v1/tokeninfo?access_token=:access_token';

    public function passes($attribute, $value)
    {
        return $this->validate($value);
    }

    private function validate($accessToken)
    {
        $endpoint = str_replace(':access_token', $accessToken, self::$endpoint);

        try {
            $options = array(
                'ssl' => array(
                    'verify_peer'=>false,
                    'verify_peer_name'=>false,
                ),
            );

            file_get_contents($endpoint,  false, stream_context_create($options));

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function message()
    {
        return ':attribute is invalid or scopes are not match!';
    }
}