<?php

namespace App\Http\Middleware;

use Closure;

class GoogleAnalytics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($account = config('app.ga', false)) {
            $this->appendScript($account, $response);
        }

        return $response;
    }

    /**
     * Append disqus script on the end of the page.
     *
     * @param $account
     * @param  \Illuminate\Http\Response $response
     */
    protected function appendScript($account, $response)
    {
        $content = $response->getContent();

        $analytics = <<<CDATA
<script>
		var _gaq=[['_setAccount','{$account}'],['_trackPageview']];
		(function(d,t){
			var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)
		}(document,'script'));
	</script>
CDATA;

        $bodyPosition = strripos($content, '</body>');

        if (false !== $bodyPosition) {
            $content = substr($content, 0, $bodyPosition) . $analytics . substr($content, $bodyPosition);
        }

        $response->setContent($content);
    }
}
