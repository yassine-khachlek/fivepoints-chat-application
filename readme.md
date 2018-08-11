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

After this you can use the included docker environment, docker engine and docker compose should be available in your machine [Here](https://docs.docker.com/engine/#installation-guides) [Here](https://docs.docker.com/compose/install/) just by running the shell script:

```shell
sudo docker/compose/dev/up.sh
```

To stop docker container:

```shell
sudo docker/compose/dev/down.sh
```

The application will be available on:

```shell
http:://127.0.0.1:8080
```

If you are not using docker you have the change below:

For real-time messaging you need to run the node server, so first update the redis host in ./socket-server/server.js line 7 as below:

```js
var redis = new Redis({
  host: '127.0.0.1',    // Redis host
  ...
});
```
Then run:

```shell
node ./socket-server/server.js
```

Of course in a production environment a tool like PM2 should be used to manage node processes.

### Important:

Please always verify the directories permission if you got running issues.

```shell
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache
```

To Do:

- Code cleaning

### Contact:

Yassine Khachlek <yassine.khachlek@gmail.com>