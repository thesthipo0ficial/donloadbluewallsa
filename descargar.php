<?php
if (isset($_GET['archivo'])) {
    $rutaArchivo = $_GET['archivo'];

    // Verificar si el archivo existe
    if (file_exists($rutaArchivo)) {
        // Definir las cabeceras HTTP para forzar la descarga
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($rutaArchivo) . '"');
        header('Content-Length: ' . filesize($rutaArchivo));

        // Leer y enviar el archivo al navegador
        readfile($rutaArchivo);

        // Finalizar el script para evitar que se siga ejecutando
        exit();
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
