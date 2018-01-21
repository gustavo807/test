<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>



## Instalación Proyecto

Después de descargar el proyecto entramos a este.

- $ cd test

## Ejecutamos el siguiente comando.

- $ composer install

### Modificamos el nombre del archivo .env.example. por .env y agregamos nuestras credenciales.

## Debemos generar una key para nuestra app.

- $ php artisan key:generate

### Creamos la base de datos en phpMyAdmin y ejecutamos el comando para correr las migraciones

- $ php artisan migrate

## Ejecutamos el proyecto

- $ php artisan serve


### Parte 2: Entramos a phpMyAdmin para agregar los siguientes queries

```sql
INSERT INTO salesperson(id, name, age, salary) VALUES ( 1, 'Abe', '61', '140000' ) , ( 2, 'Bob', '34', '44000' ) , ( 5, 'Chris', '34', '40000' ) , ( 7, 'Dan', '41', '52000' ) , ( 8, 'Ken', '57', '115000' ) , ( 11, 'Joe', '38', '38000' ) ; 

INSERT INTO customer(id, name, city, industryType) VALUES ( 4, 'Samsonic', 'pleasant', 'J' ) , ( 6, 'Panasung', 'oaktown', 'J' ) , ( 7, 'Samony', 'jackson', 'B' ) , ( 9, 'Orange', 'jackson', 'B' ) ; 

INSERT INTO orders(number, order_date, cust_id, salesperson_id, amount) VALUES ( '10', '8/2/96', '4', '2', '540' ) , ( '20', '1/30/99', '4', '8', '1800' ) , ( '30', '7/14/95', '9', '1', '460' ) , ( '40', '1/29/98', '7', '2', '2400' ) , ( '50', '2/3/98', '6', '7', '600' ) , ( '60', '3/2/98', '6', '7', '720' ) , ( '70', '5/6/98', '9', '7', '150' ) ;
```

- a. The names of all salespeople that have an order with Samsonic.
```sql
SELECT s.name FROM salesperson s WHERE s.id IN 
  ( SELECT o.salesperson_id FROM orders o WHERE o.cust_id IN 
      ( SELECT c.id FROM customer c WHERE c.name = 'Samsonic' ) ) ; 
```

- b. The names of all salespeople that do not have any order with Samsonic.
```sql
SELECT s.name FROM salesperson s WHERE s.id IN 
    ( SELECT o.salesperson_id FROM orders o WHERE o.cust_id IN 
        ( SELECT c.id FROM customer c WHERE NOT c.name = 'Samsonic' ) ) ; 
```

- c. The names of salespeople that have 2 or more orders.
```sql
SELECT s.name FROM salesperson s WHERE s.id IN 
    ( SELECT o.salesperson_id FROM orders o 
      GROUP BY o.salesperson_id 
      HAVING COUNT(o.salesperson_id) >= 2 ) ; 
```

- d. Write a SQL statement to insert rows into a table called highAchiever (Name, Age), where a salesperson must have a salary of 100,000 or greater to be included in the table.
```sql
INSERT INTO high_achiever(name, age) 
    ( SELECT s.name, s.age FROM salesperson s 
      WHERE s.salary >= 100000);
```
