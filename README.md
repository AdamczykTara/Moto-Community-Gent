# Motor Community Gent
Dit project is een website, gemaakt met PHP en Laravel 12, voor de lokale motor community in Gent.<br/>
De website brengt motorrijders samen via nieuws, ritten, profielen, privéberichten en een actieve community, met administratief beheer voor moderators.<br/>

## Features
### Gebruikers
- Registreren en inloggen
- Publiek profiel instellen
- Privéberichten sturen naar andere gebruikers
- Eigen ritten toevoegen
- Reageren op nieuwsberichten
- Admins kunnen gebruikers beheren

### Nieuws
- Publieke nieuwsartikels
- Gebruikers kunnen reacties toevoegen
- Admins kunnen:
  - Nieuwsitems aanmaken, bewerken en verwijderen
  - Reacties verwijderen

### FAQ
- Gecategoriseerde FAQ pagina
- Admins kunnen:
  - categorieën beheren
  - Vragen en antwoorden beheren

### Contactformulier
- Publiek contactformulier voor bezoekers en gebruikers
- Admins kunnen:
  - Inzendingen bekijken
  - Antwoorden op inzendingen

## Installatie
### Vereisten:
- PHP 8.2+
- Composer
- Node.js en NPM
- MySQL
- Laravel 12

### Installatiestappen:
#### CLI:
git clone https://github.com/AdamczykTara/Moto-Community-Gent<br/>
cd Moto-Community-Gent<br/>
composer install<br/>
npm install<br/>
npm run build<br/>
cp .env.example .env<br/>
php artisan key:generate<br/>

#### .env:
Pas .env aan met je eigen databasegegevens.<br/>

#### XAMPP
In de httpd.config van de apache server moet het volgende staan:
- DocumentRoot "root\naar\Moto-Community-Gent"
- <Directory "route\naar\Moto-Community-Gent">
Zorg ervoor dat de database en apache server runnen.

#### CLI:
php artisan migrate:fresh --seed<br/>
php artisan storage:link<br/>
php artisan serve<br/>

## Gebruik
Voor gebruik moet je volgende zaken doen:
- CLI (tabblad 1): npm run dev
- CLI (tabblad 2): php artisan serve
- MySQL database moet runnen (ik gebruik XAMPP)
- Apache server moet runnen (ik gebruik XAMPP)

Bezoek de website op http://127.0.0.1:8000<br/>

### Admin gegevens:
- Username: admin
- Email: admin@ehb.be
- Password: Password!321

### Voorbeeldgebruik:
- Bezoek een profiel en stuur deze een bericht.
- Lees een nieuwsartikel en voeg een reactie toe.
- Dien een contactformulier in.

## Support
Voor vragen of problemen: tara.adamczyk@student.ehb.be

## Contributing
Dit project is een examenopdracht voor de opleiding Toegepaste Informatica.<br/>
Suggesties en verbeteringen zijn welkom.<br/>

## Auteur
Tara Adamczyk<br/>
Student Toegepaste Informatica<br/>
Erasmushogeschool Brussel

## Licentie
Geen commerciële licentie inbegrepen.

## Project status
Afgewerkt

## Bronvermelding
Bij de ontwikkeling van dit project werden de volgende bronnen geraadpleegd.<br/>

### Framework en documentatie
- Laravel officiële documentatie
  - https://laravel.com/docs
  - (Routing, controllers, middleware, Eloquent relationships, authentication, validation, mail)
- Laravel Breeze
  - https://laravel.com/docs/starter-kits#laravel-breeze
  - (Authenticatie, basis layouts, login/registratie)

### Front-end
- Tailwind CSS documentatie
  - https://tailwindcss.com/docs
  - (Utility classes, layout, spacing, buttons, hover states)

### Database en Eloquent
- Laravel Eloquent ORM
  - https://laravel.com/docs/eloquent
  - (HasMany, BelongsTo, seeding, factories)

### Mails en formulieren
- Laravel Mail
  - https://laravel.com/docs/mail
  - (Versturen van e-mails bij contactformulier en admin-antwoorden)

### Algemene ondersteuning
- Stack Overflow
  - https://stackoverflow.com
  - (Specifieke foutmeldingen en edge cases)
- ChatGPT
  - https://openai.com
  - (Ondersteuning bij architectuur, debugging, seeding, Laravel best practices)
  - (Opstellen van de teksten gebruikt doorheen de website)
    - https://chatgpt.com/share/69569ed6-edec-8011-8536-647198f99cbc
  - Alle gegenereerde code werd nagelezen, begrepen en aangepast door de auteur.
  - 
- README
  - https://www.makeareadme.com/
  - (Opstelling van de README)

### Afbeeldingen
- De gebruikte afbeeldingen dienen uitsluitend als voorbeeldmateriaal binnen een educatieve context.
