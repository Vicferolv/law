<?php
include("cabecera.php");

if (isset($_POST['puntuacion']) && $_POST['puntuacion'] != '') {
    $puntuacion = intval($_POST['puntuacion']);
    $consulta = "SELECT * FROM libros WHERE puntuacion = $puntuacion";
} else {
    $consulta = "SELECT * FROM libros";
}

$resultado = mysqli_query($conn, $consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Libros - Biblioteca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; }
    </style>
</head>
<body class="p-4 md:p-8">

    <div class="max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-2xl">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-6 border-b pb-3">📚 Registro de Libros</h2>

        <form method="POST" action="" class="mb-8 p-4 bg-gray-50 rounded-lg shadow-inner flex flex-wrap gap-4 items-end">
            
                <div class="flex-grow min-w-[150px]">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre_val); ?>"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2">
            </div>
            
            <div class="flex-grow min-w-[150px]">
                <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
                <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($autor_val); ?>"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2">
            </div>

            <div class="flex-grow min-w-[100px]">
                <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                <input type="text" id="isbn" name="isbn" value="<?php echo htmlspecialchars($isbn_val); ?>"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2">
            </div>

            <div class="flex-grow min-w-[120px]">
                <label for="puntuacion" class="block text-sm font-medium text-gray-700">Puntuación</label>
                <select id="puntuacion" name="puntuacion"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 bg-white">
                    <option value="" <?php if ($puntuacion_val == '') echo 'selected'; ?>>-- Todos --</option>
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php if ($puntuacion_val == $i) echo 'selected'; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>

            <div class="flex-grow min-w-[150px]">
                <label for="genero" class="block text-sm font-medium text-gray-700">Género</label>
                <input type="text" id="genero" name="genero" value="<?php echo htmlspecialchars($genero_val); ?>"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2">
            </div>
            
            <div class="flex gap-2">
                <button type="submit" 
                        class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    🔍 Buscar
                </button>
                <a href="registrolibros.php" 
                   class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    🧹 Limpiar
                </a>
            </div>
        </form>

        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider rounded-tl-lg">Nombre</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Autor</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ISBN</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Puntuación</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider rounded-tr-lg">Género</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

             <?php
if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_array($resultado)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['autor']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['isbn']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['puntuacion']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['genero']) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No se han encontrado libros</td></tr>";
}

mysqli_close($conn);
?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>