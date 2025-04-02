FROM php:8.4-rc-apache-bullseye
RUN apt update && apt -y upgrade
RUN apt install -y iputils-ping
RUN docker-php-ext-install mysqli