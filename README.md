# Symfony 7.1

## Install Symfony
### Development environment: MacOS
```shell
## get symfony
wget https://get.symfony.com/cli/installer -O - | bash

# return: 
#       The Symfony CLI was installed successfully!

#Use it as a local file:
/Users/ariel/.symfony5/bin/symfony

#Or add the following line to your shell configuration file:
export PATH="$HOME/.symfony5/bin:$PATH"

# Or install it globally on your system:
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
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=8.0"
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
