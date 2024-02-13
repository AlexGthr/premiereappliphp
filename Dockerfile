# use a version of php and apache
FROM php:8.2-apache

# copy the local directory to the current local directory of our docker image
COPY . /var/www/html/

# port 80 is the default port for HTTP
EXPOSE 80