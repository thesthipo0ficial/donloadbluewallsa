<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['url_imagen'])) {
    // Obtener la URL de la imagen ingresada por el usuario
    $urlImagen = $_POST['url_imagen'];

    // Verificar si la URL es válida (puedes agregar validaciones adicionales si es necesario)
    if (filter_var($urlImagen, FILTER_VALIDATE_URL)) {
        // Generar un nombre de archivo único
        $nombreArchivo = 'bluewalls_' . uniqid() . '.jpg';

        // Definir la ruta completa donde se guardará el archivo en tu servidor
        $rutaArchivo = 'img/' . $nombreArchivo;

        // Descargar y guardar la imagen en la carpeta con el nombre generado
        $imagenDescargada = file_get_contents($urlImagen);
        file_put_contents($rutaArchivo, $imagenDescargada);

        // Generar el enlace de descarga directa con la extensión .jpg
        $enlaceDescarga = 'https://donloadimageandvideosbluewalls.infinityfreeapp.com/descargar.php?archivo=' . $rutaArchivo;

        // Mostrar el enlace en la respuesta
        echo $enlaceDescarga;

        exit();
    } else {
        echo "URL de imagen no válida.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
