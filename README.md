Package designed to mitigate malicious requests

If any request received 404 incorrectly, use the command below and place a record in free_pattern in the config/pogwaf.php file
php artisan vendor:publish --tag=pogwaf

After installation, run the php artisan pogwaf:aply command

