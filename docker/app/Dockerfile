# OS イメージ
FROM php:7.1-apache

# 作成者
MAINTAINER Fenrir Inc.

# Apache の設定
RUN a2enmod rewrite

RUN apt-get update \
   && apt-get install -y --no-install-recommends \
      libmcrypt-dev \
      vim \
      zip \
      unzip \
      libpng-dev

# Xdebug
RUN pecl install xdebug-2.5.0 \
   && docker-php-ext-enable xdebug

# PHP のモジュール
RUN docker-php-ext-install pdo pdo_mysql mbstring mcrypt gd

# PHP 設定
ADD php.ini /usr/local/etc/php/conf.d

# composer
RUN curl -sS https://getcomposer.org/installer | php \
   && mv composer.phar /usr/local/bin/composer

# Apache 設定
ADD 000-default.conf /etc/apache2/sites-enabled
