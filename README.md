
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

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/xaamp.PNG)

Ingresa a MySQL desde el navegador

```bash
  http://127.0.0.1/phpmyadmin/
```

En la sección de Bases de Datos crea una llamada (abitmedia)

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/mysql.PNG)

Listo nuestra Api esta lista para trabajar  y se encuentra en linea, lo puedes comprobar ingresando por el navegador 

```bash
  http://127.0.0.1/challenge-abitmedia-app/public

  o
  
  http://localhost/challenge-abitmedia-app/public
  
```
![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/api.PNG)

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

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/tablas.PNG)

# Como usar (Consultas Api)

### Rutas
El api consta de 13 rutas de las cuales una es publica y las otras 12 estan protegidas por autenticación, [ver](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/routes/api.php).

Para este ejemplo debes agregar (/api/<<nombre de ruta >>) en la dirección del servidor.
```bash
   http://127.0.0.1/challenge-abitmedia-app/public/api/login
```
#### Nota:  las siguientes pruebas se realizaron con [Postman](https://www.postman.com/downloads/)

### 1. Autenticación
Para autenticarte en el sistema se creo un usuario de prueba 
  
- Usuario:  pruebas@algo.com
- Clave: 123123

Ingresa la ruta con un POST:
```bash
   http://127.0.0.1/challenge-abitmedia-app/public/api/login
```
Dentro del cuerpo ingresa:
```bash
    {
        "email" : "pruebas@algo.com",
        "password": "123123"
    }
```

#### token
El APi te retornara un token que sera la llave de acceso para las siguientes rutas.

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/login.PNG)

#### Nota: para las siguientes rutas es importante agregar a la cabecera de las consultas el parametro de autenticación, usando como balor: Bearer + <<token>>

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/auth.PNG)

## 2. Categorias [ver](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/app/Http/Controllers/CategoryController.php)

### 2.1. Get

Para consultar el listado de todas las categorias existentes ingresa:
```bash
http://127.0.0.1/challenge-abitmedia-app/public/api/categories
```

#### Respuesta

El Api respondera con una lista de las categorias y la ruta para acceder a sus productos asociados.

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/category.PNG)

### 2.2. Post

Para crear una nueva categoría:
```bash
http://127.0.0.1/challenge-abitmedia-app/public/api/categories
```
En el cuerpo de la consulta ingresar (name) es irrepetible
```bash
{
    "name" : "PAGINA WEB"
}
```

#### Respuesta

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/category-post.PNG)

### 2.3. PUT

Para editar una categoria, asegurate de cambiar <<id>> por el valor de la categoria respectiva:

```bash
http://127.0.0.1/challenge-abitmedia-app/public/api/category/<<id>>
```
En el cuerpo de la consulta ingresar (name) es irrepetible
```bash
{
    "name" : "PAGINA WEB EDITADA"
}
```

#### Respuesta

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/category-put.PNG)

### 2.4. DELETE

Para eliminar una categoria, asegurate de cambiar <<id>> por el valor de la categoria respectiva:

```bash
http://127.0.0.1/challenge-abitmedia-app/public/api/category/<<id>>
```

#### Respuesta.

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/category-del.PNG)

## 3. Productos [ver](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/app/Http/Controllers/ProductController.php)

### 3.1. Get

Para consultar el listado de todos los productos de una categoría, asegurate de cambiar <<category_id>> por el id de la categoría deseada:
```bash
http://127.0.0.1/challenge-abitmedia-app/public/api/category/<<category_id>>/products
```

#### Respuesta

El Api respondera con una lista de los productos y la ruta para acceder a sus licencias disponibles, solo si es de categoria de SERVICIO se mostrara en valor nulo.

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/product.PNG)

### 3.2. Post

Para crear un nuevo producto:
```bash
http://127.0.0.1/challenge-abitmedia-app/public/api/products
```
En el cuerpo de la consulta ingresar (sku) es irrepetible y solo admite 10 caracteres
```bash
{
    "sku" : "0010113368",
    "category_id": 3,
    "desc": "Licencia empresarial para Mac",
    "price": 120
}
```

#### Respuesta


![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/product-post.PNG)

### 3.3. PUT

Para editar un producto, asegurate de cambiar <<id>> por el valor de la categoria respectiva:

```bash
http://127.0.0.1/challenge-abitmedia-app/public/api/products/<<id>>
```
```bash
{
    "sku" : "0010113368",
    "category_id": 3,
    "desc": "Licencia empresarial para Windows",
    "price": 120
}
```

#### Respuesta

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/product-put.PNG)

### 3.4. DELETE

Para eliminar un producto, asegurate de cambiar <<id>> por el valor del producto respectiv0:

```bash
http://127.0.0.1/challenge-abitmedia-app/public/api/products/<<id>>
```

#### Respuesta.

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/product-del.PNG)
## 4. Licencias [ver](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/app/Http/Controllers/ProductController.php)

### 4.1. Get

Para consultar el listado de todos las licencias de una categoría, asegurate de cambiar <<product_id>> por el id del producto deseada:
```bash
http://127.0.0.1/challenge-abitmedia-app/public/api/product/<<product_id>>/licenses
```

#### Respuesta

El Api respondera con una lista de las licencias.

#### Nota: mostrara el serial unico de 100 digitos, acompañado de client que sera el nombre del cliente que se vendio la licencia, y el estado A para licencias disponibles e I para licencias vendidas.

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/lisence.PNG)

### 4.2. Post

Para crear un nuevas licencias:
```bash
http://127.0.0.1/challenge-abitmedia-app/public/api/licenses
```
En el cuerpo de la consulta ingresar cant que es el número de licencias nuevas a ingresar y el id del producto al que se desea asignar
```bash
{
    "cant": 5,
    "product_id": 5
}
```

#### Respuesta

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/lisence-post.PNG)

### 4.3. PUT

Para editar o vender licencias, asegurate de cambiar <<product_id>> por el valor del producto respectiva:

```bash
http://127.0.0.1/challenge-abitmedia-app/public/api/product/<<product_id>>/licenses
```
```bash
{
    "cant": 15,
    "client": "SUPERMAXI"
}
```
#### Nota:  el sistema identificara que la cantidad deseada no supere las licencias disponibles.

#### Respuesta

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/lisence-put.PNG)

### 4.4. DELETE

Para eliminar una licencia, asegurate de cambiar <<id>> por el valor de la licencia respectiva:

```bash
http://127.0.0.1/challenge-abitmedia-app/public/api/licenses/<<id>>
```

#### Respuesta.

![imagen](https://github.com/CarlosMontesdeoca/challenge-abitmedia-app/blob/master/images/lisence-del.PNG)

### Nota Importante
las rutas de las licencias se gestionan de forma diferente ya que se asume que las licencias no pueden modificarse ya que sus numeros seriales de 100 caracteres se generan automaticamente.