<?php
if ( !defined( 'DIRECT_ACCESS' ) ) {
		header( 'Location: ../../' );
		exit();
}
/**
 * Pixie: The Small, Simple, Site Maker.
 * 
 * Licence: GNU General Public License v3
 * Copyright (C) 2010, Scott Evans
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see http://www.gnu.org/licenses/
 *
 * Title: Language File Spanish
 *
 * @package Pixie
 * @copyright 2008-2010 Scott Evans
 * @author Scott Evans
 * @author Sam Collett
 * @author Tony White
 * @author Isa Worcs
 * @author Victor Alvarez
 * @link http://www.getpixie.co.uk
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3
 *
 */

if ( !isset( $delete ) ) {
		$delete = NULL;
}
if ( !isset( $username ) ) {
		$username = NULL;
}
if ( !isset( $uname ) ) {
		$uname = NULL;
}
if ( !isset( $password ) ) {
		$password = NULL;
}
if ( !isset( $table_name ) ) {
		$table_name = NULL;
}
if ( !isset( $site_url ) ) {
		$site_url = NULL;
}
$lang = array(
		// system
		 'skip_to' => 'Ir al contenido',
		'view_site' => 'Ver web',
		'logout' => 'Salir',
		'license' => 'Liberado bajo la',
		'tag_line' => 'línea de la etiqueta',
		'latest_referrals' => 'Últimas referencias',
		'latest_activity' => 'Últimas Actividades',
		'feed_subscribe' => 'Suscribirse',
		'rss_feed' => 'RSS Feed',
		'when' => 'cuándo?',
		'who' => 'quién?',
		'what' => 'qué?',
		'from' => 'desde?',
		'switch_to' => 'Cambiar a',
		'a_few_seconds' => 'Algunos segundos',
		'a_minute' => '1 minuto',
		'minutes' => 'minutos',
		'a_hour' => '1 hora',
		'hours' => 'horas',
		'a_day' => '1 día',
		'days' => 'días',
		'ago' => 'hace',
		'user' => 'Usuario',
		'to' => 'a',
		'database_backup' => 'Copia de seguridad de la base de datos.',
		'database_info' => 'Asegúrese de que su base de datos es una copia de seguridad con frecuencia. Utilice el botón de la derecha manualmente copia de seguridad de base de datos. Las copias de seguridad se almacenan en los archivos / sqlbackups / carpeta y se puede descargar de la siguiente lista. La copia de seguridad más reciente se destaca.',
		'database_backups' => 'Copias de seguridad',
		'download' => 'Descargar',
		'delete' => 'Borrar',
		'delete_file' => 'Eliminar archivo?',
		'theme_info' => 'Los temas instalados actualmente se enumeran a continuación. Puede instalar más temas mediante la subida de un tema en el admin / carpeta de temas. Más temas pueden ser descargados de <a href="http://www.getpixie.co.uk"> www.getpixie.co.uk </ a> o usted puede crear fácilmente su propio usando CSS. El tema del sitio actual se resalta.',
		'theme_pick' => 'Seleccione un tema para su web',
		'theme_apply' => 'Aplicar este tema',
		'sure_delete_page' => '¿Estás seguro de que desea eliminar la',
		'sure_empty_page' => '¿Estás seguro de que desea vaciar la',
		'settings_page' => '(Settings page)',
		'settings_plugin' => 'plugin',
		'plugins' => 'Plugins',
		'plugins_info' => 'Plugins traer funcionalidad extra a ciertas páginas de su sitio web.',
		'empty' => 'Limpiar',
		'oops' => 'Ooops!',
		'feature_disabled' => 'Esta función está deshabilitada. La próxima versión de Pixie tendrá esta ordenados!',
		'pages_in_navigation' => 'Artículos en la navegación',
		'pages_in_navigation_info' => 'Estas páginas aparecen en la navegación sus sitios web, para cambiar el orden de las páginas de arrastre hacia arriba y abajo con las flechas. La página en la parte superior de la lista aparecerá en primer lugar en su navegación.',
		'pages_outside_navigation' => 'Páginas de navegación fuera de',
		'pages_outside_navigation_info' => 'Estas páginas son visibles para el público, pero no aparecen en la navegación por sus sitios web.',
		'pages_disabled' => 'Las páginas de movilidad reducida',
		'pages_disabled_info' => 'stas páginas no son visibles.',
		'edit_user' => 'Editar Usuario',
		'create_user' => 'Crear nuevo usuario',
		'create_user_info' => 'An email we be sent to the new user with details of how to login and a randomly generated password.',
		'user_info' => 'A continuación se muestra una lista de los usuarios que tienen acceso a Pixie. Usted puede agregar más usuarios para ayudar a manejar su sitio web mediante el formulario de la derecha. La cuenta de superusuario es resaltada.',
		'user_delete_confirm' => '¿Estás seguro de querer eliminar al usuario :',
		'tags' => 'Etiquetas',
		'upload' => 'Subido',
		'file_manager_info' => 'El tamaño máximo se establece en 100Mb. Por favor, sea paciente cuando se envían archivos de gran tamaño.',
		'file_manager_latest' => 'Último indexado',
		'file_manager_tagged' => 'Todos los archivos etiquetados:',
		'filename' => 'Nombre de archivo',
		'filedate' => 'Modificar fecha',
		'results_from' => 'Resultado formulario',
		'sure_delete_entry' => 'Eliminar entrada',
		'from_the' => 'desde el',
		'page_settings' => 'Configuración de página',
		'advanced' => 'Avanzado',
		'your_site_has' => 'Su web tiene',
		'visitors_online' => 'visita(s) online.',
		'in_the_last' => 'En los últimos',
		'site_visitors' => 'Visitas a la web.',
		'page_views' => 'Visitas a la página.',
		'spam_attacks' => 'Ataques Spam',
		'last_login_on' => 'Último acceso en :',
		'quick' => '(Quick links)',
		'links' => 'Links',
		'new_entry' => 'Añadir nuevo ',
		'entry' => '(Entry Number)',
		'edit' => 'Editar ',
		'page' => 'Página.',
		'blog' => 'Blog.',
		'search' => 'Buscar',
		'forums' => 'Foros.',
		'downloads' => 'Descargas.',
		'create_backup' => 'Crear copia de seguridad',
		'button_backup' => 'Copia de seguridad de la Base de datos',
		'page_type' => 'Tipo de página',
		'settings_page_new' => 'Crear nueva',
		'total_records' => 'Todos los guardados',
		'showing_from_record' => 'Mostrar guardados',
		'page(s)' => 'página(s)',
		'help' => 'Ayuda',
		'statistics' => 'Estadísticas',
		'help_settings_page_type' => 'Cuando cree una página nueva puede escoger estos tres tipos:',
		'help_settings_page_dynamic' => 'Ejemplos de páginas dinámicas son los blogs y páginas de noticias. Estas páginas de soporte de feeds RSS y comentarios.',
		'help_settings_page_static' => 'Una página estática es simplemente un bloque de HTML (y PHP si quieres). Estas páginas se adaptan a la electricidad estática o rara vez se actualizan los contenidos.',
		'help_settings_page_module' => 'Una página de módulo agrega el contenido específico de su sitio. Los módulos pueden ser descargados de <a href="http://www.getpixie.co.uk"> www.getpixie.co.uk </ a>, un ejemplo de que es el módulo de eventos. Los módulos son a veces incluido con plugins.',
		'help_settings_user_type' => 'Cuando se agrega un nuevo usuario puede elegir entre tres tipos :',
		'help_settings_user_admin' => '<b>Administrador</b> - Los administradores tienen acceso a la totalidad de Pixie, que pueden modificar la configuración, escriba el contenido y hacer lo que quieran.',
		'help_settings_user_client' => '<b>Cliente</b> - Un cliente sólo puede agregar contenido a Pixie, no son capaces de modificar la configuración de un sitio.',
		'help_settings_user_user' => '<b>Usuario</b> - Pixie Un usuario sólo tiene acceso a la pestaña Panel, que tienen un perfil de Pixie y puede ver las estadísticas del sitio web.',
		'install_module' => 'Instalar un nuevo módulo o plugin',
		'select_module' => 'Seleccione el módulo o plugin que desea activar',
		'all_installed' => 'Todos los módulos disponibles y los plugins se encuentran activos e instalado.',
		
		// system messages
		'error_save_settings' => 'Error al guardar la configuración.',
		'ok_save_settings' => 'La nueva configuración se han salvado y aplicada.',
		'comment_spam' => 'Comentario spam bloqueado.',
		'failed_login' => 'Error de acceso a la web.',
		'login_exceeded' => 'Ha superado la cantidad máxima de intentos (3) para acceder a Pixie, por favor, inténtelo de nuevo en 24 horas.',
		'logins_exceeded' => 'Se detectaron 3 intentos fallidos al acceder, Pixie ha bloqueado su IP durante 24 horas.',
		'ok_login' => 'Usuario ' . $username . ' conectado.',
		'failed_protected_page' => 'No se puede eliminar la página 404, puede ser un posible intento de hack.',
		'ok_delete_page' => 'Se han eliminado correctamente el',
		'ok_delete_entry' => 'Se han eliminado correctamente la entrada (#' . $delete . ') de el',
		'failed_delete' => 'No se puede eliminar (#' . $delete . ').',
		'login_missing' => 'Sírvase proporcionar la información de acceso necesaria.',
		'login_incorrect' => 'Los datos de su acceso son incorrectos.',
		'forgotten_missing' => 'Usted no ha proporcionado un nombre de usuario o dirección de correo electrónico.',
		'forgotten_ok' => 'Una nueva contraseña ha sido enviada a su dirección de correo electrónico.',
		'forgotten_log_error' => 'Fallido intento de restablecimiento de contraseña.',
		'forgotten_log_ok' => 'Una nueva contraseña fue enviada a ',
		'rss_access_attempt' => 'Intento no autorizado a acceder a un feed RSS privado. Es posible que tenga que volver a suscribirse a la fuente desde dentro de Pixie.',
		'unknown_error' => 'Algo salió mal. Es posible (aunque no probable) la base de datos se ha reducido o se salió del lado equivocado de la cama?',
		'unknown_edit_url' => 'La dirección URL proporcionada para editar esta página no es válida.',
		'unknown_referrer' => 'Referencia desconocida.',
		'profile_name_error' => 'Por favor introduzca su nombre completo.',
		'profile_email_error' => 'Por favor proporcione una dirección de correo electrónico válida.',
		'profile_web_error' => 'Por favor proporcione una dirección web válida.',
		'profile_ok' => 'Su perfil ha sido actualizado.',
		'profile_password_error' => 'Pixie no pudo guardar su nueva contraseña. ¿Por qué no intentarlo de nuevo?',
		'profile_password_ok' => 'Su contraseña Pixie ha sido actualizado. Usted tendrá que usar la próxima vez que te registres.',
		'profile_password_invalid' => 'Usted no ha facilitado una contraseña válida y vigente.',
		'profile_password_invalid_length' => 'Las contraseñas deben tener al menos 6 caracteres de longitud.',
		'profile_password_match_error' => 'Las contraseñas que suministran no concuerdan.',
		'profile_password_missing' => 'Sírvase proporcionar toda la información requerida.',
		'site_name_error' => 'Su web necesita un nombre.',
		'site_url_error' => 'Sírvase proporcionar una URL del sitio web válida.',
		'backup_ok' => 'Creado con éxito una nueva copia de seguridad de la base de datos.',
		'backup_delete_ok' => 'Se han eliminado correctamente la copia de seguridad :',
		'backup_delete_no' => 'No se puede eliminar la copia de seguridad más recientes.',
		'backup_delete_error' => 'Pixie no puede eliminar esta copia de seguridad.',
		'theme_ok' => 'El tema se ha aplicado a su sitio web.',
		'theme_error' => 'Pixie no puede cambiar el tema.',
		'all_content_deleted' => 'Todo el contenido fue eliminado de',
		'user_delete_ok' => 'Fue eliminado de Pixie.',
		'user_delete_error' => 'No se puede eliminar usuario',
		'user_name_missing' => 'por favor introduzca un usuario.',
		'user_realname_missing' => 'por favor introduzca un nombre.',
		'user_password_missing' => 'Sírvase proporcionar una contraseña.',
		'user_email_error' => 'Por favor proporcione una dirección de correo electrónico válida.',
		'user_update_ok' => 'Configuraciones guardadas nuevo',
		'user_duplicate' => 'Ya existe un usuario con ese nombre, pruebe otro.',
		'user_new_ok' => 'Creado nuevo usuario:',
		'saved_new_settings_for' => 'Configuraciones guardadas nuevo para la',
		'file_upload_error' => 'Pixie había un problema de la inserción de la información de archivo en la base de datos, el archivo se puede haber subido todavía.',
		'file_upload_tag_error' => 'Por favor, asegúrese de que marque sus subidas.',
		'file_delete_ok' => 'Se han eliminado correctamente de archivo :',
		'file_delete_fail' => 'Pixie no pudo eliminar :',
		'form_build_fail' => 'No se puede construir una forma editable ... ¿Sabía usted proporcionar los detalles tabla correcta en el módulo?',
		'date_error' => 'Que nos ha facilitado una fecha no válida.',
		'email_error' => 'Por favor, asegúrese de que ha entrado en una dirección de correo electrónico válida.',
		'url_error' => 'Por favor, asegúrese de haber introducido una URL válida.',
		'is_required' => 'requerido.',
		'saved_new' => 'Guardada nueva entrada',
		'in_the' => 'en la',
		'on_the' => 'en la',
		'saved_new_page' => 'Creada nueva página',
		'save_update_entry' => 'Guardados los cambios de su entrada',
		'bad_cookie' => 'Su cookie de sesión ha caducado. Usted tendrá que ingresar de nuevo.',
		'no_module_selected' => 'Usted no ha seleccionado un módulo o plugin para instalar, inténtelo de nuevo.',
		'install_module_ok' => 'se ha instalado con éxito.',
		
		// helper
		'helper_plugin' => 'Usted no puede modificar la configuración de los plugins, que sin embargo se puede vaciar un plugin o eliminar usando los botones de arriba. Si elimina un plugin, por ejemplo el plugin de comentarios, los usuarios ya no será capaz de dejar comentarios en sus páginas dinámicas.',
		'helper_nocontent' => 'Esta página no tiene ningún contenido, utilice el botón verde de arriba para añadir la primera entrada (en el botón verde no está disponible en el plugin de comentarios).',
		'helper_nopages' => 'Un hombre sabio dijo una vez que un sitio web sin páginas es como un pájaro sin alas ... su no va a ninguna parte. Utilice el formulario a la derecha para agregar la primera página de su sitio. Una vez que usted ha hecho que este mensaje profundo desaparecerá.',
		'helper_nopages404' => 'En su sitio sólo cuenta con una página, esa página es la página de error 404 y se puede editar más adelante.',
		'helper_nopagesadmin' => 'Puede <a href="?s=settings"> añadir más páginas en las cosas \ "Configuración \" sección </ a> de Pixie.',
		'helper_nopagesuser' => 'En contacto con un administrador del sitio y les pedimos que añadir páginas a su sitio web.',
		'helper_search' => 'No se han encontrado. Pruebe a buscar de nuevo.',
		
		// navigation
		'nav1_settings' => 'Configuración',
		'nav1_publish' => 'Publicar',
		'nav1_home' => 'Tablero',
		'nav2_home' => 'Inicio',
		'nav2_profile' => 'Perfil',
		'nav2_security' => 'Contraseña',
		'nav2_logs' => 'Registros',
		'nav2_delete' => 'Eliminar Cuenta',
		'nav2_pages' => 'Paginas',
		'nav2_files' => 'Administrador de Archivos',
		'nav2_backup' => 'Copia de seguridad',
		'nav2_users' => 'Usuarios',
		'nav2_blocks' => 'Bloques',
		'nav2_theme' => 'Tema',
		'nav2_site' => 'Web',
		'nav2_settings' => 'Configuración',
		
		// forms
		'form_login' => 'Acceder',
		'form_username' => 'Nombre de usuario',
		'form_password' => 'Contraseña',
		'form_rememberme' => 'Permanecer conectado en esta computadora?',
		'form_forgotten' => '¿Olvidó su contraseña?',
		'form_returnto' => 'Volver a ',
		'form_help_forgotten' => 'Por favor, introduzca su correo electrónico o nombre de usuario para su cuenta de Pixie. Su contraseña le será restablecer y correo electrónico.',
		'form_resetpassword' => 'Restablecer contraseña',
		'form_name' => 'Nombre completo',
		'form_usernameoremail' => 'Nombre de usuario o correo',
		'form_telephone' => 'Teléfono',
		'form_email' => 'Correo',
		'form_website' => 'página web',
		'form_occupation' => 'Trabajo',
		'form_address_street' => 'Dirección',
		'form_address_town' => 'Ciudad',
		'form_address_county' => 'Condado',
		'form_address_pcode' => 'Código Postal',
		'form_address_country' => 'Pais',
		'form_address_biography' => 'Biografía',
		'form_fl1' => 'Sus enlaces favoritos',
		'form_button_save' => 'Guardar',
		'form_button_update' => 'Actualizar',
		'form_button_cancel' => 'Cancelar',
		'form_button_install' => 'Instalar',
		'form_button_create_page' => 'Crear página',
		'form_current_password' => 'Contraseña actual',
		'form_new_password' => 'Nueva Contraseña',
		'form_confirm_password' => 'Confirmar Contraseña',
		'form_tags' => 'Etiquetas',
		'form_content' => 'Contenido',
		'form_comments' => 'Comentarios',
		'form_public' => 'Pública',
		'form_optional' => '(opcional)',
		'form_required' => '*',
		'form_title' => 'Titulo',
		'form_posted' => 'Fecha &amp; Hora',
		'form_date' => 'Fecha &amp; Hora',
		'form_help_comments' => '¿Le gusta que la gente pueda comentar sobre este mensaje?',
		'form_help_public' => '¿Te ha gustado este post / página sea visible por el público? (Seleccione No para guardarlo como un borrador.)',
		'form_help_tags' => 'Etiquetas funcionan como las categorías y hacer las cosas más fáciles de encontrar. Introduzca las palabras clave separadas por espacios.',
		'form_help_current_tags' => 'Sugerencias:',
		'form_help_current_blocks' => 'Bloques disponibles:',
		'form_php_warning' => '(Esta página contiene PHP. El editor de texto enriquecido se ha deshabilitado para permitir la edición de este código de seguridad avanzadas.)',
		'form_legend_site_settings' => 'Ajustar la configuración de su sitio web',
		'form_site_name' => 'Nombre de la web',
		'form_help_site_name' => '¿Qué le gustaría que su sitio se llama?',
		'form_page_name' => 'Nombre de la URL',
		'form_help_page_name' => 'Esto será utilizado para crear la URL de la página (por ejemplo, http://www.su-sitio.com/<b>alguna-página</ b>/.)',
		'form_page_display_name' => 'Nombre de la página',
		'form_help_page_display_name' => '¿Qué le gustaría que su página se llama?',
		'form_page_description' => 'De descripción de página',
		'form_help_page_description' => 'Escribir una descripción de tu página.',
		'form_page_blocks' => 'Bloques de la página',
		'form_help_page_blocks' => 'Los bloques son areas extra de contenido. Los nombres de los bloques deberan estar separados por espacios. (El manejo de bloques sera mejorado en futuras versiones de Pixie).',
		'form_searchable' => 'Indexable',
		'form_help_searchable' => '¿Te gusta esta página para aparecer en las búsquedas del público?',
		'form_posts_per_page' => 'Entradas en esta página',
		'form_help_posts_per_page' => '¿Cuántas entradas quieres mostrar en esta página?',
		'form_rss' => 'RSS',
		'form_help_rss' => '¿Te gusta esta página para generar un feed RSS de su contenido?',
		'form_in_navigation' => 'De Navegación',
		'form_help_in_navigation' => '¿Te gusta esta página que se muestra en la navegación de su página web?',
		'form_site_url' => 'URL del sitio',
		'form_help_site_url' => '¿Cuál es la URL de tu sitio web? (por ejemplo, http://www.su-sitio.com/alguna carpeta/.)',
		'form_site_homepage' => 'página de inicio',
		'form_help_homepage' => '¿Qué página de su sitio web quieres que vean los usuarios en primer lugar?',
		'form_site_keywords' => 'Palabras clave del sitio',
		'form_help_site_keywords' => 'Escriba palabras clave separadas por coma. (ej: este, sitio, la, lleva).',
		'form_site_author' => 'Autor de la web',
		'form_site_copyright' => 'Copyright del sitio',
		'form_site_curl' => 'Limpieza URLs?',
		'form_help_site_curl' => '¿Quiere que su sitio para usar URLs limpios? Una URL limpio parece www.su-sitio.com/limpio/ como apposed a www.su-sitio.com?s=limpio. Limpieza de trabajo URL en Linux sólo los hosts.',
		'form_legend_pixie_settings' => 'Configure la forma en la que Pixie se comporta',
		'form_pixie_language' => 'Idioma',
		'form_help_pixie_language' => 'Seleccione el idioma que desea utilizar.',
		'form_pixie_timezone' => 'Zona horaria',
		'form_help_pixie_timezone' => 'Seleccione su zona horaria para que se muestre la hora correctamente.',
		'form_pixie_dst' => 'Horario de ahorro de energia',
		'form_help_pixie_dst' => '¿Te gustaría Pixie para ajustar automáticamente el tiempo de acuerdo con el horario de verano?',
		'form_pixie_date' => 'Fecha &amp; Hora',
		'form_help_pixie_date' => 'Seleccione su formato preferido para fecha y hora.',
		'form_pixie_rte' => 'Editor de texto',
		'form_help_pixie_rte' => '¿Le gustaría usar el editor de texto Ckeditor? (Se hace la edición de su sitio realmente fácil.)',
		'form_pixie_logs' => 'Tiempo en el que expiran los registros (Logs)',
		'form_help_pixie_logs' => 'Después de días que quieres borrar el archivo de registro? (Logs)',
		'form_pixie_sysmess' => 'Mensaje del Sistema',
		'form_help_pixie_sysmess' => 'Este mensaje se mostrará a cada usuario Pixie cuando ingresan a Pixie.',
		'form_help_settings_page_type' => '¿Qué tipo de página que te gustaría hacer?',
		'form_legend_user_settings' => 'Configuración de usuario',
		'form_user_username' => 'Nombre de usuario',
		'form_help_user_username' => 'Los nombres de usuario no pueden llevar espacios',
		'form_user_realname' => 'Nombre completo',
		'form_help_user_realname' => 'Introduzca el nombre completo del usuario',
		'form_user_permissions' => 'Permisos',
		'form_help_user_permissions' => '¿Qué permisos le gustaría tener este usuario?',
		'form_help_user_permissions_block' => '¿Qué tipo de usuario va a ser esto?',
		'form_button_create_user' => 'Crear usuario',
		'form_upload_file' => 'Archivo',
		'form_help_upload_file' => 'Seleccione un archivo para subir desde su ordenador.',
		'form_help_upload_tags' => 'Palabras clave separadas por espacios',
		'form_upload_replace_files' => 'Reemplace los archivos?',
		'form_help_upload_replace_files' => '¿Estás tratando de reemplazar un archivo existente?',
		'form_search_words' => 'Palabras clave',
		'form_privs' => 'Permisos de la página',
		'form_help_privs' => '¿Quién le gustaría ser capaz de editar esta página?',
		
		//email
		'email_newpassword_subject' => 'Nueva contraseña (' . str_replace( 'http://', "", $site_url ) . ') - Pixie ',
		'email_changepassword_subject' => 'Contraseña cambiada (' . str_replace( 'http://', "", $site_url ) . ') - Pixie ',
		'email_newpassword_message' => 'Su contraseña se ha establecido en : ',
		'email_account_close_message' => 'Su cuenta de Pixie fue cerrada en ' . $site_url . '. Póngase en contacto con el administrador del sitio para más información.',
		'email_account_close_subject' => 'Cuenta cerrada (' . str_replace( 'http://', "", $site_url ) . ') - Pixie ',
		'email_account_edit_subject' => 'Información importante acerca de su cuenta (' . str_replace( 'http://', "", $site_url ) . ') - Pixie ',
		'email_account_new_subject' => 'Nueva cuenta (' . str_replace( 'http://', "", $site_url ) . ') - Pixie ',
		
		//front end
		'continue_reading' => 'Seguir leyendo',
		'permalink' => 'Enlace permanente',
		'theme' => 'Tema',
		'navigation' => 'Navegación',
		'skip_to_content' => 'Ir al contenido &raquo;',
		'skip_to_nav' => 'Saltar a navegación &raquo;',
		'by' => 'Por',
		'on' => 'el',
		'view' => 'Ver',
		'profile' => 'perfil',
		'all_posts_tagged' => 'todas las entradas con etiquetas',
		'permalink_to' => 'Enlace permanente a',
		'comments' => 'Comentarios',
		'comment' => 'Comentario',
		'no_comments' => 'Sin comentarios...',
		'comment_closed' => 'Comentarios cerrados.',
		'comment_thanks' => 'Gracias por su comentario.',
		'comment_leave' => 'Dejar un comentario',
		'comment_form_info' => 'El formulario de comentarios posee <a href="http://gravatar.com" title="Consigue un Gravatar">Gravatar</a> y <a href="http://www.cocomment.com" title="Sigue y comparte tus comentarios">coComment</a>.',
		'comment_name' => 'Nombre',
		'comment_email' => 'Correo',
		'comment_web' => 'Web',
		'comment_button_leave' => 'Enviar comentario',
		'comment_name_error' => 'por favor introduzca su nombre.',
		'comment_email_error' => 'Por favor proporcione una dirección de correo electrónico válida.',
		'comment_web_error' => 'Por favor proporcione una dirección web válida.',
		'comment_throttle_error' => 'Usted está publicando comentarios demasiado deprisa, más despacio.',
		'comment_comment_error' => 'Introduzca un comentario.',
		'comment_save_log' => 'Comentado en: ',
		'tagged' => 'Etiquetas',
		'tag' => 'Etiqueta',
		'popular' => 'Los más populares',
		'archives' => 'Archivos',
		'posts' => 'Entradas',
		'last_updated' => 'Última actualización',
		'edit_post' => 'Editar esta entrada',
		'edit_page' => 'Editar esta página',
		'popular_posts' => 'Entradas populares',
		'next_post' => 'Siguiente entrada',
		'next_page' => 'Siguiente página',
		'previous_post' => 'Entrada anterior',
		'previous_page' => 'página anterior',
		'dynamic_page' => 'página',
		'user_name_dup' => 'Error al guardar el entrada ' . $table_name . ' nuevo. Posible, el nombre de usuario duplicados.',
		'user_name_save_ok' => 'Guardadas por el usuario nuevo ' . $uname . ', una contraseña temporal se ha creado (<b>' . $password . '</b>).',
		'file_del_filemanager_fail' => 'Eliminación de archivos no. Por favor, elimine manualmente el archivo.',
		'upload_filemanager_fail' => 'Error de subida. Por favor, compruebe que la carpeta es de escritura y tiene los permisos correctos conjunto.',
		'filemanager_max_upload' => 'El servidor de acogida aceptará que se suban para el tamaño máximo de archivo de : ',
		'ck_select_file' => 'Haga clic en un archivo por su nombre para crear un vínculo.',
		'ck_toggle_advanced' => 'Activar modo avanzado' 
);
?>