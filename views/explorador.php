<!DOCTYPE html>
<html lang="es">
<head>
    <title>Proyecto: Expedición Nova</title>
</head>
<body>
    <h1>Gestor de entidades estelares</h1>
    <hr>
    <a href="index.php?accion=crear">Añadir entidad estelar</a>

    <h3>Formas de vida</h3>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Planeta de origen</th>
            <th>Nivel de estabilidad</th>
            <th>Dieta</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($formasDeVidaAcortadas as $formaDeVida): ?>
            <tr>
                <td><?php echo $formaDeVida->getId(); ?></td>
                <td><?php echo $formaDeVida->getNombre(); ?></td>
                <td><?php echo $formaDeVida->getPlanetaOrigen(); ?></td>
                <td><?php echo $formaDeVida->getNivelEstabilidad(); ?></td>
                <td><?php echo $formaDeVida->getDieta(); ?></td>
                <td>                        
                    <form method="post" action="index.php?accion=editarFormaDeVida" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $formaDeVida->getId(); ?>" required>
                        Nombre:
                        <input type="text" name="nombre" value="<?php echo $formaDeVida->getNombre(); ?>" required>
                        Planeta de origen:
                        <input type="text" name="planetaOrigen" value="<?php echo $formaDeVida->getPlanetaOrigen(); ?>" required>
                        Nivel de estabilidad:
                        <input type="number" name="nivelEstabilidad" max="10" value="<?php echo $formaDeVida->getNivelEstabilidad(); ?>" required>
                        Dieta:
                        <select name="dieta" required>
                            <option value="Carbono" <?php echo ($formaDeVida->getDieta() == 'Carbono') ? 'selected' : ''; ?>>Carbono</option>
                            <option value="Silicio" <?php echo ($formaDeVida->getDieta() == 'Silicio') ? 'selected' : ''; ?>>Silicio</option>
                            <option value="Energía" <?php echo ($formaDeVida->getDieta() == 'Energía') ? 'selected' : ''; ?>>Energía</option>
                        </select>
                        <input type="submit" value="Guardar">

                        <a href="index.php?accion=eliminar&id=<?php echo $formaDeVida->getId(); ?>">Eliminar</a>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php for ($i = 1; $i <= $totalPaginasFormasDeVida; $i++): ?>
        <a href="index.php?accion=index&pActualFormasDeVida=<?php echo $i; ?>&pActualMineralesRaros=<?php echo $paginaActualMineralesRaros; ?>&pActualArtefactosAntiguos=<?php echo $paginaActualArtefactosAntiguos; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>

    <h3>Minerales raros</h3>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Planeta de origen</th>
            <th>Nivel de estabilidad</th>
            <th>Dureza</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($mineralesRarosAcortados as $mineralRaro): ?>
            <tr>
                <td><?php echo $mineralRaro->getId(); ?></td>
                <td><?php echo $mineralRaro->getNombre(); ?></td>
                <td><?php echo $mineralRaro->getPlanetaOrigen(); ?></td>
                <td><?php echo $mineralRaro->getNivelEstabilidad(); ?></td>
                <td><?php echo $mineralRaro->getDureza(); ?></td>
                <td>
                    <form method="post" action="index.php?accion=editarMineralRaro" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $mineralRaro->getId(); ?>" required>
                        Nombre:
                        <input type="text" name="nombre" value="<?php echo $mineralRaro->getNombre(); ?>" required>
                        Planeta de origen:
                        <input type="text" name="planetaOrigen" value="<?php echo $mineralRaro->getPlanetaOrigen(); ?>" required>
                        Nivel de estabilidad:
                        <input type="number" name="nivelEstabilidad" max="10" value="<?php echo $mineralRaro->getNivelEstabilidad(); ?>" required>
                        Dureza:
                        <input type="number" name="dureza" value="<?php echo $mineralRaro->getDureza(); ?>" required>
                        <input type="submit" value="Guardar">

                        <a href="index.php?accion=eliminar&id=<?php echo $mineralRaro->getId(); ?>">Eliminar</a>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php for ($i = 1; $i <= $totalPaginasMineralesRaros; $i++): ?>
        <a href="index.php?accion=index&pActualFormasDeVida=<?php echo $paginaActualFormasDeVida; ?>&pActualMineralesRaros=<?php echo $i; ?>&pActualArtefactosAntiguos=<?php echo $paginaActualArtefactosAntiguos; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>

    <h3>Artefactos antiguos</h3>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Planeta de origen</th>
            <th>Nivel de estabilidad</th>
            <th>Antigüedad</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($artefactosAntiguosAcortados as $artefactoAntiguo): ?>
            <tr>
                <td><?php echo $artefactoAntiguo->getId(); ?></td>
                <td><?php echo $artefactoAntiguo->getNombre(); ?></td>
                <td><?php echo $artefactoAntiguo->getPlanetaOrigen(); ?></td>
                <td><?php echo $artefactoAntiguo->getNivelEstabilidad(); ?></td>
                <td><?php echo $artefactoAntiguo->getAntiguedad(); ?></td>
                <td>
                    <form method="post" action="index.php?accion=editarArtefactoAntiguo" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $artefactoAntiguo->getId(); ?>" required>
                        Nombre:
                        <input type="text" name="nombre" value="<?php echo $artefactoAntiguo->getNombre(); ?>" required>
                        Planeta de origen:
                        <input type="text" name="planetaOrigen" value="<?php echo $artefactoAntiguo->getPlanetaOrigen(); ?>" required>
                        Nivel de estabilidad:
                        <input type="number" name="nivelEstabilidad" max="10" value="<?php echo $artefactoAntiguo->getNivelEstabilidad(); ?>" required>
                        Antigüedad:
                        <input type="number" name="antiguedad" value="<?php echo $artefactoAntiguo->getAntiguedad(); ?>" required>
                        <input type="submit" value="Guardar">

                        <a href="index.php?accion=eliminar&id=<?php echo $artefactoAntiguo->getId(); ?>">Eliminar</a>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php for ($i = 1; $i <= $totalPaginasArtefactosAntiguos; $i++): ?>
        <a href="index.php?accion=index&pActualFormasDeVida=<?php echo $paginaActualFormasDeVida; ?>&pActualMineralesRaros=<?php echo $paginaActualMineralesRaros; ?>&pActualArtefactosAntiguos=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>
</body>
</html>