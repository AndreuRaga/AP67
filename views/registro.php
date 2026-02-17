<!DOCTYPE html>
<html lang="es">
<head>
    <title>Proyecto: Expedición Nova</title>
</head>
<body>
    <h1>Gestor de entidades estelares</h1>
    <hr>
    <h2>Crear entidad estelar</h2>
    <form method="post" action="index.php?accion=crear">
        ID:
        <input type="number" name="id" required>
        <br>

        Nombre:
        <input type="text" name="nombre" required>
        <br>

        Planeta de origen:
        <input type="text" name="planetaOrigen" required>
        <br>

        Nivel de estabilidad:
        <input type="number" name="nivelEstabilidad" max="10" required>
        <br>

        Dieta:
        <input type="text" name="dieta">
        <br>

        Dureza:
        <input type="number" name="dureza">
        <br>

        Antigüedad:
        <input type="number" name="antiguedad">
        <br>

        <input type="submit" value="Crear entidad estelar">
    </form>
    <a href="index.php">Volver</a>
</body>
</html>