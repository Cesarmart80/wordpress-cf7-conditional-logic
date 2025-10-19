# 🛠️ WordPress Plugin: Lógica Condicional para Asuntos de Email (PHP)

Este proyecto demuestra la capacidad para implementar lógica de negocio avanzada dentro de WordPress, sin depender de add-ons o soluciones de terceros.

## Problema Resuelto

Los formularios de contacto estándar suelen enviar todos los mensajes con el mismo asunto, lo que dificulta que el equipo del cliente clasifique y priorice las consultas urgentes (ej. soporte técnico) o las oportunidades de negocio.

## Solución Técnica

Se desarrolló un mini-plugin independiente en **PHP** que intercepta los datos del formulario **antes** de que el correo sea enviado.

1.  Utiliza el hook de WordPress `add_filter` en combinación con `wpcf7_before_send_mail` para interactuar con el *core* de Contact Form 7.
2.  Implementa **lógica condicional (`if/elseif`)** para evaluar la selección del usuario en el campo `[your-subject]`.
3.  **Sobrescribe dinámicamente** el asunto del email, forzando un texto de alta prioridad (ej. "🔴 ¡URGENTE! Solicitud de SOPORTE TÉCNICO").

## Habilidades Demostradas

* **Desarrollo Back-end con PHP:** Capacidad para escribir código limpio y funcional fuera de los *themes*.
* **Arquitectura de WordPress:** Dominio en el uso de Hooks y Filtros.
* **Integración de Plugins:** Capacidad para extender las funcionalidades de plugins populares (CF7).
