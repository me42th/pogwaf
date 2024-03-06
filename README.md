# Pog WAF
> Package designed to mitigate malicious requests

~~~shell
composer require me42th/pogwaf
~~~

If any request received 404 incorrectly, use the command below and place a record in free_pattern in the config/pogwaf.php file
~~~shell
php artisan vendor:publish --tag=pogwaf
~~~
After installation run 
~~~shell
php artisan pogwaf:aply
~~~
