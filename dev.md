#### testing php74

    docker exec -it dev-php74 sh -c "cd /var/www/php74/yusam-hub/device-detect-ext && exec bash"

    docker exec -it dev-php74 sh -c "cd /var/www/php74/yusam-hub/device-detect-ext && composer update"
    docker exec -it dev-php74 sh -c "cd /var/www/php74/yusam-hub/device-detect-ext && composer install"
    docker exec -it dev-php74 sh -c "cd /var/www/php74/yusam-hub/device-detect-ext && sh phpunit"
    docker exec -it dev-php74 sh -c "cd /var/www/php74/yusam-hub/device-detect-ext && git status"
    docker exec -it dev-php74 sh -c "cd /var/www/php74/yusam-hub/device-detect-ext && git pull"