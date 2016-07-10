<?php
namespace App\Routing\Filter;

use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Routing\DispatcherFilter;

/**
 * Class CorsFilter
 * @package Cors\Routing\Filter
 */
class CorsFilter extends DispatcherFilter
{
    /**
     * Instantiates middleware via CakePHP events to set CORS headers on the response object.
     *
     * @param Event $e The event passed into the Filter
     * @return void
     */
    public function beforeDispatch(Event $e)
    {
        return $this->_dispatch($e);
    }

    /**
     * Instantiates middleware via CakePHP events to set CORS headers on the response object.
     * Mainly caters to Exception
     *
     * @param Event $e The event passed into the Filter
     * @return void
     */
    public function afterDispatch(Event $e)
    {
        return $this->_dispatch($e);
    }

    protected function _dispatch(Event $e)
    {
        $httpHost = env('HTTP_HOST');
        $domain = explode('.', $httpHost);
        if ($domain[0] === 'api') {
            unset($domain[0]);
        }
        $domain = implode('.', $domain);
        $protocol = 'http';
        if (env('HTTPS') || env('HTTP_X_FORWARDED_PROTO') || env('HTTP_X_FORWARDED_PORT') === '443') {
            $protocol .= 's';
        }
        $origin = $protocol . '://' . $domain;

        // If you are running grunt serve / server on a particular port
        if (strstr(env('HTTP_ORIGIN'), '9000')) {
            $origin .= ':9000';
        }

        $request = $e->data['request'];

        $methods = ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'];
        $headers = [
            // TODO: You can add other headers like 'Authorization' for JWT TOKENs
            'Access-Control-Allow-Headers' => 'Content-Type'
        ];

        $e->data['response']->cors($request, $origin, $methods, $headers);
        if ($request->is('options')) {
            return $e->data['response'];
        }
    }
}
