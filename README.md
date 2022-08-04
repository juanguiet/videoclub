# Video Club

## Contenido

- [Acerca del proyecto](#acerca-del-proyecto)
- [Tecnologías y herramientas](#tecnologías-y-herramientas)
- [Instalación de tecnologías y herramientas](#instalación-de-tecnologías-y-herramientas)
- [Ejecución](#ejecución)

<br>

## Acerca del proyecto

Este proyecto esta desarrollado usando el framework de php Laravel y la base de datos con MySQL.

<br>

## Tecnologías y herramientas

Se especifican las herramientas y tecnologías usadas para el desarrollo del proyecto.

- PHP 8.0
- MySQL
- Composer
- Laravel framework 9
- Visual Studio Code
- JMeter
- Postman

<br>

## Instalación de tecnologías y herramientas

Se debe tener las siguientes tecnologías y herramientas instaladas en en el entorno de desarrollo local para poder correr el proyecto.

| Requiere      |  |
|---------------| ------ |
| Git                                             | https://git-scm.com/downloads |
| XAMPP <small>(Tener en cuenta la versión mínima de PHP 8.0)<small>   | https://www.apachefriends.org/download.html |
| Composer                                        | https://getcomposer.org/download/ |
| VS Code                                         | https://code.visualstudio.com/download |
| Postman                                         | https://www.postman.com/downloads/ |

<br>

## Ejecución

Para la ejecución del proyecto se van a especificar los siguientes pasos:

### 1. Abrir xampp

Una vez abierto el XAMPP, buscamos el archivo php.ini, luego dentro del archivo buscamos la extensión gd (extension=gd) que esta comentada, la vamos a descomentar quitando el ;. Luego se inicia el servicio de MySQL. 

### 2. Descarga proyecto repositorio y de dependencias

Abrir la consola "git bash" y nos dirigimos la ruta donde se quiere guardar el proyecto, una vez en la ruta copiamos y pegamos la siguiente línea en la consola de git:

```sh
$ git clone https://github.com/juanguiet/videoclub.git
```

Una vez descargado navegamos hasta la carpeta del protecto.

```sh
$ cd videoclub
```

Una vez en la carpeta raíz del proyecto se ejecuta el comando

```sh
$ Composer update
```

### 3. Crear base de datos y exportar

En la shell que provee XAMPP (Hacer click ene l botón ubicado en la parte derecha con el nombre Shell) la abrimos y nos autenticamos con el comando 

```sh
$ mysql -u root
```

Luego de estar autenticados vamos a crear la base con el siguiente comando

```sh
$ CREATE DATABASE videoclub
```

Ahora seleccionamos la base de datos con el comando

```sh
$ USE prueba
```

Por último exportamos la base de datos ejecutando el comando. El `<path>` es la ruta donde esta alojado el proyecto.

```sh
$ SOURCE <path>/videoclub/database/sql/videoclub.sql
```

### 4. Ejecutar el proyecto

Una vez el servicio de MySQL se este ejecutando, levantamos el servicio de laravel, para ello en la carpeta raíz del proyecto ejecutamos el siguiente comando en la terminal.

```sh
$ php artisan serve
```