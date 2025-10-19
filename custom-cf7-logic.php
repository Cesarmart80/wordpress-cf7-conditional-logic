<?php
/**
 * Plugin Name: Custom CF7 Email Logic (PHP Portfolio Project)
 * Description: Versión final que manipula el cuerpo del correo para garantizar la sobrescritura.
 * Version: 6.0
 * Author: [IM - César Martiarena] 
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

// Usamos el filtro 'wpcf7_before_send_mail' que tiene más alcance
function cf7_modificar_asunto_final( $contact_form ) {
    
    // ** IMPORTANTE: REEMPLAZA 123 CON EL ID REAL DE TU FORMULARIO **
    if ( $contact_form->id() != '9db7515' ) { 
        return $contact_form;
    }

    $submission = WPCF7_Submission::get_instance();
    if ( ! $submission ) {
        return $contact_form;
    }
    $posted_data = $submission->get_posted_data();
    $mail = $contact_form->prop( 'mail' ); // Obtenemos el array del correo

    // 1. Lógica Condicional
    $subject_prefix = '[Mensaje del Cliente] '; 
    $new_subject = $subject_prefix . 'Consulta General'; // Asunto por defecto

    if ( isset( $posted_data['your-subject'] ) ) {
        $selected_subject = trim( $posted_data['your-subject'] );

        if ( $selected_subject == 'Soporte Técnico' ) {
            $new_subject = $subject_prefix . '🔴 ¡URGENTE! Solicitud de SOPORTE TÉCNICO';
        
        } elseif ( $selected_subject == 'Propuesta de Negocio' ) {
            $new_subject = $subject_prefix . 'Oportunidad de Negocio - Revisión Inmediata';
        }
    }

    // 2. FORZAR la sobrescritura del Asunto
    $mail['subject'] = $new_subject;

    // 3. Establecer las nuevas propiedades del correo
    $contact_form->set_properties( array( 'mail' => $mail ) );

    return $contact_form;
}

// Engancha la función al filtro.
add_filter( 'wpcf7_before_send_mail', 'cf7_modificar_asunto_final' );
