# Konecta

## Instalacion
- PHP 8.2.4 o superior
- MySQL/MariaDB
## Consultas
- SELECT productos.Nombre FROM `productos` ORDER BY productos.Stock DESC LIMIT 1;
- SELECT producto_id, SUM(unidades) AS unidadesTotales FROM ventas GROUP BY ventas.producto_id ORDER BY unidadesTotales DESC LIMIT 1;