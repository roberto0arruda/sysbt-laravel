<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">SysBt</p>

## Sobre SysBt

<strong>SysBt</strong> é um aplicativo web feito com Laravel Framework:
o app consiste em gerenciar e armazenar as informações da venda dos celulares.

hospedado em: [Heroku](http://sysbt.herokuapp.com)

## Developer

[@roberto0arruda](https://github.com/roberto0arruda)

### How to set up file permissions for Laravel

**Your user as owner**

I prefer to own all the directories and files (it makes working with everything much easier), so I do:

> chown -R 1000:www-data /var/www

Then I give both myself and the webserver permissions:

> find /var/www -type f -exec chmod 664 {} \;
> find /var/www -type d -exec chmod 775 {} \;
