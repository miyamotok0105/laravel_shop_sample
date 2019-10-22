
cp ./etc/laravel.env.example ./src/.env


# command mode
# mysql -u root -p < ./etc/create-database.sql

# if you change db info, you have to change permmition.
# writable
# chmod 777 etc/dbaccess.cnf
# readatble
# chmod 400 etc/dbaccess.cnf
mysql --defaults-extra-file=./etc/dbaccess.cnf < ./etc/create-database.sql

