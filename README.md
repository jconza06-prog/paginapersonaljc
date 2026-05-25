# Página Web Personal y Formulario de Contacto

## Descripción del Proyecto
Este proyecto consiste en una página web personal que incluye una biografía detallada, portafolio académico y un sistema dinámico de contacto. El sistema está desarrollado con una arquitectura backend robusta para capturar, validar y almacenar mensajes de usuarios de manera persistente.

### Características Principales:
Diseño Adaptable: Interfaz limpia y estilizada mediante CSS.
Procesamiento de Datos: Backend desarrollado en PHP para la recepción segura de formularios mediante el método POST.
Sanitización Automática: Rutinas de código que corrigen el formato de nombres (Capitalización automática) y limpian los campos contra inyecciones básicas.
Persistencia de Datos: Integración completa con una base de datos MySQL relacional.

## Tecnologías Utilizadas
Frontend: HTML5, CSS (Variables globales y degradados avanzados).
Backend: PHP 
Base de Datos: MySQL / phpMyAdmin.
Entorno Local: XAMPP Control Panel.

## Instrucciones para Uso Local

### Requisitos Previos:
1. Tener instalado un servidor local como XAMPP.
2. Configurar el servicio de MySQL para que se ejecute de manera correcta (en caso de conflicto de puertos, el entorno local está configurado bajo el puerto alterno `3307`).

### Pasos para la Instalación:
1. Clone este repositorio o descargue los archivos dentro del directorio raíz de su servidor local (ej. `C:\xampp\htdocs\paginapersonal\`).
2. Acceda a su panel de phpMyAdmin local.
3. Cree una base de datos llamada `paginapersonal`.
4. Cree una tabla llamada `mensajes` con la siguiente estructura de campos:
   * `id` (INT, Clave primaria, Auto_increment)
   * `nombre` (VARCHAR 100)
   * `correo` (VARCHAR 100)
   * `mensaje` (TEXT)
5. Asegúrese de que las credenciales de conexión en el archivo `contacto.php` coincidan con los parámetros de autenticación y contraseña de su servidor local.
6. Abra su navegador e ingrese a la ruta local: `http://localhost/paginapersonal/descripciondemi/contacto.php`.

## 🌐 Enlace al Hosting en Línea
Hosting: http://paginapersonaljc.great-site.net 
