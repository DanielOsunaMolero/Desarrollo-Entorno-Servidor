# LISTA DE CONCEPTOS PHP
> Alonso Hernández Robles 2º DAW
> Ver. 25/11/2024 (_Ahora en Markdown!_)

---

## Cabecera

```php
<?php
	// ...
?>
```

```php
<?
	// sólo si short_open_tag=On (php.ini)
?>
```

---

## Comentarios

```php
// Comentario de línea
# Comentario de línea

/* Comentario
de
párrafo
*/
```

## Mensajes

Imprimir texto

```php
echo "Hola Mundo";
echo $mi_variable;
echo "Tengo " . $manzanas . " manzanas.";
echo "Edad: $años";

print("Hola Mundo");
```

Salto de línea

```php
echo "<br>";
```

Cualquier otra etiqueta de HTML

```php
echo "<table>";
echo "<tr><td> XD </td></tr>";
echo "</table>";
```

Ejecutar comando (sintaxis de SO)

```php
echo `ls -la`;	// Mac OS & Linux
echo `dir`;	// Windows
```

Mostrar información completa de variable

```php
var_dump($variable);
```

Mostrar array u objeto

```php
print_r($miArray);
```

---

## Información

Mostrar metadatos útiles de PHP

```php
phpinfo();
```

---

## Constantes

Declarar constante

```php
const PI = 3.141592;
define("PI", 3.141592);
```

¿Está definida la constante?

```php
defined("PI")
```

<details>
	<summary>Ejemplo</summary>

```php
define("ANCHURA", 2.5);

echo defined("ANCHURA") ? "true" : "false";	// true
echo defined("ALTURA");	? "true" : "false";	// false
```
</details>

---

## Variables y Tipos de Datos

Declarar e inicializar variable

```php
$mi_variable = 3;
```

Entero

```php
$mi_variable = 10;
$mi_variable = 0x2A;
```

Booleano

```php
$mi_variable = true;
```

Decimal

```php
$mi_variable = 4.5;
$mi_variable = 7.3e-1;
```

Cadena

```php
$mi_variable = "texto";
```

Nulo

```php
$mi_variable = null;
```

Mixto (en clase; en función)

```php
private mixed $mi_variable;
public function mi_funcion(mixed $mi_variable) {...}
```

### Conversión de Tipos

Obtener tipo de dato de variable (`integer` / `double` / `boolean` / `string` / `null` / `object`)

```php
gettype($variable);
```

Convertir a entero

```php
(int) $variable
```

<details>
	<summary>Ejemplo</summary>

```php
$valor = "123.45";
$entero = (int) $valor;

echo $entero;	// Imprime 123
echo gettype($entero);	// Imprime "integer"
```
</details>

Convertir a decimal

```php
(double) $variable
```

<details>
	<summary>Ejemplo</summary>

```php
$valor = "123";
$doble = (double) $valor;

echo $doble;	// Imprime 123
echo gettype($doble);	// Imprime "double"
```
</details>

Convertir a booleano

```php
(boolean) $variable
```

<details>
	<summary>Ejemplo</summary>

```php
$valor = 0;
$booleano = (boolean) $valor;

echo $booleano ? 'true' : 'false';	// false
echo gettype($booleano);	// Imprime "boolean"
```
</details>

Convertir a cadena

```php
(string) $variable
```

<details>
	<summary>Ejemplo</summary>

```php
$valor = 123;
$cadena = (string) $valor;

echo $cadena;  // Muestra "123"
echo gettype($cadena);	// Imprime "string"
```
</details>

Convertir a array

```php
(array) $variable
```

<details>
	<summary>Ejemplo</summary>

```php
$valor = "texto";
$array = (array) $valor;

print_r($array);	// Imprime "Array ( [0] => texto )"
echo gettype($array);	// Imprime "array"
```
</details>

Convertir a objeto

```php
(object) $variable
```

<details>
	<summary>Ejemplo</summary>

```php
$valor = "texto";
$objeto = (object) $valor;

print_r($objeto);	// Imprime "stdClass Object ( [scalar] => texto )"
echo gettype($objeto);	// Imprime "object"
```
</details>

---

## Operadores

### Operadores Aritméticos

`+` Suma

`-` Resta

`*` Multiplicación

`/` División

`%` Módulo

`**` Potencia

`.` Concatenación

`>>` Bit a la derecha

`<<` Bit a la izquierda

Incremento anterior

```php
++$variable;
```

<details>
	<summary>Ejemplo</summary>

```php
$variable = 1;
echo ++$variable;	// Imprime 2
echo $variable;		// Imprime 2
```
</details>

Incremento posterior

```php
$variable++;
```

<details>
	<summary>Ejemplo</summary>

```php
$variable = 1;
echo $variable++;	// Imprime 1
echo $variable;		// Imprime 2
```
</details>

Decremento anterior

```php
--$variable;
```

<details>
	<summary>Ejemplo</summary>

```php
$variable = 1;
echo --$variable;	// Imprime 0
echo $variable;		// Imprime 0
```
</details>

Decremento posterior

```php
$variable--;
```

<details>
	<summary>Ejemplo</summary>

```php
$variable = 1;
echo $variable--;	// Imprime 1
echo $variable;		// Imprime 0
```
</details>

Sumar valor a variable

```php
$variable += $valor;
```

<details>
	<summary>Ejemplo</summary>

```php
$var = 1;
$var += 1;

echo $var;	// Imprime 2
```
</details>

Restar valor a variable

```php
$variable -= $valor;
```

<details>
	<summary>Ejemplo</summary>

```php
$var = 1;
$var -= 1;

echo $var;	// Imprime 0
```
</details>

Multiplicar valor a variable

```php
$variable *= $valor;
```

<details>
	<summary>Ejemplo</summary>

```php
$var = 2;
$var *= 2;

echo $var;	// Imprime 4
```
</details>

Dividir valor a variable

```php
$variable /= $valor;
```

<details>
	<summary>Ejemplo</summary>

```php
$var = 6;
$var /= 2;

echo $var;	// Imprime 3
```
</details>

Hacer módulo a variable

```php
$variable %= $valor;
```

<details>
	<summary>Ejemplo</summary>

```php
$var = 5;
$var %= 3;

echo $var;	// Imprime 2
```
</details>

Hacer potencia con valor a variable

```php
$variable **= valor;
```

<details>
	<summary>Ejemplo</summary>

```php
$var = 2;
$var **= 3;

echo $var;	// Imprime 8
```
</details>

Concatenar valor (texto) a variable

```php
$variable .= $valor
```

<details>
	<summary>Ejemplo</summary>

```php
$var = "Hola ";
$var .= "mundo";

echo $var;	// Imprime "Hola mundo"
```
</details>

Convertir a entero o decimal si no lo es ya

```php
$variable = +$variable;
```

Multiplicar variable por $2^{valor}$

```php
$variable <<= $valor;
```

Dividir variable por $2^{valor}$

```php
$variable >>= $valor;
```

### Operadores Relacionales

`==` Igual (valores)

`===` Estrictamente igual (valores y tipo)

`!=` / `<>` Distinto

`!==` Estrictamente distinto (valores y tipo)

`>` Mayor

`>=` Mayor o igual

`<` Menor

`<=` Menor o igual

`<=>` Menor (`-1`), igual (`0`) o mayor (`1`)

### Operadores Lógicos

`&&` AND

`||` OR

`!` NOT

`??` OR pero sin lógica (`0` es `true`)

---

## Variables de Variables

Crear variable cuyo nombre es el valor de la variable `$var`

```php
$$var;
```

<details>
	<summary>Ejemplo</summary>

```php
$var = "nombre";
$$var = "Juan";

echo $nombre;  // Imprime "Juan"
```
</details>

---

## Condicionales

### Condicional `if else`

Si se da `condición`, realizar `instrucción`

```php
if(condición) {
	// instrucción
}
if(condición) instruccion();
```

<details>
	<summary>Ejemplo 1</summary>

```php
$edad = 18;

if($edad >= 18) {
	echo "Eres mayor de edad.";
}
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$usuarioActivo = true;
if($usuarioActivo) echo "Usuario activo.";
```
</details>

Si se da `condición`, realizar `1`, si no, `2`.

```php
if(condición){
	// 1
}else{
	// 2
}
```

<details>
	<summary>Ejemplo 1</summary>

```php
$hora = 10;

if($hora < 12) {
	echo "Buenos días";	// Si la hora es antes de las 12
} else {
	echo "Buenas tardes";	// Si la hora es 12 o después
}
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$usuarioAutenticado = false;

if($usuarioAutenticado) {
	echo "Acceso concedido";	// Si el usuario está autenticado
} else {
	echo "Acceso denegado";		// Si el usuario no está autenticado
}
```
</details>

Si se da `condición`, mostrar `1`, si no, `2`.

```php
echo (condición) ? "1" : "2";
```

<details>
	<summary>Ejemplo 1</summary>

```php
echo ($esAdmin) ? "Bienvenido al sistema" : "Acceso denegado";
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$numero = 5;
$resultado = ($numero % 2 == 0) ? "Par" : "Impar";
echo "El número es: $resultado";
```
</details>

Múltiple condición

```php
if(condición1){
	// 1
}else if(condición2){
	// 2
}else if(condición3){
	// 3
}else{
	// Resto
}
```

<details>
	<summary>Ejemplo 1</summary>

```php
$hora = 14;

if($hora < 12) {
	echo "Buenos días";	// Si la hora es antes de las 12
} else if($hora < 18) {
	echo "Buenas tardes";	// Si la hora es entre las 12 y las 18
} else {
	echo "Buenas noches";	// Si la hora es después de las 18
}
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$puntos = 85;

if($puntos >= 90) {
	echo "Excelente";	// Si los puntos son 90 o más
} else if($puntos >= 70) {
	echo "Bueno";		// Si los puntos son 70 o más pero menos de 90
} else if($puntos >= 50) {
	echo "Regular";		// Si los puntos son 50 o más pero menos de 70
} else {
	echo "Insuficiente";	// Si los puntos son menos de 50
}
```
</details>

### Condicional `switch` / `match`

Realizar instrucción dependiendo del valor de `$variable`

```php
switch($variable){
	case 1:
		// 1
		break;
	case 2:
		// 2
		break;
	case 3:
		// 3
		break;
	default:
		// Resto
}
```

<details>
	<summary>Ejemplo 1</summary>

```php
$color = "rojo";

switch($color) {
	case "azul":
		echo "Color azul";
		break;
	case "rojo":
		echo "Color rojo";
		break;
	case "verde":
		echo "Color verde";
		break;
	default:
		echo "Color desconocido";
}
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$edad = 25;

switch($edad) {
	case 18:
		echo "Tienes 18 años.";
		break;
	case 25:
		echo "Tienes 25 años.";
		break;
	case 30:
		echo "Tienes 30 años.";
		break;
	default:
		echo "Edad no específica.";
}
```
</details>

Elemento dependiendo de valor de `$variable`

```php
echo match($variable){
	1 => "Lunes",
	2 => "Martes",
	3 => "Miércoles",
	4 => "Jueves",
	5 => "Viernes",
	6 => "Sábado",
	7 => "Domingo",
	default => "Por defecto"
}
```

---

## Bucles

### Bucle `while`

Repetir `instrucción` mientras se cumpla `condición`

```php
while(condición) {
	// Instrucción
}
```

<details>
	<summary>Ejemplo</summary>

```php
$contador = 1;

while($contador <= 5) {
	echo $contador . "\n";
	$contador++;	// Aumenta el contador en cada iteración
}
```

**Salida**

```
1
2
3
4
5
```
</details>

### Bucle `do while`

Realizar `instrucción` y repetir mientras se cumpla `condición`

```php
do{
	// Instrucción
}while(condición);
```

<details>
	<summary>Ejemplo</summary>

```php
$contador = 1;

do {
	echo $contador . "\n";
	$contador++;	// Aumenta el contador en cada iteración
} while($contador <= 5);
```

**Salida**

```
1
2
3
4
5
```
</details>

### Bucle `for`

Realizar `inicialización` y repetir `instrucción` mientras se cumpla `condición`, y realizar `iteración`

```php
for(inicialización, condición, iteración){
	// Instrucción
}
```

<details>
	<summary>Ejemplo 1</summary>

```php
for($i = 0; $i < 5; $i++) {
	echo $i . "\n";
}
```

**Salida**

```
0
1
2
3
4
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
for($i = 3; $i > 0; $i--) {
	echo $i . "\n";
}
```

**Salida**

```
3
2
1
```
</details>

### Bucle `foreach`

Recorrer array indexado

```php
foreach ($array as $elemento) {
	// Instrucción
}
```

<details>
	<summary>Ejemplo 1</summary>

```php
$numeros = [1, 2, 3, 4, 5];

foreach ($numeros as $numero) {
	echo $numero . "\n";
}
```

**Salida**

```
1
2
3
4
5
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$nombres = ["Pepe", "Lola", "Alex", "Ana", "Javi"];

foreach ($nombres as $nombre) {
	echo $nombre . "\n";
}
```

**Salida**

```
Pepe
Lola
Alex
Ana
Javi
```
</details>

Recorrer array asociativo

```php
foreach ($array as $clave => $valor) {
	// Instrucción
}
```

<details>
	<summary>Ejemplo 1</summary>

```php
$capitales = [
	"España" => "Madrid",
	"Francia" => "París",
	"Portugal" => "Lisboa"
];

foreach ($capitales as $pais => $capital) {
	echo "La capital de " . $pais . " es " . $capital ".\n";
}
```

**Salida**

```
La capital de España es Madrid
La capital de Francia es París
La capital de Portugal es Lisboa
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$array = [
	"nombre" => "Juan",
	"edad" => 30,
	"ciudad" => "Madrid"
];

foreach ($array as $clave => $valor) {
	echo "$clave: $valor\n";
}
```

**Salida**

```
nombre: Juan
edad: 30
ciudad: Madrid
```
</details>

### `break` y `continue`

Salir del bucle

```php
while(condición){
	break;
}
```

<details>
	<summary>Ejemplo</summary>

```php
$numero = 10;
while($numero > 0) {
	if($numero == 5) {
		break;	// Sale del bucle cuando $numero es igual a 5
	}
	echo "Número: $numero\n";
	$numero--;
}
```

**Salida**

```
Número: 10
Número: 9
Número: 8
Número: 7
Número: 6
```
</details>

Ejecutar siguiente iteración del bucle

```php
while(condición){
	continue;
}
```

<details>
	<summary>Ejemplo</summary>

```php
$numero = 10;
while($numero > 0) {
	$numero--;
	if($numero % 2 == 0) {
		continue;	// Salta la iteración cuando $numero es par
	}
	echo "Número impar: $numero\n";
}
```

**Salida**

```
Número impar: 9
Número impar: 7
Número impar: 5
Número impar: 3
Número impar: 1
```
</details>

---

## Referencia de Variables

Crear variable de referencia a variable `$a` llamada `$b`

```php
$b = &$a;
```

<details>
	<summary>Ejemplo 1</summary>

```php
$a = 10;
$b = &$a;	// $b es una referencia a $a
$b = 20;	// Cambia el valor de $b y también el de $a
echo $a;	// Imprime 20, ya que $b y $a apuntan al mismo valor en memoria
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$nombre = "Juan";
$ref = &$nombre;	// $ref es una referencia a $nombre
$ref = "Pedro";		// Cambia el valor de $ref y también el de $nombre
echo $nombre;		// Imprime "Pedro", ya que $ref apunta a $nombre
```
</details>

---

## Funciones de Variables

¿Está inicializada y no es nula la variable?

```php
isset($variable)
```

<details>
	<summary>Ejemplo</summary>

```php
$nombre = "Juan";

if(isset($nombre)) {
	echo "La variable está definida.";
} else {
	echo "La variable no está definida.";
}
```
</details>

¿Existe y está vacía?

```php
empty($variable)
```

<details>
	<summary>Ejemplo</summary>

```php
$variable = "";

if(empty($variable)) {
	echo "La variable está vacía.";
} else {
	echo "La variable no está vacía.";
}
```
</details>

Eliminar variable en memoria

```php
unset($variable);
```

<details>
	<summary>Ejemplo</summary>

```php
$nombre = "Juan";
unset($nombre);  // Elimina la variable $nombre
```
</details>

¿Es `<tipo de dato>`?


```php
is_integer($variable);
is_string($variable);
is_bool($variable);
is_array($variable);
is_double($variable);
is_null($variable);
is_array($variable);
is_object($variable);
```

---

## Funciones de Salida

Salir del script

```php
exit();
exit("Mensaje");

die();
die("Mensaje");
```

Salir del ámbito devolviendo un valor

```php
return $valor;
```

---

## Librerías y Ficheros

Ruta de directorio actual

```php
__DIR__
```

Incluir / Ejecutar `fichero.php` (También devuelve el valor devuelto en su código)

```php
include("fichero.php");
include __DIR__ . "fichero.php";
```

<details>
	<summary>Ejemplo</summary>

**`fichero.php`**

```php
$mensaje = "Hola desde el archivo incluido";
```

**Archivo Principal**

```php
include("fichero.php");
echo $mensaje;	// Imprime "Hola desde el archivo incluido"
```
</details>

Redirigir navegador a `rutaDeArchivo.php` y ejecutar dicho script

```php
header("Location: rutaDeArchivo.php");
```

<details>
	<summary>Ejemplo</summary>

```php
// Instrucciones

header("Location: rutaDeArchivo.php");	// Redirige a 'rutaDeArchivo.php'
exit();	// Es recomendable usar exit después de redirigir
```
</details>

---

## Variables Superglobales

Sanitizar variable de caracteres conflictivos

```php
htmlspecialchars($variable);
```

<details>
	<summary>Ejemplo</summary>

```php
$texto = "<Hola>";
echo htmlspecialchars($texto);	// Imprime "&lt;Hola&gt;"
```
</details>

### Variable `$_POST`

(Array asociativo con claves que son los `name` de un `<form>`)

```php
$_POST
```

Acceder a clave de `$_POST` con `name = "usuario"`

```php
$_POST["usuario"]
```

<details>
	<summary>Ejemplo 1</summary>

**`index.html`**

```html
<html>
	<head>
		<title>Ejemplo 1</title>
	</head>
	<body>
		<form method="post" action="index.php">
			<input type="text" name="nombre"/>
			<input type="submit"/>
		</form>
	</body>
</html>
```

**`index.php`**

```php
$nombre = $_POST["nombre"];
echo "Hola, " . $nombre;
```
</details>

<details>
	<summary>Ejemplo 2</summary>

**`index.html`**

```html
<html>
	<head>
		<title>Ejemplo 2</title>
	</head>
	<body>
		<form method="post" action="index.php">
			<input type="email" name="email"/>
			<input type="submit"/>
		</form>
	</body>
</html>
```

**`index.php`**

```php
if(isset($_POST["email"]) && !empty($_POST["email"])) {
	echo "El email es: " . $_POST["email"];
} else {
	echo "No se ha enviado un email.";
}
```
</details>

<details>
	<summary>Ejemplo 3</summary>

**`index.html`**

```html
<html>
	<head>
		<title>Ejemplo 3</title>
	</head>
	<body>
		<form method="post" action="index.php">
			<label for="nombre">Nombre:</label>
			<input type="text" name="nombre" required/>
			<br>
			<label for="apellido">Apellido:</label>
			<input type="text" name="apellido" required/>
			<br>
			<label for="edad">Edad:</label>
			<input type="number" name="edad" required/>
			<br>
			<input type="submit" value="Enviar"/>
		</form>
	</body>
</html>
```

**`index.php`**

```php
if(!isset($_POST["nombre"]) || empty($_POST["nombre"])) exit();
if(!isset($_POST["apellido"]) || empty($_POST["apellido"])) exit();
if(!isset($_POST["edad"]) || empty($_POST["edad"])) exit();

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$edad = $_POST["edad"];

echo "Hola, $nombre $apellido. Tienes $edad años.";
```
</details>

<details>
	<summary>Ejemplo 4</summary>

**`index.html`**

```html
<html>
	<head>
		<title>Ejemplo 4</title>
	</head>
	<body>
		<form method="post" action="index.php">
			<label for="usuario">Usuario:</label>
			<input type="text" name="usuario" required/>
			<br>
			<label for="password">Contraseña:</label>
			<input type="password" name="password" required/>
			<br>
			<label for="remember">Recordarme</label>
			<input type="checkbox" name="remember" value="1"/>
			<br>
			<input type="submit" value="Iniciar sesión"/>
		</form>
	</body>
</html>
```

**`index.php`**

```php
if(!isset($_POST["usuario"]) || empty($_POST["usuario"])) exit();
if(!isset($_POST["password"]) || empty($_POST["password"])) exit();

$usuario = $_POST["usuario"];
$password = $_POST["password"];

// Validación simple
if($usuario == "admin" && $password == "1234") {
	echo "Bienvenido, $usuario!";
	if(isset($_POST["remember"]) && $_POST["remember"] == "1") {
		echo " Has elegido recordar tu sesión.";
	}
} else {
	echo "Usuario o contraseña incorrectos.";
}
```
</details>

### Variable `$_GET`

(Array asociativo con claves al igual que `$_POST`, pero mostradas en la URL)

```php
$_GET
```

Acceder a clave de `$_GET` con `name = "clave"`

```php
$_GET["clave"]
```

<details>
	<summary>Ejemplo 1</summary>

**`index.html`**

```html
<html>
	<head>
		<title>Ejemplo 1</title>
	</head>
	<body>
		<form method="get" action="index.php">
			<input type="text" name="nombre"/>
			<input type="submit"/>
		</form>
	</body>
</html>
```

**`index.php`**

```php
$nombre = $_GET["nombre"];
echo "Hola, " . $nombre;
```
</details>

<details>
	<summary>Ejemplo 2</summary>

**`index.html`**

```html
<html>
	<head>
		<title>Ejemplo 2</title>
	</head>
	<body>
		<form method="get" action="index.php">
			<input type="email" name="email"/>
			<input type="submit"/>
		</form>
	</body>
</html>
```

**`index.php`**

```php
if(!isset($_GET["email"]) || empty($_GET["email"])) {
	echo "No se ha enviado un email.";
	exit();
}

$email = $_GET["email"];
echo "El email es: " . $email;
```
</details>

<details>
	<summary>Ejemplo 3</summary>

**`index.html`**

```html
<html>
	<head>
		<title>Ejemplo 3</title>
	</head>
	<body>
		<form method="get" action="index.php">
			<label for="nombre">Nombre:</label>
			<input type="text" name="nombre" required/>
			<br>
			<label for="apellido">Apellido:</label>
			<input type="text" name="apellido" required/>
			<br>
			<label for="edad">Edad:</label>
			<input type="number" name="edad" required/>
			<br>
			<input type="submit" value="Enviar"/>
		</form>
	</body>
</html>
```

**`index.php`**

```php
if(!isset($_GET["nombre"]) || empty($_GET["nombre"])) exit();
if(!isset($_GET["apellido"]) || empty($_GET["apellido"])) exit();
if(!isset($_GET["edad"]) || empty($_GET["edad"])) exit();

$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$edad = $_GET["edad"];

echo "Hola, $nombre $apellido. Tienes $edad años.";
```
</details>

### Variable `$_REQUEST`

(Array asociativo con todos los campos ya sean de `$_GET` o `$_POST`)

```php
$_REQUEST
```

Acceder a clave de `$_REQUEST` con `name = "clave"`

```php
$_REQUEST["clave"]
```

<details>
	<summary>Ejemplo 1</summary>

**`index.html`**

```html
<html>
	<head>
		<title>Ejemplo 1 - GET</title>
	</head>
	<body>
		<form method="get" action="index.php">
			<label for="usuario">Usuario:</label>
			<input type="text" name="usuario" required/>
			<br>
			<input type="submit" value="Enviar"/>
		</form>
	</body>
</html>
```

**`index.php`**

```php
if(isset($_REQUEST["usuario"])) {
	echo "El usuario es: " . $_REQUEST["usuario"];
} else {
	echo "No se ha enviado ningún usuario.";
}
```
</details>

<details>
	<summary>Ejemplo 2</summary>

**`index.html`**

```html
<html>
	<head>
		<title>Ejemplo 2 - POST</title>
	</head>
	<body>
		<form method="post" action="index.php">
			<label for="email">Email:</label>
			<input type="email" name="email" required/>
			<br>
			<input type="submit" value="Enviar"/>
		</form>
	</body>
</html>
```

**`index.php`**

```php
if(isset($_REQUEST["email"])) {
	echo "El email es: " . $_REQUEST["email"];
} else {
	echo "No se ha enviado ningún email.";
}
```
</details>

### Variable `$_FILES`

(Array bidimensional asociativo con todos los archivos y sus atributos)

```php
$_FILES
```

Acceder a archivo de `$_FILES` con `name = "archivo"`

```php
$_FILES["archivo"]
```

Acceder a propiedades de un archivo

```php
$_FILES["archivo"]["name"]	// Nombre
$_FILES["archivo"]["type"]	// Tipo
$_FILES["archivo"]["size"]	// Tamaño
$_FILES["archivo"]["tmp_name"]	// Nombre en el cliente
$_FILES["archivo"]["error"]	// Error
```

<details>
	<summary>Ejemplo</summary>

**`index.html`**

```html
<html>
	<head>
		<title>Subir archivo</title>
	</head>
	<body>
		<form method="post" action="index.php" enctype="multipart/form-data">
			<label for="archivo">Selecciona un archivo:</label>
			<input type="file" name="archivo" required/>
			<br>
			<input type="submit" value="Subir archivo"/>
		</form>
	</body>
</html>
```

**`index.php`**

```php
if(isset($_FILES["archivo"])) {
	$archivo = $_FILES["archivo"];

	// Acceder a las propiedades del archivo
	echo "Nombre del archivo: " . $archivo["name"] . "<br>";
	echo "Tipo de archivo: " . $archivo["type"] . "<br>";
	echo "Tamaño del archivo: " . $archivo["size"] . " bytes<br>";
	echo "Nombre temporal del archivo: " . $archivo["tmp_name"] . "<br>";
	echo "Código de error: " . $archivo["error"] . "<br>";

	// Verificar si hubo algún error
	if($archivo["error"] === UPLOAD_ERR_OK) {
		echo "Archivo subido correctamente.";
	} else {
		echo "Error en la subida del archivo.";
	}
} else {
	echo "No se ha enviado ningún archivo.";
}
```
</details>

#### Tipos de Códigos de Error (`$_FILES["..."]["error"]`)

| Código | Error |
|-|-|
| `UPLOAD_ERR_OK` | Sin errores |
| `UPLOAD_ERR_INI_SIZE`| El archivo es más grande que el valor permitido en la directiva `upload_max_filesize` de PHP |
| `UPLOAD_ERR_FORM_SIZE` | El archivo es más grande que el valor permitido en el formulario (a través de `MAX_FILE_SIZE`) |
| `UPLOAD_ERR_PARTIAL` | El archivo fue subido parcialmente |
| `UPLOAD_ERR_NO_FILE` | No se subió ningún archivo |
| `UPLOAD_ERR_NO_TMP_DIR` | Falta el directorio temporal |
| `UPLOAD_ERR_CANT_WRITE` | No se puede escribir el archivo en el disco |
| `UPLOAD_ERR_EXTENSION` | Una extensión de PHP detuvo la carga del archivo |

### Variable `$_SERVER`

(Array asociativo con información del servidor)

```php
$_SERVER
```

Método de la solicitud del formulario (devuelve `"GET"` o `"POST"`)

```php
$_SERVER["REQUEST_METHOD"]
```

---

## Fechas

Generar objeto tiempo de: hoy

```php
strtotime("now")
```

Generar objeto tiempo de: fecha y hora en string

```php
strtotime(string);
strtotime("02-10-2024");
strtotime("02-10-2024 01:20:34");
```

Generar objeto tiempo de: tiempo de fecha específica con offset

```php
strtotime("offset", tiempo);

$hoy = strtotime("now");
$mañana = strtotime("+1 day", $hoy);
```

Tipos de offsets

- `"+1 day"` Un día más
- `"-2 month"` 2 meses menos
- `"+3 year"` 3 años más

Generar objeto fecha con formato `dd/mm/yyyy` de: hoy 

```php
date("d/m/Y");
```

Generar objeto fecha con formato `dd/mm/yyyy` de: tiempo de fecha específica

```php
date("d/m/Y", strtotime("02-10-2024"));
date("d/m/Y H:i:s", strtotime("02-10-2024 01:20:34"));
```

<details>
	<summary>Ejemplo</summary>

```php
$timestamp = strtotime("15-03-2004 09:30:00");
echo "El timestamp es: " . $timestamp . "<br>";
echo "Fecha y hora: " . date("Y-m-d H:i:s", $timestamp);
```
</details>

### Tipos de formatos de `date`

| Formato     | Descripción                                                  | Ejemplos              |
|-------------|--------------------------------------------------------------|-----------------------|
| `d`         | Día en número (con ceros iniciales) (`01` a `31`)            | `01`, `15`, `31`      |
| `j`         | Día en número (sin ceros iniciales) (`1` a `31`)             | `1`, `15`, `31`       |
| `D`         | Día de la semana en tres letras                              | `Mon`, `Tue`, `Wed`   |
| `l`         | Día de la semana completo                                    | `Monday`, `Tuesday`   |
| `N`         | Día de la semana numérico (`1` = `lunes` a `7` = `domingo`)  | `1`, `5`, `7`         |
| `w`         | Día de la semana numérico (`0` = `domingo` a `6` = `sábado`) | `0`, `4`, `6`         |
| `z`         | Día del año (`0` a `365`)                                    | `0`, `123`, `365`     |
| `W`         | Número de la semana del año (`ISO-8601`, semanas de lunes)     | `01`, `23`, `52`      |
| `m`         | Mes en número (con ceros iniciales) (`01` a `12`)            | `01`, `06`, `12`      |
| `n`         | Mes en número (sin ceros iniciales) (`1` a `12`)             | `1`, `6`, `12`        |
| `M`         | Mes en tres letras                                           | `Jan`, `Feb`, `Dec`   |
| `F`         | Mes completo                                                 | `January`, `February` |
| `t`         | Número de días en el mes (`28` a `31`)                       | `28`, `30`, `31`      |
| `y`         | Año en dos números                                           | `23`, `99`            |
| `Y`         | Año en cuatro números                                        | `2023`, `1999`        |
| `L`         | ¿Es año bisiesto? (`1` = sí, `0` = no)                       | `1`, `0`              |
| `H`         | Hora en 24h (con ceros iniciales) (`00` a `23`)              | `00`, `15`, `23`      |
| `G`         | Hora en 24h (sin ceros iniciales) (`0` a `23`)               | `0`, `15`, `23`       |
| `h`         | Hora en 12h (con ceros iniciales) (`01` a `12`)              | `01`, `10`, `12`      |
| `g`         | Hora en 12h (sin ceros iniciales) (`1` a `12`)               | `1`, `10`, `12`       |
| `a`         | `am`/`pm` en minúsculas                                      | `am`, `pm`            |
| `A`         | `AM`/`PM` en mayúsculas                                      | `AM`, `PM`            |
| `i`         | Minutos (con ceros iniciales) (`00` a `59`)                  | `00`, `15`, `59`      |
| `s`         | Segundos (con ceros iniciales) (`00` a `59`)                 | `00`, `15`, `59`      |
| `u`         | Microsegundos                                                | `654321`              |

## Funciones de Strings

Carácter en posición (empezando por el final si `posicion` $<$ `0`)

```php
$string[posicion]
```

<details>
	<summary>Ejemplo</summary>

```php
$string = "Hola Mundo";

echo $string[0];	// Imprime 'H'
echo $string[5];	// Imprime 'M'

echo $string[-1];	// Imprime 'o'
echo $string[-2];	// Imprime 'd'
```
</details>

Longitud de string

```php
strlen($string)
```

<details>
	<summary>Ejemplo</summary>

```php
$string = "Hola Mundo";
echo strlen($string);	// Imprime 10
```
</details>

String al revés

```php
strrev($string)
```

<details>
	<summary>Ejemplo</summary>

```php
$string = "Hola Mundo";
echo strrev($string);	// Imprime "odnuM aloH"
```
</details>

String en minúscula

```php
strtolower($string)
```

<details>
	<summary>Ejemplo</summary>

```php
$string = "Hola Mundo";
echo strtolower($string);	// Imprime "hola mundo"
```
</details>

String en mayúscula

```php
strtoupper($string)
```

<details>
	<summary>Ejemplo</summary>

```php
$string = "Hola Mundo";
echo strtoupper($string);	// Imprime "HOLA MUNDO"
```
</details>

Comparar strings (teniendo en cuenta mayúsculas)

```php
strcmp($string1, $string2)
```

<details>
	<summary>Ejemplo</summary>

```php
$string1 = "Hola";
$string2 = "Mundo";

echo strcmp($string1, $string2);	// Imprime un valor negativo porque "Hola" es menor que "Mundo"
echo strcmp($string1, $string1);	// Imprime 0 porque ambas cadenas son iguales
echo strcmp($string2, $string1);	// Imprime un valor positivo porque "Mundo" es mayor que "Hola"
```
</details>

Comparar strings (sin tener en cuenta mayúsculas)

```php
strcasecmp($string1, $string2)
```

<details>
	<summary>Ejemplo</summary>

```php
$string1 = "Hola";
$string2 = "hola";

echo strcasecmp($string1, $string2);	// Imprime 0 porque "Hola" y "hola" son consideradas iguales
echo strcasecmp("Mundo", "mundo");	// Imprime 0 porque "Mundo" y "mundo" son iguales sin importar las mayúsculas
echo strcasecmp("Hola", "Mundo");	// Imprime un valor negativo porque "Hola" es menor que "Mundo"
```
</details>

Posición de primera ocurrencia de `string2` dentro de `string1` (devuelve `false` si no está)

```php
strpos($string1, $string2);
```

<details>
	<summary>Ejemplo</summary>

```php
$string1 = "Hola Mundo";
$string2 = "Mundo";

echo strpos($string1, $string2);	// Imprime 5, porque "Mundo" comienza en la posición 5

$string3 = "Hola Mundo";
$string4 = "Python";

if (strpos($string3, $string4) === false) {
	echo "No se encuentra la subcadena.";	// Imprime esto, ya que no se encuentra "Python"
} else {
	echo "Subcadena encontrada.";
}
```
</details>

¿`string1` contiene `string2`?

```php
str_contains($string1, $string2)
```

<details>
	<summary>Ejemplo</summary>

```php
$string1 = "Hola Mundo";
$string2 = "Mundo";

echo str_contains($string1, $string2) ? "Sí contiene" : "No contiene";	// Imprime "Sí contiene"

$string3 = "PHP es raro";
$string4 = "Python";

echo str_contains($string3, $string4) ? "Sí contiene" : "No contiene";	// Imprime "No contiene"
```
</details>

¿`string1` empieza por `string2`?

```php
str_starts_with($string1, $string2)
```

<details>
	<summary>Ejemplo</summary>

```php
$string1 = "Hola Mundo";
$string2 = "Hola";
$string3 = "Mundo";

echo str_starts_with($string1, $string2) ? "Sí" : "No";	// Imprime "Sí", porque "Hola Mundo" empieza con "Hola"
echo str_starts_with($string1, $string3) ? "Sí" : "No";	// Imprime "No", porque "Hola Mundo" no empieza con "Mundo"
```
</details>

¿`string1` acaba por `string2`?

```php
str_ends_with($string1, $string2)
```

<details>
	<summary>Ejemplo</summary>

```php
$string1 = "Hola Mundo";
$string2 = "Hola";
$string3 = "Mundo";

echo str_ends_with($string1, $string2) ? "Sí" : "No";	// Imprime "No", porque "Hola Mundo" no termina con "Hola"
echo str_ends_with($string1, $string3) ? "Sí" : "No";	// Imprime "Sí", porque "Hola Mundo" termina con "Mundo"
```
</details>

Array de substrings separados por `$separador` de `$string` (similar a `split()` de Java)

```php
explode($separador, $string)
```

<details>
	<summary>Ejemplo</summary>

```php
$string = "manzana,banana,kiwi";
$array = explode(",", $string);

print_r($array);
```

**Salida**

```
Array
(
	[0] => manzana
	[1] => banana
	[2] => kiwi
)
```
</details>

Generar string a partir de array de strings, separados por `$separador`

```php
implode($separador, $array)
```

<details>
	<summary>Ejemplo</summary>

```php
$array = ["manzana", "banana", "kiwi"];
$string = implode(",", $array);

echo $string; // Imprime "manzana,banana,kiwi"
```
</details>

---

## Número Aleatorio

Generar número aleatorio entre `1` y `100` (incluyente)

```php
rand(1, 100)
```

---

## Redondeo

Valor redondeado a `n` decimales

```php
round($valor, n)
```

---

## Funciones `urldecode()` y `urluncode()` HTML

Codificar texto a valores URL

```php
urlencode(texto)
```

<details>
	<summary>Ejemplo</summary>

```php
$texto = "Hola Mundo!";
echo urlencode($texto);	// Resultado: "Hola+Mundo%21"
```
</details>

Descodificar texto de valores URL

```php
urldecode(texto)
```

<details>
	<summary>Ejemplo</summary>

```php
$texto = "Hola+Mundo%21";
echo urldecode($texto);	// Resultado: "Hola Mundo!"
```
</details>

---

## Expresiones Regulares

¿Variable cumple con expresión regular?

```php
preg_match($patron, $variable)
```

<details>
	<summary>Ejemplo</summary>

```php
$texto = "Hola Mundo!";
$patron = "/u/";

if (preg_match($patron, $texto)) {
	echo "¡Coincidencia encontrada!";	// Imprimirá esto
} else {
	echo "No se encontró coincidencia.";
}
```
</details>

Patrón que contenga la letra `a`

```php
"/a/"
```

Patrón que contenga la letra `a` o `b`

```php
"/a|b/"
```

Patrón que contenga una letra de `a`, `b` o `c`

```php
"/[abc]/"
```

Patrón que sea solamente un número

```php
"/^[0-9]$/"
```

Patrón que sean solamente `3` números

```php
"/^[0-9]{3}$/"
```

Patrón que contenga `3` números

```php
"/[0-9]{3}/"
```

Patrón que empiece por `3` números

```php
"/^[0-9]{3}/"
```

Patrón que acabe por `3` números

```php
"/[0-9]{3}$/"
```

Patrón que contenga mayúsculas

```php
"/[A-Z]/"
```

Patrón que contenga minúsculas

```php
"/[a-z]/"
```

Patrón que no contenga minúsculas

```php
"/[^a-z]/"
```

Patrón que contenga `3` o más minúsculas

```php
"/[a-z]{3,}/"
```

Patrón que contenga `1` o más minúsculas

```php
"/[a-z]+/"
```

Patrón que contenga `0` o más minúsculas

```php
"/[a-z]*/"
```

Patrón que contenga `0` o `1` minúscula

```php
"/[a-z]?/"
```

Patrón que contenga un número o minúscula o mayúscula

```php
"/[0-9A-Za-z]/"
```

### Anexo 1. Literales y Conjuntos específicos y de Rango

| Expresión         | Descripción                   |
|-------------------|-------------------------------|
| `a`               | Literal                       |
| `[abc]`           | Conjunto específico           |
| `[A-Z]`           | Conjunto de Rango             |
| `[A-Za-z0-9]`     | Conjunto Agrupado de Rango    |
| `[A-Zabc]`        | Conjunto Agrupado Mixto       |

### Anexo 2. Delimitación de cadena

| Expresión | Descripción |
|-----------|-------------|
| `^`       | Inicio      |
| `$`       | Fin         |
| `\|`      | OR          |
| `[^...]`  | NOT         |

### Anexo 3. Apéndice de Cuantificadores

| Expresión   | Descripción            |
|-------------|------------------------|
| `?`         | `0` o `1` veces        |
| `*`         | `0` o más veces        |
| `+`         | `1` o más veces        |
| `{5}`       | `5` veces              |
| `{3,}`      | Más de `3` veces       |
| `{3,9}`     | Entre `3` y `9` veces  |

### Anexo 4. Apéndice de Metacaracteres y Equivalencias

| Expresión | Descripción                  | Equivalencia          |
|-----------|------------------------------|-----------------------|
| `\d`      | Dígito                       | `[0-9]`               |
| `\D`      | No dígito                    | `[^0-9]`              |
| `\w`      | Carácter Alfanumérico        | `[A-Za-z0-9]`         |
| `\W`      | Carácter No Alfanumérico     | `[^A-Za-z0-9]`        |
| `\s`      | Espacio Invisible            | `[ \t\n\r\f\v]`       |
| `\S`      | Carácter No Invisible        | `[^ \t\n\r\f\v]`      |
| `.`       | Comodín (Excepto `\n`)       | No tiene              |

---

## Excepciones

Lanzar excepción

```php
throw new Exception("Mensaje de error");
```

Lanzar excepción de argumento inválido

```php
throw new InvalidArgumentException("Mensaje de error");
```

Cazar excepción(es)

```php
try{
	// Código peligroso
}catch(Exception $e){
	// Mensaje de error informativo
}
```

```php
try{
	// Código
}catch(InvalidArgumentException $iae){
	// Argumento no válido
}catch(Exception $e){
	// Otras excepciones
}
```

<details>
	<summary>Ejemplo</summary>

```php
try {
	$edad = -1;
	if ($edad < 0) {
		throw new InvalidArgumentException();	// Se lanzará esta excepción
	}
	echo "Edad válida.";
} catch (InvalidArgumentException $iae) {
	echo "Error.";	// Maneja la excepción
}
```
</details>

Mensaje de la excepción

```php
$iae->getMessage()
```

<details>
	<summary>Ejemplo</summary>

```php
try {
	throw new InvalidArgumentException("Mensaje de error.");
} catch (InvalidArgumentException $iae) {
	echo $iae->getMessage();	// Muestra el mensaje de la excepción
}
```
</details>

---

## Arrays

Crear array indexado

```php
$miArray = ["Pepe", 20.3, "XD"];
```

Crear array asociativo (similar a `HashMap` de Java)

```php
$capitales = ["España" => "Madrid", "Francia" => "París", "Italia" => "Roma"];
```

Acceder a posición de array

```php
$miArray[0];
$miArray[1] = "X";

$capitales["Francia"];
$capitales["España"] = "Madrid";
```

Agregar valor al final de array indexado (en asociativos genera el primer número disponible como clave)

```php
$miArray[] = valor;
```

<details>
	<summary>Ejemplo 1</summary>

```php
$miArray = [0, 5, 2, 3, 1];

$miArray[] = 4;
print_r($miArray);
```

**Salida**

```
Array
(
	[0] => 0
	[1] => 5
	[2] => 2
	[3] => 3
	[4] => 1
	[5] => 4
)
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$miArray = [
	"nombre" => "Juan",
	"edad" => 30
];

$miArray[] = "valor";
print_r($miArray);
```

**Salida**

```
Array
(
	[nombre] => Juan
	[edad] => 30
	[0] => valor
)
```
</details>

Array Multidimensional

```php
$miArray = [[1, 2], [3, 4], [5, 6]];
$miArray[0][1]
```

Tamaño de array

```php
count($miArray)
```

<details>
	<summary>Ejemplo</summary>

```php
$miArray = [1, 2, 3, 4];
echo count($miArray);	// Imprime 4
```
</details>

Generar array de números en un rango ordenadamente (incluyente)

```php
range(1, 10)
```

<details>
	<summary>Ejemplo</summary>

```php
$numeros = range(6, 10);
print_r($numeros);
```

**Salida**

```
Array
(
	[0] => 6
	[1] => 7
	[2] => 8
	[3] => 9
	[4] => 10
)
```
</details>

Desglose de valores de un array

```php
...$valores
```

<details>
	<summary>Ejemplo</summary>

```php
function mostrar(...$valores){
	foreach($valores as $valor){
		echo $valor . "\n";
	}
}

$numeros = [1, 2, 3, 4, 5];
mostrar(...$numeros);	// mostrar(1, 2, 3, 4, 5);
```
</details>

Array nuevo de función aplicada a elementos de uno o varios array

```php
array_map($funcion, ...$arrays);
```

<details>
	<summary>Ejemplo 1</summary>

```php
$numeros = [1, 2, 3, 4, 5];

$dobles = array_map(function($numero) {
	return $numero * 2;
}, $numeros);

print_r($dobles);
```

**Salida**

```
Array
(
	[0] => 2
	[1] => 4
	[2] => 6
	[3] => 8
	[4] => 10
)
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$nombres = ["Juan", "Pedro", "Maria"];
$edades = [30, 25, 28];

$personas = array_map(function($nombre, $edad) {
	return $nombre . " tiene " . $edad . " años";
}, $nombres, $edades);

print_r($personas);
```

**Salida**

```
Array
(
	[0] => Juan tiene 30 años
	[1] => Pedro tiene 25 años
	[2] => Maria tiene 28 años
)
```
</details>

Array nuevo de sólo los elementos de un array que cumplan un criterio

```php
array_filter($array, $funcion);
```

<details>
	<summary>Ejemplo</summary>

```php
$numeros = [0, 1, 2, 3, 4];

$pares = array_filter($numeros, function($numero) {
	return $numero % 2 == 0;
});

print_r($pares);
```

**Salida**

```
Array
(
	[0] => 0
	[1] => 2
	[2] => 4
)
```
</details>

Valor devuelto luego de aplicar una función a un array iterativamente con un acumulador y su valor inicial

```php
array_reduce($array, $funcion, $valorInicialAcum);
```

<details>
	<summary>Ejemplo</summary>

```php
$numeros = [1, 2, 3, 4, 5];

$suma = array_reduce($numeros, function($acumulador, $numero) {
	$acumulador += $numero;
	return $acumulador;
}, 0);

echo $suma;	// Imprime 15
```
</details>

Almacenar en variables los valores de un array (Desestructuración)

```php
list($a, $b, $c, $d) = [1, 2, 3, 4];
```

<details>
	<summary>Ejemplo</summary>

```php
list($a, $b, $c, $d) = [1, 2, 3, 4];
echo $a;	// Imprime 1
echo $b;	// Imprime 2
echo $c;	// Imprime 3
echo $d;	// Imprime 4
```
</details>

Ordenar array original indexado ascendentemente y descendentemente

```php
sort($array);
rsort($array);
```

<details>
	<summary>Ejemplo 1</summary>

```php
$array = [5, 3, 8, 1, 2];
sort($array);
print_r($array);
```

**Salida**

```
Array
(
	[0] => 1
	[1] => 2
	[2] => 3
	[3] => 5
	[4] => 8
)
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$array = [5, 3, 8, 1, 2];
rsort($array);
print_r($array);
```

**Salida**

```
Array
(
	[0] => 8
	[1] => 5
	[2] => 3
	[3] => 2
	[4] => 1
)
```
</details>

Ordenar array original asociativo por valores ascendentemente y descendentemente

```php
asort($array);
arsort($array);
```

<details>
	<summary>Ejemplo 1</summary>

```php
$array = [
	"España" => "Madrid",
	"Francia" => "París",
	"Italia" => "Roma",
	"Alemania" => "Berlín",
	"Portugal" => "Lisboa"
];

asort($array);
print_r($array);
```

**Salida**

```
Array
(
	[Alemania] => Berlín
	[Portugal] => Lisboa
	[España] => Madrid
	[Francia] => París
	[Italia] => Roma
)
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$array = [
	"España" => "Madrid",
	"Francia" => "París",
	"Italia" => "Roma",
	"Alemania" => "Berlín",
	"Portugal" => "Lisboa"
];

arsort($array);
print_r($array);
```

**Salida**

```
Array
(
	[Italia] => Roma
	[Francia] => París
	[España] => Madrid
	[Portugal] => Lisboa
	[Alemania] => Berlín
)
```
</details>

Ordenar array original asociativo por claves ascendentemente y descendentemente

```php
ksort($array);
krsort($array);
```

<details>
	<summary>Ejemplo 1</summary>

```php
$array = [
	"España" => "Madrid",
	"Francia" => "París",
	"Italia" => "Roma",
	"Alemania" => "Berlín",
	"Portugal" => "Lisboa"
];

ksort($array);
print_r($array);
```

**Salida**

```
Array
(
	[Alemania] => Berlín
	[España] => Madrid
	[Francia] => París
	[Italia] => Roma
	[Portugal] => Lisboa
)
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$array = [
	"España" => "Madrid",
	"Francia" => "París",
	"Italia" => "Roma",
	"Alemania" => "Berlín",
	"Portugal" => "Lisboa"
];

krsort($array);
print_r($array);
```

**Salida**

```
Array
(
	[Portugal] => Lisboa
	[Italia] => Roma
	[Francia] => París
	[España] => Madrid
	[Alemania] => Berlín
)
```
</details>

Ordenar array original por criterio

```php
usort($array, criterio);
```

<details>
	<summary>Ejemplo</summary>

```php
$array = ["manzana", "kiwi", "banana", "cereza", "uva"];

usort($array, function($a, $b){
	return strlen($a) - strlen($b);	// Ordena según la longitud de las cadenas
});

print_r($array);
```

**Salida**

```
Array
(
	[0] => uva
	[1] => kiwi
	[2] => banana
	[3] => cereza
	[4] => manzana
)
```
</details>

¿Está en un array un valor?

```php
in_array($valor, $array)
```

<details>
	<summary>Ejemplo</summary>

```php
$array = [1, 2, 3, 4, 5];
$valor = 3;

echo (in_array($valor, $array)) ? "Está" : "No está";	// Imprime "Está"
```
</details>

Array indexado de valores de un array (sea indexado o asociativo)

```php
array_values($array)
```

<details>
	<summary>Ejemplo</summary>

```php
$array = [
	"a" => "manzana",
	"b" => "banana",
	"c" => "cereza"
];

$valores = array_values($array);
print_r($valores);
```

**Salida**

```
Array
(
	[0] => manzana
	[1] => banana
	[2] => cereza
)
```
</details>

Array indexado de claves de un array (y de un mismo elemento)

```php
array_keys($array);
array_keys($array, $elemento);
```

<details>
	<summary>Ejemplo 1</summary>

```php
$array = [
	"a" => "manzana",
	"b" => "banana",
	"c" => "cereza"
];

$claves = array_keys($array);
print_r($claves);
```

**Salida**

```
Array
(
	[0] => a
	[1] => b
	[2] => c
)
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$array = [
	"a" => "manzana",
	"b" => "banana",
	"c" => "cereza",
	"d" => "manzana"
];

$clavesManzana = array_keys($array, "manzana");
print_r($clavesManzana);
```

**Salida**

```
Array
(
	[0] => a
	[1] => d
)
```
</details>

¿Existe la clave en el array?

```php
array_key_exists($array, $clave)
```

<details>
	<summary>Ejemplo</summary>

```php
$array = [
	"España" => "Madrid",
	"Francia" => "París"
];
$clave = "España";

echo (array_key_exists($array, $clave)) ? "Está" : "No está";	// Imprime "Está"
```
</details>

Array al revés (preservando claves o no)

```php
array_reverse($array);
array_reverse($array, $preservarClaves);
```

<details>
	<summary>Ejemplo 1</summary>

```php
$array = [1, 2, 3, 4, 5];
$invertido = array_reverse($array);
print_r($invertido);
```

**Salida**

```
Array
(
	[0] => 5
	[1] => 4
	[2] => 3
	[3] => 2
	[4] => 1
)
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$array = [
	"a" => "manzana",
	"b" => "banana",
	"c" => "cereza"
];
$invertido = array_reverse($array, true);
print_r($invertido);
```

**Salida**

```
Array
(
	[c] => cereza
	[b] => banana
	[a] => manzana
)
```
</details>

Insertar valor/es al final de un array

```php
array_push($array, ...$valores);
```

<details>
	<summary>Ejemplo</summary>

```php
$array = [1, 2, 3];
array_push($array, 4, 5);
print_r($array);
```

**Salida**

```
Array
(
	[0] => 1
	[1] => 2
	[2] => 3
	[3] => 4
	[4] => 5
)
```
</details>

Extraer valor del final de un array (devuelve `null` si está vacío)

```php
array_pop($array)
```

<details>
	<summary>Ejemplo</summary>

```php
$array = [1, 2, 3, 4, 5];
$ultimoElemento = array_pop($array);

echo "Elemento eliminado: " . $ultimoElemento . "\n";
print_r($array);
```

**Salida**

```
Elemento eliminado: 5
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
)
```
</details>

Insertar valor/es al principio de un array

```php
array_unshift($array, ...$valores);
```

<details>
	<summary>Ejemplo</summary>

```php
$array = [2, 3, 4];
array_unshift($array, 0, 1);
print_r($array);
```

**Salida**

```
Array
(
	[0] => 0
	[1] => 1
	[2] => 2
	[3] => 3
	[4] => 4
)
```
</details>

Extraer valor del principio de un array (devuelve `null` si está vacío)

```php
array_shift($array)
```

<details>
	<summary>Ejemplo</summary>

```php
$array = [1, 2, 3, 4, 5];
$primerElemento = array_shift($array);
echo "Elemento eliminado: " . $primerElemento . "\n";
print_r($array);
```

**Salida**

```
Elemento eliminado: 1
Array
(
	[0] => 2
	[1] => 3
	[2] => 4
	[3] => 5
)
```
</details>

Copia de array con claves intercambiadas por valores

```php
array_flip($array)
```

<details>
	<summary>Ejemplo</summary>

```php
$array = [
	"a" => "manzana",
	"b" => "banana",
	"c" => "cereza"
];

$invertido = array_flip($array);
print_r($invertido);
```

**Salida**

```
Array
(
	[manzana] => a
	[banana] => b
	[cereza] => c
)
```
</details>

Posición actual del puntero en el array

```php
current($array)
```

(Moverse a) posición anterior del puntero del array

```php
prev($array)
```

(Moverse a) posición posterior del puntero del array

```php
next($array)
```

Posición de la primera ocurrencia de elemento en array (`indexOf()` de Java)

```php
array_search($elemento, $array)
```

<details>
	<summary>Ejemplo</summary>

```php
$array = [
	"a" => "manzana",
	"b" => "banana",
	"c" => "cereza"
];

$clave = array_search("banana", $array);
echo "La clave de 'banana' es: " . $clave . "\n";	// Imprime 'b'
```
</details>

Porción del array empezando por un valor y de una longitud opcional determinada, opcionalmente manteniendo las claves

```php
array_slice($array, $inicio, $longitud, $preservarClaves)
```

<details>
	<summary>Ejemplo 1</summary>

```php
$array = [
	"a" => "manzana",
	"b" => "banana",
	"c" => "cereza"
	"d" => "ciruela"
];

$porcion = array_slice($array, 1);
print_r($porcion);
```

**Salida**

```
Array
(
	[b] => banana
	[c] => cereza
	[d] => ciruela
)
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$array = [
	"a" => "manzana",
	"b" => "banana",
	"c" => "cereza",
	"d" => "ciruela"
];

$porcion = array_slice($array, 1, 2);
print_r($porcion);
```

**Salida**

```
Array
(
	[b] => banana
	[c] => cereza
)
```
</details>

<details>
	<summary>Ejemplo 3</summary>

```php
$array = [
	"a" => "manzana",
	"b" => "banana",
	"c" => "cereza",
	"d" => "ciruela"
];

$porcion = array_slice($array, 1, 2, false);
print_r($porcion);
```

**Salida**

```
Array
(
	[0] => banana
	[1] => cereza
)
```
</details>

Eliminar elementos del array original que están empezando por un valor y con una longitud determinada, y reemplazarlos opcionalmente por otros valores en array

```php
array_splice($array, $inicio, $longitud, $valoresNuevos);
```

<details>
	<summary>Ejemplo 1</summary>

```php
$array = [
	"a" => "manzana",
	"b" => "banana",
	"c" => "cereza",
	"d" => "ciruela"
];

array_splice($array, 1, 2);
print_r($array);
```

**Salida**

```
Array
(
	[a] => manzana
	[d] => ciruela
)
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$array = [
	"a" => "manzana",
	"b" => "banana",
	"c" => "cereza",
	"d" => "ciruela"
];

array_splice($array, 1, 2, ["pera", "kiwi"]);
print_r($array);
```

**Salida**

```
Array
(
	[a] => manzana
	[b] => pera
	[c] => kiwi
	[d] => ciruela
)
```
</details>

<details>
	<summary>Ejemplo 3</summary>

```php
$array = [
	"a" => "manzana",
	"b" => "banana",
	"c" => "cereza",
	"d" => "ciruela"
];
$eliminados = array_splice($array, -3, 2);

echo "Eliminados: ";
print_r($eliminados);

echo "Originales: ";
print_r($array);
```

**Salida**

```
Eliminados: Array
(
	[b] => banana
	[c] => cereza
)
Originales: Array
(
	[a] => manzana
	[d] => ciruela
)
```
</details>

Dos o más arrays concatenados / fusionados

```php
array_merge(...$arrays)
```

<details>
	<summary>Ejemplo 1</summary>

```php
$array1 = ["a" => "manzana", "b" => "banana"];
$array2 = ["c" => "cereza", "d" => "ciruela"];

$fusion = array_merge($array1, $array2);
print_r($fusion);
```

**Salida**

```
Array
(
	[a] => manzana
	[b] => banana
	[c] => cereza
	[d] => ciruela
)
```
</details>

<details>
	<summary>Ejemplo 2</summary>

```php
$array1 = ["a" => "manzana", "b" => "banana"];
$array2 = ["b" => "cereza", "c" => "ciruela"];

$fusion = array_merge($array1, $array2);	// Se sobreescriben valores en caso de claves existentes
print_r($fusion);
```

**Salida**

```
Array
(
	[a] => manzana
	[b] => cereza
	[c] => ciruela
)
```
</details>

<details>
	<summary>Ejemplo 3</summary>

```php
$array1 = ["a" => "manzana"];
$array2 = ["b" => "banana"];
$array3 = ["c" => "cereza"];

$fusion = array_merge($array1, $array2, $array3);
print_r($fusion);
```

**Salida**

```
Array
(
	[a] => manzana
	[b] => banana
	[c] => cereza
)
```
</details>

Array de substrings separados por `$separador` de `$string` (similar a `split()` de Java)

```php
explode($separador, $string)
```

<details>
	<summary>Ejemplo</summary>

```php
$string = "manzana,banana,kiwi";
$array = explode(",", $string);

print_r($array);
```

**Salida**

```
Array
(
	[0] => manzana
	[1] => banana
	[2] => kiwi
)
```
</details>

Generar string a partir de array de strings, separados por `$separador`

```php
implode($separador, $array)
```

<details>
	<summary>Ejemplo</summary>

```php
$array = ["manzana", "banana", "kiwi"];
$string = implode(",", $array);

echo $string; // Imprime "manzana,banana,kiwi"
```
</details>

---

## Funciones

Definir función

```php
function saludar() {
	echo "Hola";
}

function suma(int|float $a, int|float $b) : int|float {
	return $a + $b;
}

function hola(?String $nombre) : void {
	echo "Hola ".$nombre;
}

function mostrar($string = "Valor por defecto") {
	echo $string;
}

function sumarTodo(...$numeros) {
	$suma = 0;
	for($i = 0; $i < count($numeros); $i++){
		$suma += $numeros[$i];
	}
	return $suma;
}
```

Ejecutar función

```php
saludar();
echo suma(1,3);
```

Usar función con argumentos desplegados (Las dos siguientes son equivalentes)

```php
$nums = [1, 2, 3];

echo sumarTodo(1, 2, 3);
echo sumarTodo(...$nums);
```

Función como variable

```php
$comparaEnteros = function($num1, $num2) {
	if ($num1 > $num2) return 1;
	if ($num1 < $num2) return -1;
	return 0;
}

echo $comparaEnteros(10, 20);
```

Función flecha (hace directamente `return`)

```php
fn($num) => $num ** 2
```

---

## Variables Globales

Usar variable global en función (importarla)

```php
function miFuncion() {
	global $variable;
	// Instrucciones
}
```

<details>
	<summary>Ejemplo</summary>

```php
$variable = 10;

function miFuncion() {
    global $variable;
    $variable += 5;
}

echo $variable;	// Imprime 10
miFuncion();
echo $variable;	// Imprime 15
```
</details>

Pasar variable a función anónima como valor con `use`

```php
function($argumentos) use($variable) {
	// Instrucciones
}
```

<details>
	<summary>Ejemplo</summary>

```php
$variable = 10;

$miFuncion = function() use($variable) {
    $variable += 5;
};

echo $variable;	// Imprime 10
$miFuncion();
echo $variable;	// Imprime 10 (sin efecto)
```
</details>

Pasar variable a función anónima como referencia con `use` (similar a `global`)

```php
function($argumentos) use(&$variable) {
	// Instrucciones
}
```

<details>
	<summary>Ejemplo</summary>

```php
$variable = 10;

$miFuncion = function() use(&$variable) {
    $variable += 5;
};

echo $variable;	// Imprime 10
$miFuncion();
echo $variable;	// Imprime 15
```
</details>

Pasar variable a función como referencia con `&` (similar a `global`)

```php
function miFuncion(&$variable) {
	// Instrucciones
}
```

<details>
	<summary>Ejemplo</summary>

```php
$variable = 10;

function miFuncion(&$variable) {
    $variable += 5;
}

echo $variable;	// Imprime 10
miFuncion();
echo $variable;	// Imprime 15
```
</details>

---

## Variables Estáticas

Crear y usar variable estática en función

```php
function contador() {
	static $cont = 0;
	$cont++;
}
```

<details>
	<summary>Ejemplo</summary>

```php
function miFuncion() {
    static $contador = 0;
    $contador++;
    echo $contador . "\n";
}

miFuncion();	// Imprime 1
miFuncion();	// Imprime 2
miFuncion();	// Imprime 3
```
</details>

---

## Clases y Objetos

Crear clase

```php
class Objeto {

	private int|float $atributo1;
	private string $atributo2;
	private mixed $atributo3;
	private $atributo4;

	public function __construct(int|float $atributo1, string $atributo2, mixed $atributo3, $atributo4) {
		$this->atributo1 = $atributo1;
		$this->atributo2 = $atributo2;
		$this->atributo3 = $atributo3;
		$this->atributo4 = $atributo4;
	}

	public function getAtributo1() : int|float {
		return $this->atributo1;
	}
	public function getAtributo2() : string {
		return $this->atributo2;
	}
	public function getAtributo3() : mixed {
		return $this->atributo3;
	}
	public function getAtributo4() {
		return $this->atributo4;
	}

	public function setAtributo1(int|float $atributo1) {
		$this->atributo1 = $atributo1;
	}
	public function setAtributo2(string $atributo2) {
		$this->atributo2 = $atributo2;
	}
	public function setAtributo3(mixed $atributo3) {
		$this->atributo3 = $atributo3;
	}
	public function setAtributo3($atributo4) {
		$this->atributo4 = $atributo4;
	}
	
}
```

Crear objeto

```php
$objeto = new Objeto(12, "Hola", null);
$vacio = new Vacio();
```

Atributo que puede ser nulo

```php
?String cadena;
?int entero;
```