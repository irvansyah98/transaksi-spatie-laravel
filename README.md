## Cara Instal

1. Ekstrak file zip yang berisi laravel ini ke dalam folder htdocs (jika pakai windows)
2. lakukan ``composer install`` atau ``composer update`` pada terminal
3. jika sudah, buat database pada postgreSQL atau MySQL
4. jika sudah, lakukan konfigurasi file .env yg ada didalam project ini, update key value seperti contoh dibawah
``DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5433
DB_DATABASE=transaksi
DB_USERNAME=postgres
DB_PASSWORD=123456``

5. jika sudah disesuaikan step selanjutnya adalah ``php artisan migrate:refresh --seed`` pada terminal

6. login mengguakan akun admin atau guest yang ada di bawah

* user guest
<br>email : guest@gmail.com
<br>pass : 123456
<br><br>
* user admin
<br>email : admin@gmail.com
<br>pass : 123456
