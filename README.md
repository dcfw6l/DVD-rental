# DVD-rental

DVD kölcsönző csapat feladat.

=======
Belépés a php dockerbe
```shell script
docker exec -it agilis_php-fpm /bin/sh
```

PHP dockerben futtatandó parancsok
```shell script
php bin/console do:mi:mi
php bin/console doctrine:fixtures:load
```

backend/docs-ban van Postman collection

Base url: http://localhost:8080

Endpointok:
- POST /api/login_check
- GET /api/movies
- POST /api/movies/{movie}/rent
- GET /api/rentals
- POST /api/rentals/{rental}/renew
- GET /api/statistics/by-movie
- GET /api/statistics/weekly

Felhasználók:
- admin@bme.hu password
- user1@bme.hu password1
- user2@bme.hu password2
- user3@bme.hu password3
- user4@bme.hu password4
- user5@bme.hu password5
- user6@bme.hu password6
- user7@bme.hu password7
- user8@bme.hu password8
- user9@bme.hu password9
- user10@bme.hu password10

Belépéshez példa:
```shell script
curl -X POST -H "Content-Type: application/json" http://localhost:8080/api/login_check -d '{"username":"admin@bme.hu","password":"password"}'
```
Itt visszaad egy JWT tokent, amit a request headerbe kell rakni.
Authorization: Bearer ideatokent
