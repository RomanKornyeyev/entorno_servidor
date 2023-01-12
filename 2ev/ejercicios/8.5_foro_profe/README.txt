# 2223-linkenin

## Instalación

Crear base de datos
```
CREATE DATABASE linkenin; //NB BASE DE DATOS
CREATE USER 'linkenin'@'localhost' IDENTIFIED BY 'linkenin'; //NB USUARIO - CONTRASEÑA (IDENTIFIED)
GRANT ALL PRIVILEGES ON linkenin.* TO 'linkenin'@'localhost' WITH GRANT OPTION; //CONCEDER TODOS LOS PRIVILEGIOS AL USUARIO EXAMEN SOBRE LA BASE DE DATOS
```

Comenzar aplicación en limpio
```
mysql -u linkenin -p linkenin < scripts/db.create.sql
```

Cargar ejemplos
```
mysql -u linkenin -p linkenin < scripts/db.ejemplos.sql

```

INICIAR EL SERVER DE DESARROLLO FÁCIL (desde la carpeta del foro_profe)
```
chmod u+x rundevserver.sh 
ejemplo: ./rundevserver.sh 9000
```
