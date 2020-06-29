<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

# Jobable

> Jobable is a job recruitment portal built on Laravel 7 and VueJS

### `.env` Configurations

### Configure database settings

```
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

### Configure Mailtrap

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME={smtp_username}
MAIL_PASSWORD={smtp_password}
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=no-reply@jobable.com
MAIL_FROM_NAME="${APP_NAME}"
```

### Configure Gmail

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME={gmail_username}
MAIL_PASSWORD={gmail_password}
MAIL_ENCRYPTION=tls
MAIL_FROM_NAME="${APP_NAME}"
```

### Run database migrations

```
php artisan migrate
```

### Generate fake data

```
php artisan db:seed
```

### Install Packages

```
npm install && npm run dev
```

### Run App

```
php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
