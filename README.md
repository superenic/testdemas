# Examen de Grupo

1.  [x] Llamados al API https://vpic.nhtsa.dot.gov/api/.
2.  [x] Almacenar la información en una base de datos (Definir el modelo).
3.  [] Considerar control de usuarios y bitácoras de eventos.
4.  [1/2] Utilizar procedimientos almacenados y vistas.
5.  [] Generar un reporte de Excel con los siguientes campos:
    1. [] make
    1. [] model year
    1. [] vehicle type
6.  [] Realizar filtros opcionales por cualquiera de los campos definidos y combinaciones entre ellos.
7.  [] Enviar reporte por correo electrónico (PHPMailer, SES o cualquier otra librería que prefiera).
8.  [] Guardar el reporte en AWS-S3.
9.  [x] Generar métricas de rendimiento.
10. [] Proponer una funcionalidad más.
    1. [] nueva



```bash
php artisan config:clear

php artisan cache:clear

sudo chmod -R 775 /var/www/your_folder

sudo chown -R www-data:www-data var/www/your_folder 
``