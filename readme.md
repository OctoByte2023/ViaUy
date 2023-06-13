# Proyecto Via UY

Este proyecto es una versión de pruebas de Via UY, una aplicación relacionada con la gestión de autobuses. A continuación, se explica cómo configurar y ejecutar el proyecto en tu entorno local.

## Requisitos

- XAMPP: Asegúrate de tener instalado XAMPP en tu máquina. Puedes descargarlo desde el sitio oficial: https://www.apachefriends.org/index.html

## Instalación

1. Descarga el proyecto Via UY desde [repositorio GitHub](https://github.com/OctoByte2023/ViaUy).
2. Descomprime el archivo ZIP en el directorio `htdocs` de tu instalación de XAMPP. Por ejemplo, en Windows, el directorio podría ser `C:\xampp\htdocs\via_uy`.

## Configuración de la base de datos

1. Abre tu navegador web y accede a `http://localhost/phpmyadmin`.
2. Crea una nueva base de datos llamada `pruebas`.
3. Dentro de la base de datos `pruebas`, crea una tabla llamada `buses` con los siguientes campos:
   - `id` (int, auto incrementable)
   - `modelo` (varchar(50))

## Uso

1. Inicia XAMPP y asegúrate de que los servicios de Apache y MySQL estén activos.
2. Abre tu navegador web y accede a `http://localhost/via_uy`.
3. Explora y prueba las diferentes funcionalidades de la aplicación.

## Notas

- Este proyecto es solo una versión de pruebas y puede contener errores o funcionalidades incompletas.
- Si deseas realizar pruebas adicionales, puedes modificar el código fuente según tus necesidades.

