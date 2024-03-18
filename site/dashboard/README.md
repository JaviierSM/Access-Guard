# Dashboard de AccessGuard

Este dashboard proporciona métricas detalladas sobre los accesos de los usuarios registrados en AccessGuard.

## Funcionalidades

- Visualización de métricas de acceso, incluyendo número de accesos, horarios más concurridos, y más.
- Filtrado y búsqueda de registros de acceso por usuario, fecha, y otros criterios.
- Interfaz intuitiva y fácil de usar para administradores.

## Requisitos

- PHP 7.0 o superior
- [Composer](https://getcomposer.org/)
- [kreait/firebase-php](https://github.com/kreait/firebase-php)

## Instalación

1. Clona este repositorio en tu servidor web:

```bash
git clone https://github.com/JaviierSM/Access-Guard
```

2. Navega hasta la carpeta `dashboard`:

```bash
cd dashboard
```

3. Instala las dependencias de PHP utilizando Composer:

```bash
composer require kreait/firebase-php
```

4. Configura tu base de datos y Firebase credentials según lo especificado en `config.php`.

5. Accede al dashboard desde tu navegador web:

http://localhost/accessguard-dashboard/dashboard/index.php

## Contribución

Si quieres contribuir a este proyecto, por favor sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama para tu funcionalidad (`git checkout -b feature/nueva-funcionalidad`).
3. Haz tus cambios y commitea (`git commit -am 'Añade nueva funcionalidad'`).
4. Sube tus cambios a tu repositorio (`git push origin feature/nueva-funcionalidad`).
5. Crea un nuevo pull request.
6. Espera la revisión y aprobación de tu pull request.
