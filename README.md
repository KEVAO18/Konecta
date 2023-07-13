# Konecta

  

## Instalacion

- PHP 8.2.4 o superior

- MySQL/MariaDB 5.2.1 o superior

- Composer

  

### Paso a paso:
cambiar el valor de `PAGE_SERVE` por la ubicacion del fichero en el que se encuentra el sistema y configurar los datos para conectarse al servidor mysql

Ejecutar el comando 
```bash 
composer require vlucas/phpdotenv 
```
 para poder hacer uso del archovo .env y ejecutar el comando:
```bash 
 composer require twbs/bootstrap:5.3.0
``` 
para poder usar la version 5.3 de bootstrap.

Ahora proceda crear la base de datos 
```sql 
CREATE DATABASE konectadb;
```
e importar la base de datos incluida en el fichero raiz

## Consultas

```sql 
SELECT productos.Nombre FROM `productos` ORDER BY productos.Stock DESC LIMIT 1;
```

```sql 
SELECT producto_id, SUM(unidades) AS unidadesTotales FROM ventas GROUP BY ventas.producto_id ORDER BY unidadesTotales DESC LIMIT 1;
```

## Notas
- [Hoja de vida actualizada](http://kevaodv.tech/assets/docs/CV1.pdf)
- [Portfolio](http://kevaodv.tech/home)