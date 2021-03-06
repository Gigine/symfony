<?php

namespace Symfony\Bundle\SecurityBundle;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\EventDispatcher\EventInterface;
use Symfony\Component\Security\Http\RememberMe\RememberMeServicesInterface;

/**
 * Adds remember-me cookies to the Response.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class ResponseListener
{
    public function handle(EventInterface $event, Response $response)
    {
        $request = $event->get('request');
        if (!$request->attributes->has(RememberMeServicesInterface::COOKIE_ATTR_NAME)) {
            return $response;
        }

        $response->headers->setCookie($request->attributes->get(RememberMeServicesInterface::COOKIE_ATTR_NAME));

        return $response;
    }
}