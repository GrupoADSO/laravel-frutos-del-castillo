Para correr el proyecto realizar los siguientes comandos en la consola ------->

- el archivo '.env.example' es el archivo que se copia para ser el nuevo '.env' configurarlo segun su local
- composer install
- php artisan key:generate
- php artisan migrate --seed

Seria bueno que cada que hagan algo que no se pueda subir a GitHub por que el '.gitignore' no lo permite no es tan dificil ponerlo en el README.
Ademas de que cada vez que vayan a subir o trabajar algo hagan un 'git clone' para que no esten usando archivos .zip

Una vez que hagan el 'git clone' solo es hacer 'git pull' en caso de que alguien haga hecho un commit y ustedes se queden una rama atras si han cambiando algo deben hacer un merge de lo que tienen o eliminarlo

Sobre la carpeta storage
-> se creo el acceso directo de la carpeta storage en public cuando este proyecto sea subido a un servido se debe de ejecutar de nuevo el siguiente comando en el servidor 

- php artisan storage:link


Para activar la pasarela de pago de paypal se usa el siguiente comando

- composer require srmklive/paypal:~3.0
- php artisan vendor:publish --provider "Srmklive\PayPal\Providers\PayPalServiceProvider"

este paquete utiliza la API Rest de PayPal internamente. Si está utilizando PayPal Express Checkout, consulte el archivo LÉAME para la versión 1 aquí: 