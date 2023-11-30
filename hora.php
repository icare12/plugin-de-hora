<?php
/*
Plugin Name: Current Time Highlighter
Description: A WordPress plugin to highlight the current time using a shortcode. [current_time_highlight]
Version: 1.0
Author: icar
*/

// Función para obtener la hora actual y resaltarla
function highlight_current_time() {
    $output = "<div id='current-time-container' style='position: fixed; bottom: 20px; right: 20px; background-color: #333; color: #fff; padding: 15px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); font-family: 'Arial', sans-serif;'>";
    $output .= "Hora actual: <span id='current-time' style='font-size: 18px; font-weight: bold;'></span></div>";

    // Agregar el script de JavaScript
    $output .= "<script>
        function updateCurrentTime() {
            var currentTimeElement = document.getElementById('current-time');
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            // Convertir a formato de 12 horas
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // La medianoche es 12 AM y el mediodía es 12 PM

            currentTimeElement.textContent = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
        }

        // Actualizar cada segundo
        setInterval(updateCurrentTime, 1000);
        
        // Inicializar la hora al cargar la página
        updateCurrentTime();
    </script>";

    return $output;
}

// Función para registrar el shortcode
function register_current_time_shortcode() {
    add_shortcode('current_time_highlight', 'highlight_current_time');
}

// Hook para registrar el shortcode durante la inicialización de WordPress
add_action('init', 'register_current_time_shortcode');
?>
