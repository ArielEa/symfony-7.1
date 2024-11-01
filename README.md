# Symfony 7.1

## Install Symfony
### Development environment: MacOS
### PHP version: 8.3.13
```shell
## get symfony
wget https://get.symfony.com/cli/installer -O - | bash

# return: 
#       The Symfony CLI was installed successfully!

#Use it as a local file:
/Users/ariel/.symfony5/bin/symfony

#One method is <add the following line to your shell configuration file>:
export PATH="$HOME/.symfony5/bin:$PATH"

#Anther method is <install it globally on your system>:
mv /Users/ariel/.symfony5/bin/symfony /usr/local/bin/symfony
```

## Use project
```shell
composer install 
```

## Doctrine
### Installer 
```
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
```
### .env
```env
# .env

# In all environments, the following files are loaded if they exist,
# the latter taking precedence over the former:
#
#  * .env                contains default values for the environment variables needed by the app
#  * .env.local          uncommitted file with local overrides
#  * .env.$APP_ENV       committed environment-specific defaults
#  * .env.$APP_ENV.local uncommitted environment-specific overrides
#
# Real environment variables win over .env files.
#
# DO NOT DEFINE PRODUCTION SECRETS IN THIS FILE NOR IN ANY OTHER COMMITTED FILES.
# https://symfony.com/doc/current/configuration/secrets.html
#
# Run "composer dump-env prod" to compile .env files for production use (requires symfony/flex >=1.2).
# https://symfony.com/doc/current/best_practices.html#use-environment-variables-for-infrastructure-configuration

###> symfony/framework-bundle ###
APP_ENV=dev
APP_SECRET=7ed551b6e20746d172c24362fb61d35b
###< symfony/framework-bundle ###

###> doctrine/doctrine-bundle ###
# Format described at https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url
# IMPORTANT: You MUST configure your server version, either here or in config/packages/doctrine.yaml
#
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
# DATABASE_URL="mysql://db_user:db_password@db_host:3306/db_name?serverVersion=8.0.32&charset=utf8"
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=8.0"
# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=10.11.2-MariaDB&charset=utf8mb4"
#DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
###< doctrine/doctrine-bundle ###

###> lexik/jwt-authentication-bundle ###
JWT_SECRET_KEY=%kernel.project_dir%/config/jwt/private.pem
JWT_PUBLIC_KEY=%kernel.project_dir%/config/jwt/public.pem
JWT_PASSPHRASE=a30182423bb8fef00b582eacfcc31864c622583fb984e6258cc8f734977cfe9a
###< lexik/jwt-authentication-bundle ###

###> nelmio/cors-bundle ###
CORS_ALLOW_ORIGIN='^https?://(localhost|127\.0\.0\.1)(:[0-9]+)?$'
###< nelmio/cors-bundle ###


```

### make entity
```shell
php bin/console make:entity
```

### confirm entity
```shell
php bin/console make:migration
```

### create entity to database
```shell
php bin/console doctrine:migrations:migrate
```

## CORS
### install cors bundle
```
composer require nelmio/cors-bundle
```
### compose configuration
```yaml
## config/packages/nelmio_cors.yaml
# config/packages/nelmio_cors.yaml
nelmio_cors:
    defaults:
        allow_origin: ['*']                # 设置允许的源，生产环境中建议限定具体的域
        allow_credentials: false           # 是否允许请求包含凭据
        allow_headers: ['Content-Type', 'Authorization']
        expose_headers: ['Link']
        allow_methods: ['GET', 'POST', 'OPTIONS']
        max_age: 3600
    paths:
        '^/api/':                          # 适用于 /api/ 路径下的路由
            allow_origin: ['*']
            allow_headers: ['Content-Type', 'Authorization']
            allow_methods: ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS']
            max_age: 3600
```

### Configuring a Web Server
```
server {
    listen 80;
    server_name your.domain.com;
    root /path/your_project/public;

    location / {
        try_files $uri /index.php$is_args$args;
    }
    
    ## set a custom port, like 9000, 9001, but it must be the same to php-fpm port.
    location ~ \.php$ {
    	fastcgi_pass 127.0.0.1:9001;
    	fastcgi_index index.php;
    	include fastcgi_params;
    	fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

}
```