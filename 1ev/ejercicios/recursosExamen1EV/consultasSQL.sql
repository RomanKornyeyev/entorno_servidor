--Tema 8

--ejercicio 1

SELECT * FROM EMPLE WHERE APELLIDO LIKE 'A%' AND OFICIO LIKE '%E%';

-- ejercicio 2

select tema, estante, ejemplares from libreria where ejemplares BETWEEN 8 and 15;

-- ejercicio 3

select * from libreria where estante not between 'B' and 'D';


-- ejercicio 4

select * from libreria where ejemplares not BETWEEN 15 and 20;

-- ¿Cómo se hace para que incluya o no los valores límite?

-- ejercicio 5

select * from emple where oficio = (select oficio from emple where apellido like 'JIMENEZ') or SALARIO >=(select salario from emple where apellido like 'FERNANDEZ');


-- ejercicio 6

select apellido, oficio, salario from emple where (dept_no, salario) in (select dept_no, salario from emple where apellido like 'FERNANDEZ');

--ejercicio 7

select apellido, oficio from emple where oficio in (select oficio from emple where apellido like 'JIMENEZ');


-- EJERCICIO 8

select tema from libreria where ejemplares  <(select ejemplares from libreria where tema = 'medicina');

-- no devuelve resultados a pesar de que debería hacerlo


--combinación de tablas

-- ejercicio 9

select nombre from asignaturas, alumnos, notas where (alumnos.dni = notas.dni and asignaturas.cod = notas.cod) and (nombre like '%o%o%o%' and pobla='Madrid')


--ejercicio 10

select apenom, nombre, nota from alumnos, asignaturas, notas where (alumnos.dni = notas.dni and asignaturas.cod = notas.cod) and (nombre='FOL' and nota between 7 and 8);


--ejercicio 11

select nombre, nota from asignaturas, notas where (asignaturas.cod = notas.cod) and (nota>=5);

--ejercicio 12

select apenom, nombre, nota from alumnos, asignaturas, notas where (alumnos.dni = notas.dni and asignaturas.cod = notas.cod) and (nota<5 and pobla = 'Madrid');

--ejercicio 13

select apenom, nota, nombre from alumnos, notas, asignaturas where (alumnos.dni = notas.dni  and asignaturas.cod = notas.cod) and (nombre='FOL'and nota where )


select nota,nombre, apenom from notas, asignaturas, alumnos where (alumnos.dni = notas.dni) and (nombre like 'FOL' and apenom='DÝaz Fernßndez, MarÝa');

-- incompleta, no consigo sacar el resto de alumnos con las mismas notas.
-- este alumno tiene varias notas


--ejercicio 14

select apellido, oficio, loc, dnombre from emple, depart where (emple.dept_no = depart.dept_no) and (oficio like 'ANALISTA');