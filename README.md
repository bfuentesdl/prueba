# Aplicación Concesionaria de Vehículos

## Descripción

Esta aplicación web permite gestionar vehículos y reservas de manera sencilla. Se implementó un CRUD funcional para vehículos y reservas, con filtros, navegación rápida y preselección de vehículos al crear reservas.

---

## Requisitos Previos

Antes de ejecutar la aplicación, asegúrate de tener:

* PHP ≥ 8.0
* Composer
* MySQL / MariaDB
* Laravel 10

---

## Configuración de Base de Datos

1. Crear la base de datos `prueba` en MySQL Workbench:

```sql
CREATE DATABASE prueba;
```

2. Configurar el archivo `.env` con los datos de conexión:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=prueba
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

---

## Instalación del Proyecto

1. Clonar el repositorio:

```bash
git clone https://github.com/bfuentesdl/prueba.git
cd prueba
```

2. Ejecutar las migraciones:

```bash
php artisan migrate
```

> Las migraciones crean las tablas `vehiculos` y `reservas`.

---

## Ejecutar la Aplicación

Levantar el servidor local:

```bash
php artisan serve
```

Abrir en el navegador: [http://127.0.0.1:8000/vehiculos]

---

## Funcionalidades

### CRUD de Vehículos

* Lista todos los vehículos con filtros por marca y modelo.
* Crear, editar y eliminar vehículos.
* Botón “Reservar” que preselecciona el vehículo en el formulario de reservas.

### CRUD de Reservas

* Lista todas las reservas (cliente, vehículo y fecha).
* Crear, editar y eliminar reservas.
* Filtrado por cliente y vehículo.
* Por cuestión de tiempo, los clientes se agregan manualmente en el formulario de reserva; lo ideal sería integrarlo con una tabla de clientes similar a la de vehículos.

### Navegación Rápida

* Botones en reservas:

  * Ver Vehículos
  * Agregar Vehículo
  * Volver a Reservas
* Permite moverse fácilmente entre módulos.

### Validaciones

* Campos obligatorios (`required`)
* Confirmaciones antes de eliminar registros

---

## Mejoras y Recomendaciones

* Agregar autenticación de usuarios.
* Crear CRUD de clientes y relacionarlo con reservas.
* Mejorar UX/UI con modales, notificaciones y estilos.
* Integrar funcionalidades futuras de cotización, pagos o seguros.

---

## Resumen

Esta aplicación es un piloto funcional que demuestra:

* Gestión completa de vehículos y reservas
* Filtros en tablas
* Preselección automática de vehículos al reservar
* Navegación sencilla y clara
* Validaciones y confirmaciones básicas

Es una base sólida para escalar e integrar más módulos del ERP de la concesionaria.
