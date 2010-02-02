<?php
if (!defined('DIRECT_ACCESS')) { header( 'Location: ../../' ); exit(); }
//*****************************************************************//
// Pixie: The Small, Simple, Site Maker.                           //
// ----------------------------------------------------------------//
// Licence: GNU General Public License v3                   	   //
// Titel: Taalbestand (Nederlands NL).                             //
//*****************************************************************//

$lang = array(
	// system
	'skip_to' => 'Verder naar inhoud',
	'view_site' => 'Bekijk Site',
	'logout' => 'Uitloggen',
	'license' => 'Vrijgegeven onder de',
	'tag_line' => 'De Kleine, Eenvoudige Site Maker',
	'latest_referrals' => 'Laatste Verwijzingen',
	'latest_activity' => 'Laatste Activiteiten',
	'feed_subscribe' => 'Abonneren',
	'rss_feed' => 'RSS Feed',
	'when' => 'Wanneer?',
	'who' => 'Wie?',
	'what' => 'Wat?',
	'from' => 'Van?',
	'switch_to' => 'Schakel naar',
	'a_few_seconds' => 'Een paar seconden',
	'a_minute' => '1 minuut',
	'minutes' => 'minuten',
	'a_hour' => '1 uur',
	'hours' => 'uur',
	'a_day' => '1 dag',
	'days' => 'dagen',
	'ago' => 'geleden.',
	'user' => 'Gebruiker',
	'to' => 'tot',
	'database_backup' => 'Database Backup',
	'database_info' => 'Zorg ervoor dat je database regelmatig wordt ge-backupped. Gebruik de knop rechts om handmatig een backup te maken. De backups worden opgeslagen in de files/sqlbackups/ map and kunnen gedownload worden van de onderstaande lijst. De meest recente backup is gemarkeerd.',
	'database_backups' => 'Backups',
	'download' => 'Download',
	'delete' => 'Verwijder',
	'delete_file' => 'Verwijder bestand?',
	'theme_info' => 'De al ge&iuml;nstalleerde thema\'s zijn hier opgesomd. Je kunt meer thema\'s installeren door een thema te uploaden in de map admin/themes. Meer thema\'s kunnen gedownload worden op <a href="http://www.getpixie.co.uk">www.getpixie.co.uk</a> of je kunt er eenvoudig zelf een maken met CSS. Het huidige thema is gemarkeerd.',
	'theme_pick' => 'Kies een thema voor je site',
	'theme_apply' => 'Pas dit thema toe',
	'sure_delete_page' => 'Weet je zeker dat je dit wilt verwijderen',
	'sure_empty_page' => 'Weet je zeker dat je dit wilt legen',
	'settings_page' => 'pagina',
	'settings_plugin' => 'plugin',
	'plugins' => 'Plugins',
	'plugins_info' => 'Plugins voegen extra functionaliteit toe aan bepaalde pagina\'s van je website.',
	'empty' => 'Leeg',
	'oops' => 'Oeps!',
	'feature_disabled' => 'Deze functie is momenteel uitgeschakeld. De volgende versie van Pixie zal dit opgelost hebben!',
	'pages_in_navigation' => 'Pagina\'s in navigatie',
	'pages_in_navigation_info' => 'Deze pagina\'s worden weergegeven in je website navigatie, om de volgorde van de pagina\'s te veranderen sleep ze omhoog of omlaag met de pijlen. De pagina bovenaan de lijst zal als eerste in je navigatie staan.', 
	'pages_outside_navigation' => 'Pagina\'s buiten navigatie',
	'pages_outside_navigation_info' => 'Deze pagina\'s zijn zichtbaar voor iedereen maar komen niet voor in de navigatie van je website.', 
	'pages_disabled' => 'Uitgeschakelde pagina\'s',
	'pages_disabled_info' => 'Deze pagina\'s zijn niet te bekijken.',
	'edit_user' => 'Wijzig Gebruiker',
	'create_user' => 'Cree&euml;r nieuwe gebruiker',
	'create_user_info' => 'Er zal een email worden gestuurd naar de nieuwe gebruiker met uitleg over hoe in te loggen en een willekeurig gegenereerd wachtwoord.',
	'user_info' => 'Hieronder een lijst van de gebruikers die toegang hebben tot Pixie. Je kunt gebruikers toevoegen om je te helpen met het onderhouden van je site door middel van het formulier rechts. De super gebruiker account is gemarkeerd.',
	'user_delete_confirm' => 'Weet je zeker dat je deze gebruiker wilt verwijderen:',
	'tags' => 'Tags',
	'upload' => 'Uploaden',
	'file_manager_info' => 'De maximale bestandsgrootte is ingesteld op 100Mb. Even geduld bij het indienen van grote bestanden.',
	'file_manager_latest' => 'Laatste Uploads',
	'file_manager_tagged' => 'Alle bestanden getagged:',
	'filename' => 'Bestandsnaam',
	'filedate' => 'Wijzigingsdatum',
	'results_from' => 'Resultaten van',
	'sure_delete_entry' => 'Verwijder item',
	'from_the' => 'van de',
	'page_settings' => 'Pagina instellingen',
	'advanced' => 'Geavanceerd',
	'your_site_has' => 'Je site heeft',
	'visitors_online' => 'bezoeker(s) online.',	
	'in_the_last' => 'In de laatste',
	'site_visitors' => 'Site Bezoeker(s).',
	'page_views' => 'Pagina Weergave(s).',
	'spam_attacks' => 'Spam Aanval(len)',
	'last_login_on' => 'Laatste login op:',
	'quick' => 'Snelle',
	'links' => 'Links',
	'new_entry' => 'Toevoegen ',
	'entry' => 'Inhoud.',
	'edit' => 'Wijzig ',
	'page' => 'pagina.',
	'blog' => 'Blog.',
	'search' => 'Zoeken',
	'forums' => 'Forums.',
	'downloads' => 'Downloads.',
	'create_backup' => 'Maak Backup',
	'button_backup' => 'Database backuppen',
	'page_type' => 'Pagina Type',
	'settings_page_new' => 'Maak een nieuwe',
	'total_records' => 'Totaal aantal records',
	'showing_from_record' => 'toon van record',
	'page(s)' => 'pagina(s)',
	'help' => 'Help',
	'statistics' => 'Statistieken',
	'help_settings_page_type' => 'Bij het toevoegen van een nieuwe pagina kun je uit drie types kiezen:',
	'help_settings_page_dynamic' => 'Voorbeelden van dynamische pagina\'s zijn blogs en nieuws pagina\'s. Deze pagina\'s ondersteunen RSS feeds en commentaar.',
	'help_settings_page_static' => 'Een statische pagina is eenvoudigweg een stuk HTML (en PHP als je dat wilt). Deze pagina\'s zijn goed voor statische of zelden bijgewerkte inhoud.',
	'help_settings_page_module' => 'Een module pagina voegt specifieke inhoud aan je site toe. Modules kunnen gewdownload worden van <a href="http://www.getpixie.co.uk">www.getpixie.co.uk</a>, een voorbeeld hiervan is de evenementen module. Modules zijn soms gebundeld met plugins.',
	'help_settings_user_type' => 'Bij het toevoegen van een nieuwe gebruiker kun je kiezen uit drie types:',
	'help_settings_user_admin' => '<b>Administrator</b> - Administrators hebben toegang tot alles binnen Pixie, ze kunnen instellingen veranderen, inhoud schrijven en alles wat ze verder maar willen.',
	'help_settings_user_client' => '<b>Client</b> - Een client kan alleen inhoud toevoegen aan Pixie, ze kunnen de instellingen niet aanpassen.',
	'help_settings_user_user' => '<b>User</b> - Een Pixie user (gebruiker) heeft alleen toegang tot de Dashboard tab, ze hebben een Pixie profiel en kunnen de website statistieken zien.',
	'install_module' => 'Installeer een nieuwe module of plugin',
	'select_module' => 'Selecteer de module of plugin die je wilt activeren',
	'all_installed' => 'Alle beschikbare modules en plugins zijn momenteel actief en ge&iuml;nstalleerd.',

	// system messages
	'error_save_settings' => 'Fout bij het opslaan van instellingen.',
	'ok_save_settings' => 'Je nieuwe instellingen zijn opgeslagen en toegepast.',
	'comment_spam' => 'Spam-commentaar geblokkeerd.',
	'failed_login' => 'Mislukte login poging.',
	'login_exceeded' => 'U heeft het maximaal aantal pogingen (3) om in te loggen op Pixie overschreden, probeer het opnieuw over 24 uur.',
	'logins_exceeded' => '3 mislukte login pogingen ontdekt. Pixie heeft dit IP-adres voor 24 uur geblokkeerd.',
	'ok_login' => 'Gebruiker ' . $username . ' logde in.',
	'failed_protected_page' => 'Niet in staat de 404-pagina te verwijderen, mogelijke hack poging.',
	'ok_delete_page' => 'Succesvolle verwijdering van',
	'ok_delete_entry' => 'Verwijderde met succes  invoer (#' . $delete . ') van de',
	'failed_delete' => 'Niet in staat om item (#' . $delete . ') te verwijderen.',
	'login_missing' => 'Geef alstublieft de vereiste login informatie.',
	'login_incorrect' => 'Je login-gegevens zijn incorrect.',
	'forgotten_missing' => 'Je hebt geen geldige gebruikersnaam of emailadres ingevoerd.',
	'forgotten_ok' => 'Een nieuw wachtwoord is verzonden naar je email adres.',
	'forgotten_log_error' => 'Mislukte poging om het wachtwoord te resetten.',
	'forgotten_log_ok' => 'Een nieuw wachtwoord werd verzonden naar ',
	'rss_access_attempt' => 'Ongeautoriseerde poging tot het bekijken van een priv&eacute; RSS feed. Mogelijk moet je opnieuw inschrijven voor de feed vanuit Pixie.',
	'unknown_error' => 'Er ging iets fout. Het is mogelijk (maar niet waarschijnlijk) dat de database kapot is, of ben je met het verkeerde been uit bed gestapt?',
	'unknown_edit_url' => 'De ingegeven URL om deze pagina te wijzigen is niet geldig.',
	'unknown_referrer' => 'Onbekende referentie.',
	'profile_name_error' => 'Vul a.u.b je volledige naam in.', 
	'profile_email_error' => 'Vul a.u.b. een geldig mailadres in.', 
	'profile_web_error' => 'Vul a.u.b. een geldig web-adres in.', 
	'profile_ok' => 'Je profiel is geupdate.',
	'profile_password_error' => 'Pixie was niet in staat het nieuwe wachtwoord op te slaan. Waarom probeer je het niet opnieuw?',
	'profile_password_ok' => 'Je Pixie wachtwoord is geupdate. Je moet het gebruiken de volgende keer dat je inlogt.',
	'profile_password_invalid' => 'Je hebt geen geldig wachtwoord opgegeven.',
	'profile_password_invalid_length' => 'Wachtwoorden moeten minstens 6 karakters lang zijn.',
	'profile_password_match_error' => 'De wachtwoorden die je opgaf zijn niet hetzelfde.',
	'profile_password_missing' => 'Geef a.u.b alle benodigde informatie op.',
	'site_name_error' => 'Je site heeft een naam nodig.',
	'site_url_error' =>  'Geef a.u.b. een geldige website URL op.',
	'backup_ok' => 'Met succes een nieuwe back-up van de database gemaakt.',
	'backup_delete_ok' => 'Met succes deze backup verwijderd:',
	'backup_delete_no' => 'Je kunt de meest recente backup niet verwijderen.',
	'backup_delete_error' => 'Pixie was niet in staat tot het verwijderen van de backup.',
	'theme_ok' => 'Het thema is toegewezen aan je website.',
	'theme_error' => 'Pixie was niet in staat tot het wijzigen van je thema.',
	'all_content_deleted' => 'Alle inhoud is verwijderd van de',
	'user_delete_ok' => 'is verwijderd van Pixie.',
	'user_delete_error' => 'Kan niet verwijderen; gebruiker',
	'user_name_missing' => 'Vul a.u.b een gebruikersnaam in.',
	'user_realname_missing' => 'Vul a.u.b. een naam in.',
	'user_password_missing' => 'Vul a.u.b een wachtwoord in.',
	'user_email_error' => 'Vul a.u.b. een geldig mailaddres in.',
	'user_update_ok' => 'Nieuwe instellingen opgeslagen voor',
	'user_duplicate' => 'Een gebruiker met die gebruikersnaam bestaat al. Probeer een andere.',
	'user_new_ok' => 'Nieuwe gebruiker gecre&euml;erd:',
	'saved_new_settings_for' => 'Nieuwe instellingen opgeslagen voor de',
	'file_upload_error' => 'Pixie ondervond een probleem bij het invoegen van de bestandsinformatie in de database. Het bestand kan echter wel ge&uuml;pload zijn.',
	'file_upload_tag_error' => 'Verzeker jezelf ervan dat je uploads getagd worden.',
	'file_delete_ok' => 'Verwijderde succesvol bestand:',
	'file_delete_fail' => 'Pixie was niet in staat om dit bestand te verwijderen:',
	'form_build_fail' => 'Niet in staat een wijzigbaar formulier te bouwen... Heb je de correcte tabelgegevens ingegeven in je module?',
	'date_error' => 'Je hebt een foute datum ingegeven.',
	'email_error' => 'Zorg ervoor dat je een geldig mailadres hebt ingevuld.',
	'url_error' => 'Zorg ervoor dat je een geldige URL hebt ingevuld.',
	'is_required' => 'is een vereist veld.',
	'saved_new' => 'Opgeslagen, nieuw item',
	'in_the' => 'in de',
	'on_the' => 'op de',
	'saved_new_page' => 'Nieuwe pagina aangemaakt',
	'save_update_entry' => 'Opgeslagen updates voor invoer',
	'bad_cookie' => 'Je cookie is over datum (Jakkie!), je zult opnieuw in moeten loggen.',
	'no_module_selected' => 'Je hebt geen module of plugin geselecteerd om te installeren. Probeer het opnieuw.',
	'install_module_ok' => 'is ge&iuml;nstalleerd.',

	// helper
	'helper_plugin' => 'Je kun de instellinge van plugins niet wijzigen, je kunt echter een plugin legen of verwijderen met de knoppen hierboven. Als je een plugin verwijdert, bijvoorbeeld de commentaar plugin, zullen je bezoekers niet langer in staat zijn om reacties achter te laten op dynamische pagina\'s.',
	'helper_nocontent' => 'Deze pagina heeft geen inhoud, gebruik de groene knop hierboven om een eerste ingave toe te voegen (De groene knop is niet beschikbaar bij de commentaar plugin).',
	'helper_nopages' => 'Een wijze man zei ooit dat een website zonder pagina\'s is als een vogel zonder vleugels.... Het gaat nergens naartoe. Gebruikt het formulier rechts om de eerste pagina aan je site toe te voegen. Als je dat hebt gedaan zal dit inzichtelijke bericht verdwijnen.',
	'helper_nopages404' => 'Je site heeft maar een pagina, die pagina is de 404 error pagina en kan hieronder gewijzigd worden.',
	'helper_nopagesadmin' => 'Je kunt <a href="?s=settings">meer pagina\'s toevoegen in het \'Installatie Spul\' deel</a> van Pixie.', 
	'helper_nopagesuser' => 'Neem contact op met een site beheerder en vraag hen om een aantal pagina\'s aan je website toe te voegen.',
	'helper_search' => 'Geen inhoud gevonden. Probeer opnieuw te zoeken.', 
	
	// navigation
	'nav1_settings' => 'Instellingen',
	'nav1_publish' => 'Publiceren',
	'nav1_home' => 'Dashboard',
	'nav2_home' => 'Home',
	'nav2_profile' => 'Profiel',
	'nav2_security' => 'Wachtwoord',
	'nav2_logs' => 'Logboeken',
	'nav2_delete' => 'Verwijder Account',
	'nav2_pages' => 'Pagina\'s',
	'nav2_files' => 'Bestandsbeheer',
	'nav2_backup' => 'Backup',
	'nav2_users' => 'Gebruikers',
	'nav2_blocks' => 'Blokken',
	'nav2_theme' => 'Thema',
	'nav2_site' => 'Site',
	'nav2_settings' => 'Instellingen',

	// forms
	'form_login' => 'Login',
	'form_username' => 'Gebruikersnaam',
	'form_password' => 'Wachtwoord',
	'form_rememberme' => 'Ingelogd blijven op deze computer?',
	'form_forgotten' => 'Je wachtwoord vergeten?',
	'form_returnto' => 'Return to ',
	'form_help_forgotten' => 'Vul a.u.b. je email of gebruikersnaam voor je Pixie account in. Je wachtwoord zal gereset worden en naar je gemaild worden.',
	'form_resetpassword' => 'Reset Wachtwoord',
	'form_name' => 'Volledige naam',
	'form_usernameoremail' => 'Gebruikersnaam of email adres',
	'form_telephone' => 'Telefoon',
	'form_email' => 'Email',
	'form_website' => 'Mijn Website',
	'form_occupation' => 'Beroep',
	'form_address_street' => 'Straat Adres',
	'form_address_town' => 'Stad',
	'form_address_county' => 'Staat/Regio',
	'form_address_pcode' => 'Postcode',
	'form_address_country' => 'Land',
	'form_address_biography' => 'Biografie',
	'form_fl1' => 'Mijn Favoriete Links',
	'form_button_save' => 'Opslaan',
	'form_button_update' => 'Update',
	'form_button_cancel' => 'Annuleer',
	'form_button_install' => 'Installeer',
	'form_button_create_page' => 'Maak pagina',
	'form_current_password' => 'Huidig Wachtwoord',
	'form_new_password' => 'Nieuw Wachtwoord',
	'form_confirm_password' => 'Bevestig Wachtwoord',
	'form_tags' => 'Tags',
	'form_content' => 'Inhoud',
	'form_comments' => 'Commentaar',
	'form_public' => 'Publiekelijk',
	'form_optional'=> '(optioneel)',
	'form_required'=> '*',
	'form_title'=> 'Titel',
	'form_posted'=> 'Datum &amp; Tijd',
	'form_date' => 'Datum &amp; Tijd',
	'form_help_comments' => 'Wil je dat mensen kunnen reageren op dit artikel?',
	'form_help_public' => 'Wil je dat dit artikel publiekelijk zichtbaar is? (kies nee om op te slaan als een concept).',
	'form_help_tags' => 'Tags werken als categorie&euml;n en maken het makkelijker dingen te vinden. Vul steekwoorden in gescheiden door spaties.',
	'form_help_current_tags' => 'Suggesties:',
	'form_help_current_blocks' => 'Beschikbare Blokken:',
	'form_php_warning' => '(Deze pagina bevat PHP. De rich text editor is uitgezet om veilig wijzigen van deze geavanceerde code mogelijk te maken)',
	'form_legend_site_settings' => 'Pas de instellingen voor je website aan',
	'form_site_name' => 'Naam van de Site',
	'form_help_site_name' => 'Hoe wil je je site graag noemen?',
	'form_page_name' => 'Slug/URL',
	'form_help_page_name' => 'Dit zal gebruikt worden om de URL van je pagina te maken (bijv. http://www.mijnsite.nl/<b>eenpagina</b>/).',
	'form_page_display_name' => 'Pagina Weergavenaam',
	'form_help_page_display_name' => 'Hoe wil je dat de pagina heet?',
	'form_page_description' => 'Pagina Omschrijving',
	'form_help_page_description' => 'Schrijf een beschrijving van je pagina.',
	'form_page_blocks' => 'Pagina Blokken',
	'form_help_page_blocks' => 'Blokken zijn de extra inhoud op je pagina. Bloknamen horen gescheiden te worden door spaties. (afhandeling van blokken zal verbeterd worden in komende versies van Pixie).',
	'form_searchable' => 'Doorzoekbaar',
	'form_help_searchable' => 'Wil je dat deze pagina voorkomt in de publiekelijke zoekresultaten?',
	'form_posts_per_page' => 'Posts op deze page',
	'form_help_posts_per_page' => 'Hoeveel resultaten wil je laten zien op deze pagina?',
	'form_rss' => 'RSS',
	'form_help_rss' => 'Wil je dat deze pagina een RSS feed van zijn inhoud genereert?',
	'form_in_navigation' => 'Binnen de Navigatie',
	'form_help_in_navigation' => 'Wil je dat deze pagina in je website navigatie te zien is?',
	'form_site_url' => 'URL van de Site',
	'form_help_site_url' => 'Wat is de URL van je website (bijv. http://www.mijnsite.nl/eenfolder/).',
	'form_site_homepage' => 'Startpagina',
	'form_help_homepage' => 'Welke pagina van je site wil je graag dat bezoekers als eerste zien?',
	'form_site_keywords' => 'Site Steekwoorden',
	'form_help_site_keywords' => 'Maak een lijst van steekwoorden, gescheiden door komma\'s. (bijv. deze, site, rockt).',
	'form_site_author' => 'Maker van de Site',
	'form_site_copywright' => 'Site Copyright',
	'form_site_curl' => 'Duidelijke URL\'s?',
	'form_help_site_curl' => 'Wil je dat de site duidelijke URL\'s gebruikt? Een duidelijke URL ziet eruit als www.mijnsite.nl/duidelijk/ in plaats van www.mijnsite.nl?s=duidelijk. Duidelijke URL\'s werken alleen op Linux hosts.',
	'form_legend_pixie_settings' => 'Pas aan hoe Pixie zich gedraagt',
	'form_pixie_language' => 'Taal',
	'form_help_pixie_language' => 'Kies de taal die je wilt gebruiken.',
	'form_pixie_timezone' => 'Tijdzone',
	'form_help_pixie_timezone' => 'Selecteer de huidige tijdzone zodat Pixie de correcte tijd kan weergeven.',
	'form_pixie_dst' => 'Zomertijd/Wintertijd',
	'form_help_pixie_dst' => 'Wil je dat Pixie automatisch de tijd aanpast op basis van zomertijd/wintertijd?',
	'form_pixie_date' => 'Datum &amp; Tijd',
	'form_help_pixie_date' => 'Kies je voorkeur voor een datum en tijd opmaak.',
	'form_pixie_rte' => 'Rich Text Editor',
	'form_help_pixie_rte' => 'Wilt u gebruik maken van de Ckeditor text editor? (Het maakt het bewerken van uw site echt makkelijk.)',
	'form_pixie_logs' => 'Verlopen logbestanden',
	'form_help_pixie_logs' => 'Na hoeveel dagen wil je de logbestanden opschonen?',
	'form_pixie_sysmess' => 'Systeem Bericht',
	'form_help_pixie_sysmess' => 'Dit bericht wordt getoond aan iedere Pixie gebruiker als ze inloggen op Pixie.',
	'form_help_settings_page_type' => 'Welk type pagina wil je aanmaken?',
	'form_legend_user_settings' => 'Gebruikers Instellingen',
	'form_user_username' => 'Gebruikersnaam',
	'form_help_user_username' => 'Gebruikersnamen kunnen geen spaties bevatten.',
	'form_user_realname' => 'Volledige naam',
	'form_help_user_realname' => 'Voer de volledige naam van de gebruiker in.',
	'form_user_permissions' => 'Machtigingen',
	'form_help_user_permissions' => 'Welke machtigingen wil je deze gebruiker geven?',
	'form_help_user_permissions_block' => 'Wat voor type gebruiker zal dit zijn?',
	'form_button_create_user' => 'Maak gebruiker',
	'form_upload_file' => 'Bestand',
	'form_help_upload_file' => 'Kies een bestand van je computer om te uploaden.',
	'form_help_upload_tags' => 'Steekwoorden gescheiden door spaties.',
	'form_upload_replace_files' => 'Bestanden vervangen?', 
	'form_help_upload_replace_files' => 'Wil je een bestaand bestand te vervangen?',
	'form_search_words' => 'Steekwoorden',
	'form_privs' => 'Pagina Machtigingen',
	'form_help_privs' => 'Wie wil je toestemming geven deze pagina te bewerken?', 
	
	//email
	'email_newpassword_subject' => 'Pixie (' . str_replace('http://', "", $site_url) . ') - Nieuw wachtwoord',
	'email_changepassword_subject' => 'Pixie (' . str_replace('http://', "", $site_url) . ') - Gewijzigd wachtwoord',
	'email_newpassword_message' => 'Je wachtwoord is veranderd naar: ',
	'email_account_close_message' => 'Your Pixie account has been closed @ ' . $site_url . '. Neem alsjeblieft contact op met de administrator van de site voor meer informatie.',
	'email_account_close_subject' => 'Pixie (' . str_replace('http://', "", $site_url) . ') - Account gesloten',
	'email_account_edit_subject' =>	'Pixie (' . str_replace('http://', "", $site_url) . ') - Belangrijke informatie over je account',
	'email_account_new_subject' => 'Pixie (' . str_replace('http://', "", $site_url) . ') - Nieuwe account',
	
	//front end
	'continue_reading' => 'Ga door met lezen',
	'permalink' => 'Permalink',
	'theme' => 'Thema',
	'navigation' => 'Navigatie',
	'skip_to_content' => 'Verder naar inhoud &raquo;',
	'skip_to_nav' => 'Verder naar navigatie &raquo;',
	'by' => 'Door',
	'on' => 'op',
	'view' => 'Bekijk',
	'profile' => 'profiel',
	'all_posts_tagged' => 'alle posts met de tag',
	'permalink_to' => 'Permanente link naar',
	'comments' => 'Reacties',
	'comment' => 'Reageer',
	'no_comments' => 'Nog geen reacties...',
	'comment_closed' => 'Reacties nu gesloten.',
	'comment_thanks' => 'Bedankt voor je reactie.',
	'comment_leave' => 'Laat een reactie achter',
	'comment_form_info' => 'Bij deze reactie is <a href="http://gravatar.com" title="Neem een Gravatar">Gravatar</a> en <a href="http://www.cocomment.com" title="Volg en deel je opmerkingen">coComment</a> ingeschakeld.',
	'comment_name' => 'Naam',
	'comment_email' => 'Email',
	'comment_web' => 'Website',
	'comment_button_leave' => 'Stuur je commentaar',
	'comment_name_error' => 'Vul a.u.b. je naam in.',
	'comment_email_error' => 'Vul a.u.b. een geldig mailadres in.',
	'comment_web_error' => 'Vul a.u.b. een geldig webadres in.',
	'comment_comment_error' => 'Geef a.u.b. een reactie.',	
	'comment_save_log' => 'Gereageerd op: ',
	'tagged' => 'Getagged',
	'tag' => 'Tag',
	'popular' => 'Meest populair',
	'archives' => 'Archieven',
	'posts' => 'posts',
	'last_updated' => 'Laatst geupdate',
	'edit_post' => 'Wijzig deze post',
	'edit_page' => 'Wijzig deze pagina',
	'popular_posts' => 'Populaire Posts',
	'next_post' => 'Volgende post',
	'next_page' => 'Volgende pagina',
	'previous_post' => 'Vorige post',
	'previous_page' => 'Vorige pagina',
	'dynamic_page' => 'Pagina'
);
?>