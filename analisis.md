# ANALISIS
_El analisis realizado contiempla el desarrollo de una solución que permita registrar y verificar la asistencia de los empleados de manera diaria, utilizando llamadas telefónicas a los encargados de cada centro de trabajo segun la planificacion mensual. A continuación, se presenta el analisis realizado._

## Tablas de Almacenamiento
### Tabla Statuses
_La tabla statuses no servira para crear los posibles estados que pueda tener un empleado al momento de la asistencia por ejemplo: Presente, Ausente, Permiso, Llego tarde._

#### Estructura de la tabla

| STATUS_ID  | NAME |
| ------------- | ------------- |
| 1  | Presente  |
|

### Tabla Departments
_La tabla departments no servira para crear los departamentos de la organizaccion._

#### Estructura de la tabla

| DEPARTMENT_ID  | CODE | NAME | DESCRIPTION |
| ------------- | ------------- | ------------- | ------------- |
| 1  | IT  | INFORMATICA| ARE DE TECNOLOGIAS DE LA INFORMACION|
|

### Tabla Workplaces
_La tabla workplaces no servira para crear los diferentes centros de trabajo de la organizaccion. El campo employee_id puede ser null._

#### Estructura de la tabla

| WORKPLACE_ID  | NAME | MANAGER_ID |
| ------------- | ------------- |------------|
| 1  | GUATEMALA  | 1          |
|

### Tabla Employees
_La tabla employees nos servira para crear los empleados de la organizaccion._

#### Estructura de la tabla

| EMPLOYEE_ID  | CODE | NAME | SURNAME | BIRHDATE| PHONE_NUMBER | DEPARTMENT_ID | WORKPLACE_ID |
| ------------- | ------------- | ------------- | ------------- | ------------- | ------------- | ------------- | ------------- |
| 1  | EMP-001  | WALTER | BAMAC | 12/12/1995 | 4545-4534 | 1 | 1 |
|

### Tabla Managers
_La tabla managers nos servira para crear los managers que estaran a cargo del area de trabajo de la organizaccion._

#### Estructura de la tabla

| MANAGER_ID | NAME  | SURNAME  | PHONE_NUMBER | 
| ------------- |-------|----------|--------------|
| 1          | PEDRO | ALVARADP | 25256565     |
|

### Tabla Attendances
_La tabla attendances no servira para llevar el registro de los empleados de la organizaccion._

#### Estructura de la tabla

| ATTENDANCES_ID  | DATE | EMPLOYE_ID | STATUS_ID |
| ------------- | ------------- | ------------- | ------------- | 
| 1  | 21/06/2023 | 1 | 1 | 
|

## Procesos
### Registro de Departamentos
* El encargado del sistema debera registrar o actualizar los departamentos de la organizacion.

### Registro de Estados
* El encargado del sistema debera registrar o actualizar los status que puede tener un empleado al momento de realizar la asistencia.

### Registro de Areas de trabajo
* El encargado del sistema debera registrar o actualizar los workplaces que se puede asignar a un empleado dentro de la organizacion.

### Registro de Empleados
* El encargado del sistema debera registrar o actualizar los empleados dentro de la organizacion.

* El encargado del sistema puede actualizar el departamento o el lugar de trabajo.

### Registro de Asistencia
* El encargado del sistema debera utilizar la pantalla de registro de asistencia diaria, el encargado marca el estado correspondiente para cada empleado y día.

* La información se almacena en la tabla Attendances junto con el ID, ID del empleado, la fecha y el estado de asistencia.

### Reportes de Asistencias
* Los supervisores y gerentes pueden acceder a la pantalla de consulta de asistencia y seleccionar un rango de fechas para generar un reporte o poder visualizarlo en pantalla.

* El sistema muestra la lista de empleados y su estado de asistencia para cada día dentro del rango especificado.

## Pantallas de operación
_Las pantallas que se consideran que se deben implementar en el sistema son los siguientes._

### Pantalla de Departamentos
* Permite al encargado del sistema listar, registrar, actualizar y eliminar departamentos.
![Image text](https://github.com/wae98/AttendanceEmployees/blob/main/images/departments.png)

### Pantalla de Estados
* Permite al encargado del sistema listar, registrar, actualizar y eliminar status.
  ![Image text](https://github.com/wae98/AttendanceEmployees/blob/main/images/statuses.png)

### Pantalla de Areas de Trabajo
* Permite al encargado del sistema listar, registrar, actualizar y eliminar areas de tranajo.
  ![Image text](https://github.com/wae98/AttendanceEmployees/blob/main/images/workplaces.png)

### Pantalla de Empleados
* Permite al encargado del sistema listar, registrar, actualizar y eliminar empleados.
  ![Image text](https://github.com/wae98/AttendanceEmployees/blob/main/images/employees.png)


### Pantalla de registro de asistencia diaria (Attendances)
* Permite al encargado del centro de trabajo registrar la asistencia de los empleados mediante una interfaz sencilla.

* Lista los empleados asignados al centro de trabajo y permite marcar su estado de asistencia para cada día.
  ![Image text](https://github.com/wae98/AttendanceEmployees/blob/main/images/attendances.png)
### Reporte de asistencia diaria (Attendances)
* Permite a los supervisores y gerentes visualizar la asistencia registrada por cada empleado en un rango de fechas seleccionado.



## Consultas al encargado del proceso
* ¿Cuál es el flujo actual para verificar la asistencia de los empleados mediante llamadas telefónicas?
* ¿Qué información específica se necesita recopilar durante estas llamadas para verificar la asistencia?
* ¿Actualmente manejan algun tipo de registo como excel?
* ¿Actualmente manejan algun tipo de registo como excel?


## Suposiciones
* Los empleados están asignados a un único departamento.
* Los empleados están asignados a un único area de trabajo.
* Cada centro de trabajo tiene un encargado responsable de verificar la asistencia de los empleados.
* Cada asistencia tiene un empleado unico y un status unico.


## ERD
A continuacion, se presenta un diagrama entidad relacion segun los requerimientos solicitados.
![Image text](https://github.com/wae98/AttendanceEmployees/blob/main/images/ERD.png)
