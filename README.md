# multiple php fpm

__This is only for test !__ not for production

Run multiple fpm-php (with different ports) on one single nginx reverse proxy.

## Setup

Create in folder /logs the files

+ access.log
+ error.log
+ logging.log

## Start

Start the docker with `docker-compose up`

## Result

In file /log/logging.log are two entries. This comes from the php Files.

```sh
2021-03-31 20:11:03.875: ERROR - /var/www/html/logger.class.php-> - line:122 : i am index one
2021-03-31 20:11:03.951: ERROR - /var/www/html/logger.class.php-> - line:122 : i am index two
```

The _... i am index one_ comes from the script in __/html/index.php__ .
Second _... i am index two_ comes from the script in __/html2/index.php__ .

## Errors

Can be found in ./logs/error.log

```sh
2021/03/31 18:00:16 [emerg] 1#1: host not found in upstream "phpfpm:8080" in /etc/nginx/nginx.conf:6
2021/03/31 18:05:21 [emerg] 1#1: host not found in upstream "phpfpm:8080" in /etc/nginx/nginx.conf:6
2021/03/31 18:07:00 [emerg] 1#1: host not found in upstream "phpfpm:8080" in /etc/nginx/nginx.conf:6
2021/03/31 18:11:06 [emerg] 1#1: host not found in upstream "phpfpm:8080" in /etc/nginx/nginx.conf:6
2021/05/21 18:38:28 [emerg] 1#1: host not found in upstream "phpfpm:8080" in /etc/nginx/nginx.conf:6
```

## Sources and Links

+ [stackoverflow](https://stackoverflow.com/questions/64137225/how-to-setup-a-single-nginx-server-with-multiple-php-fpm-docker-containers)
+ [iamyojimbo](https://github.com/iamyojimbo/docker-nginx-php-fpm/blob/master/nginx/nginx.conf#L137)
+ [serverfault](https://serverfault.com/questions/693509/docker-scaling-nginx-and-php-fpm-seperately)