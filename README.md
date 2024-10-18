# Sistema de Gestión de Dominios en Symfony con Docker

## Objetivo

El objetivo de este proyecto es desarrollar un sistema básico en Symfony que funcione sobre Docker, capaz de gestionar dos dominios: **Editorial News** y **Editorial Live**. El sistema debe recibir un JSON, crear los modelos de dominio correspondientes, y devolver una respuesta en formato JSON con los datos del dominio. Opcionalmente, se puede implementar la persistencia de los dominios en una base de datos.

## Requisitos Técnicos

1. **Symfony**: El proyecto debe ser creado desde cero utilizando Symfony.
2. **Docker**: Todo el entorno debe funcionar dentro de contenedores Docker (PHP, base de datos, etc.).
3. **Dominios**:
   - **Editorial News**: Un modelo de dominio que maneja la información de noticias editoriales.
   - **Editorial Live**: Otro modelo de dominio relacionado con **Editorial News**.
4. **Pruebas Unitarias**: Implementar pruebas unitarias que validen la lógica del dominio y su correcto funcionamiento.

## Descripción de la Prueba

### Parte 1: Implementación Mínima (Obligatoria)

1. El sistema debe permitir recibir un JSON con los datos necesarios para crear un modelo de dominio.
2. Dependiendo de los datos recibidos, se debe crear el modelo de dominio adecuado (**Editorial News** o **Editorial Live**).
   - La respuesta debe devolver el dominio recién creado en formato JSON, con un campo adicional `countWords` que indique la cantidad total de palabras en el campo `content`.

#### Ejemplo de JSON de Entrada para Editorial News:

```json
{
  "title": "Breaking News",
  "content": "This is the latest news update."
}
```

#### Ejemplo de Respuesta Esperada:

```json
{
  "id": "uuid-generated",
  "title": "Breaking News",
  "content": "This is the latest news update.",
  "countWords": 6
}
```

### Condiciones:
- El `id` debe ser un UUID.
- El campo `countWords` debe calcularse en base al número de palabras en el campo `content`.
- El atributo `isLive` debe estar presente únicamente en el modelo de dominio **Editorial Live**.

### Parte 2: Persistencia en Base de Datos (Opcional)

Si el tiempo lo permite, se valorará la implementación de la persistencia de los dominios en una base de datos relacional, utilizando **Doctrine ORM**.

1. Los modelos de dominio **Editorial News** y **Editorial Live** deben poder ser guardados en la base de datos.
2. Debe ser posible recuperar los dominios guardados desde la base de datos y devolverlos en formato JSON.

---

## Criterios de Evaluación

1. **Organización del Código**: Se evaluará cómo se organiza el proyecto, siguiendo buenas prácticas.
2. **Uso de Docker**: Se valorará la correcta configuración del entorno de desarrollo usando Docker.
3. **Lógica de Dominios**: Se evaluará la capacidad de modelar los dominios y su correcta implementación.
4. **Creación y Respuesta en JSON**: Se evaluará la correcta implementación de la creación de los dominios, la recepción del JSON y el cálculo del campo `countWords`.
5. **Pruebas Unitarias**: Se valorará la calidad, cobertura y relevancia de las pruebas unitarias para validar la lógica del dominio.
6. **Persistencia en Base de Datos (Opcional)**: Se considerará positivamente la implementación del guardado de dominios en la base de datos, aunque no es obligatorio.

