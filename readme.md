# Fivepoints Chat Application

# Install

Please refer to Laravel install documentation [Here](https://laravel.com/docs/5.4#installation)

Once your environnment is up, copy the .env.example to .env

```shell
cp .env.example .env
```

Regenerate the application key:

```shell
php artisan key:generate
```

Run the migration:

```shell
php artisan migrate:refresh --seed
```

The installation will include demo users accounts:

user0@example.com:secret
user1@example.com:secret
...
user19@example.com:secret

### Important:

Please always verify the directories permission if you got running issues.

```shell
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache
```

To Do:

- Add real time messaging using Laravel Echo based in nodejs to push messages to users

### Contact:

Yassine Khachlek <yassine.khachlek@gmail.com>