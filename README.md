Prueba para ADA correspondiente a matricular, desmatricular y busqueda de alumnos.

1. La aplicación esta realizada en el framework de php laravel(version actual), javascript y jquery para funcionalidades dinamicas con ajax.
2. Descargar la aplicación a partir de git clone desde consola o directamente desde el enlace que genera github.
3. Una vez descargada, ir a la ubicación de la aplicación por consola y ejecutar: composer install.
4. Una vez realizamos el paso anterior, se procede a editar el archivo .env en donde configuraremos de esta forma la base de datos para 
conectar la aplicación: DB_DATABASE=db104; DB_PASSWORD=''; (conector mysql).
5. Crear la base de datos en el motor que se este utilizando(recomendado nombrarla db104 dado a que es el nombre sumnistrado para la prueba, NO influye
para nada el nombre en si).
6. Se podria ejecutar php artisan migrate para subir los datos a la base de datos creada en el paso anterior, no obstante, es posible importar desde el motor
de base de datos el archivo .sql para obtener los datos directamente(NOTA: Este archivo .sql lo encontrara en el correo que s eme suministro para enviar el enlace
de esta aplicación al igual que los de importación para datos como departamentos, municipios y asignaturas).
7. Una vez  configurado lo anterior, se procede por consola a ejecutar el servidor: php artisan serve.
8. Se ingresa a la aplicación a aprtir del navegador por la url: http://127.0.0.1:8000 donde la vista principal es el panel de alumnos.
9. Una vez en el panel de alumnos, se procede a crear un alumno, una vez se crea, este se lista y a su derecha tendra la opción de editarse su información y de matricularlo en las asignaturas que le correspondan.
10. Si un alumno ya esta matriculado, en la lista de alumnos, cambiaran sus opciones y el podra ser desmatriculdo por completo ó sera posible modificar su matricula de asignaturas en forma personalizada(es decir, se podra modificar las asignaturas que el desea ver).
11. En el filtro de busqueda de la vista principal, es posible buscar el alumno especialmente por ciudad.


Cualquier inquietud, sugerencia o duda podra ser allegada al correo electrónico salgadosb1986@gmail.com.

Gracias.
