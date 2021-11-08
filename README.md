# GENERADOR DE SEGURO ACCIDENTES TRAUMATICOS

![image](https://user-images.githubusercontent.com/82197737/140683085-a52b48e6-a734-4e4b-b35c-350b65ccaf4d.png)

## Construido con 🛠️

Ocupa las siguientes tecnologías:

* [PHP]
* [HTML]
* [CSS]
* [JS]
* [JQUERY]
* [FPDF]
* [FPDI]

## Descripción del Mini - Sistema 📄
Es un pequeño proyecto, hecho en php puro, ocupa un poco de jquery y javascript para las validaciones, y se apoya de las librerias FPDF y FPDI, para rellenar un pdf existente, con datos rescatados de un formulario en la página, tiene validaciones básicas en el front, de campos obligatorios.

También da formatos chileno al rut ingresado, sin validar, y cambia a mayusculas y minusculas los datos donde son requeridos (con JS).

Al rellenar el formulario, y dar al boton generar, se escriben los nuevos datos en el pdf de plantilla, generando uno nuevo, y que se descarga al servidor para ser impreso mediante boton derecho -> imprimir.

Al ingresar a la dirección http donde esté subido el código, carga automáticamente el ultimo pdf generado, en un iframe a un costado del formulario.

Está sólo con adaptación a pantalla de pc, maquetado básico con bootstrap, adaptado a una resolución de 1366 x 768.

Aparte lleva un pequeño script, para controlar la cantidad de visitas al sitio, incrementando de 1 en 1 las visitas. Es una función php, que cambia el valor y lo va escribiendo en un archivo txt.

El pdf de base, o plantilla, está editado, para proteger privacidad del lugar donde está siendo actualmente utilizado.

Se puede adaptar a cualquier pdf de base, modificando las coordenadas en en archivo GENERA.PHP
