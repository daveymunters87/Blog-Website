# Blog Website

Dit is mijn simpele Blog pagina waarmee ik de afgelopen 2 week bezig ben geweest. Dit is echter een simpel concept om te laten zien wat ik de afgelopen tijd hebt geleerd! Ik hoop dat jullie het mooi vinden en feedback is altijd welkom.

## Features

- **User Registration:** Gebruikers kunnen een eigen account aanmaken met een Username, Wachtwoord en email-adres
- **User Authentication:** Gebruikers kunnen alleen inloggen met Hun email en wachtwoord.
- **Password Hashing:** Wachtwoord van gebruikers worden gehashed voor veiligheid
- **User Roles:** Er zijn 2 verschillende rollen als gebruiker, Admin of user.
- **Admin Dashboard:** Voor de admin is er een speciale dashboard waar hij/zei wijzigen kan aanbrengen op de website
- **Create Posts:** Ingelogde gebruikers kunnen met de Create Post pagina een eigen post aanmaken voor de blog.
- **View Posts:** Gebruiker kunnen ook alle aangemaakte posts bekijken of de Blog pagina

## Gebruikte Codeertalen

- **PHP:** Ik heb PDO gebruikt als back end van de website
- **MySQL:** Mysql word gebruikt om alle user gegevens en post gegevens in op te slaan
- **HTML/Tailwind CSS:** HTML en Tailwind word gebruikt voor het uiterlijk van de website
- **JavaScript:** Javascript is een klein beetje gebruikt voor de Navbar (Burger)

## Installatie 

1. Clone de repository via BitLab: `git clone ...`
2. Import het SQL bestand (`import.sql`) in jou PHPMyadmin (http://localhost/phpMyAdmin5/)
## DIT BESTAND KAN JE VINDEN IN DE MAP (DB/IMPORT.SQL) ##

## Gebruik

1. Open de website in jou gewenste internetbrowser.
2. Registreer als je nog geen account hebt en log hiermee in.
3. Maak een post aan of bekijk post (Indien bestaand).
4. Voor informatie over admin (Zie hieronder).

## Admin
- *Email*: TestAdmin@gmail.com
- *Wachtwoord*: Admin

1. Open de website in jou gewensde internetbrowser.
2. Log in de met de bestaande admin gegevens (Zie hierboven)
3. In de home pagina zie je direct een analyse van alle bestaande gebruiks en posts
4. In de Manage Post kan je alle bestaande post bewerken of verwijderen
5. In de Manage Users kan je alle bestaande users bewerken of verwijderen

