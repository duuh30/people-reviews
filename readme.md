## Composer Install
<pre>
https://getcomposer.org/doc/00-intro.md#locally
</pre>

## Install

<pre>
clone repository
cd /path/clone-repository
composer install
</pre>

## Setup your database

You must create a <code>.env</code> file in your root directory to set up an important environment variables

Some like that:
<pre>
# /path/clone-repository/.env.example
</pre>

## Artisan Generate Key
<pre>
php artisan key:generate
</pre>


## Migrations
Run this command in your project's terminal to create the tables from migrations
<pre>
php artisan migrate
</pre>

## Seeds
Run this command in your project's terminal to create the rows from seeds
<pre>
php artisan migrate --seed
</pre>

## Ready!

Now, you can start the API

<pre>
php artisan serve
</pre>
Access http://localhost:8000! is a ready.


