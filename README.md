
# challenge abitmedia app

#### Descripción: 
el siguiente repositorio contiene un mini proyecto para una solucion de venta de softwarey servicios de computación:

### 1 Instalación
 Requisitos: 
  
    - MySQL
    - PHP 8.1
    - Apache
    - Composer
Estas herramientas se pueden descargar en el siguiente [XAMMPP](https://www.apachefriends.org/es/download.html) (MySQL, PHP, Apache).

Descarga [Composer](https://getcomposer.org/download/)

En caso de tener alguna dificultad en instalar XAMMPP aqui tienes un [Tutorial](https://www.youtube.com/watch?v=Gll_3jgXkRc) que puede ayudarte.

Ahora que ya tienes las herramientas necesarias para usar el API, clona el repositorio dentro de la ruta:
 
    - C:\xampp\htdocs

Si al instalar XAMMPP en tu maquina cambiaste la ruta por defecto de instalación debes instalar en el directorio de tu caso. 





#### Ejecuta los siguientes comandos en la terminal

Clona el proyecto

```bash
  git clone https://github.com/CarlosMontesdeoca/challenge-abitmedia-app
```

Muevete a la dirección del proyecto

```bash
  cd challenge-abitmedia-app
```

Intala las dependencias

```bash
  composer install
```

Crea variables de entorno (para Windows)

```bash
  copy .env.example .env
  
```

### 2 Configuración

Abre el proyecto en el editor de tu prefenrencia para los siguientes pasos:

#### a) configura el directorio .env 
busca la siguiente sección y cambia las credenciales segun tengas configurado MySQL

Recuerda (DB_DATABASE = abitmedia) sera el nombre de la base de datos que usaremos para este proyecto.

```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=abitmedia
  DB_USERNAME=root
  DB_PASSWORD=
```

Regresa a la terminal donde tengas abierto el proyecto y ejecuta el siguiente comando (para generar llaves de seguridad)

```bash
  php artisan jwt:secret
```

#### Configuracion de MySQL

Inicia los servicios de MySQL y Apache, abre XAMPP e inicia los servicios 

Ingresa a MySQL desde el navegador

```bash
  http://127.0.0.1/phpmyadmin/
```

En la sección de Bases de Datos crea una llamada (abitmedia)

Listo nuestra Api esta lista para trabajar  y se encuentra en linea, lo puedes comprobar ingresando por el navegador 

```bash
  http://127.0.0.1

  o
  
  http://localhost
  
```
### 3 Insertar Datos

El Api esta funcionando pero aun no tenemos datos para iniciar las pruebas

regresa a la terminal donde se ubica el proyecto.

#### a) Ejecuta las migraciones 
Crearemos las tablas sus claves y reglas. [ver](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/tree/master/database/migrations).

```bash
  php artisan migrate --seed
```

Este comando tambien ayudara creando:
 
 - usuario de prueba:
  Ayudara a acceder a las funciones CRUD ya que las rutas están protegidas.

 - Categorías:
Ayudan a agrupar cada producto por su tipo (Servicio, antivirus, ofimática, ...)
 - Productos
Tiene la descripción y precios de cada producto o servicio.
 - Licencias
son las licencias de software disponibles.
