# PHP coding dojo project kata

Proyecto para tener todas las katas PHP en un mismo proyecto y poder añadir nuevas de manera sencilla.
La idea es poder utilizar PHPStorm como IDE yque todo funcione facilmente.
Esta basado en el proyecto de  matthiasnoback/php-coding-dojo

Dentro del directorio _kata_ estan los enunciados de las katas y dentro de la carpeta _projects_ están 
algunas soluciones a katas


## Code Katas:
- Calculator
- FizzBuzz
- FizBuzz Extra
- Mafia
- Minesweeper
- Minesweeper Extra
- TripService Kata
- Yahtzee

## Instalación

Clonar el proyecto

```
git clone 
```

Instalar las dependencias con composer

```
composer install
```

Ya podemos ejecutar los todos los test con *total_phpunit.xml* o ejecutar los test solo de un proyecto
utilizando el phpunit.xml que esta dentro de cada carpeta de proyecto.


## Hacer una nueva kata

Para ello tenemos que crear una carpeta nueva dentro de _projects_ este directorio nuevo debe tener 2 subdirectorios _src_y _test_
y añadir al archivio _composer.json_ la ruta al proyecto.

```
La manera más sencilla es copiar *DummyProject*, renombrarla con el nombre de la kata que vayamos a realizar y añadir al fichero composer.json
```

#### Configurar PHPStorm para ejecutar lo tests

- Ir a ``Run``, ``Edit configurations...`` y borrar todas las configuraciones
- Seleccionar ``Defaults - PHPUnit``, hacer clic en ``Use alternative configuration file`` y seleccionar
  ``phpunit.xml.dist``  de este proyecto.
- Hacer clic en ``Use custom loader`` y seleccionar el fichero ``vendor/autoload.php`` de dentro del proyecto.
- Ahora podemos ejecutar los test de manera sencilla pulsando ejecutar.

#### Ejecutar los test
Para ejecutar  todos los test podemos utilizar  ``Cmd + alt + R`` o desde la linea de comandos

```
    php vendor/bin/phpunit
```

## Soluciones

- Mafia
- Calculator -> 2 versiones (con Mock y sin Mock)
- TripServiceKata