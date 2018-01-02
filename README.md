<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Projekt: "Pax et bonum" - Eine Welt Laden e.V.

## Wesentliches
Dieses Projekt verwendet das PHP-Framework Laravel.

- [Laravel Website](https://laravel.com/)
- [Dokumentation](https://laravel.com/docs/5.5)
- [Laracasts](https://laracasts.com/)

Außerdem die JavaScript-Runtime und Package-Manager [Node.js](https://nodejs.org/de/).

[Composer] ist ebenfalls keine schlechte Idee.

Vorteil: wenn du Node.js und/oder Composer einmal installiert hast, kannst du die jeweiligen Schritte in der Installationsanleitung auch bei zukünftigen Projekten überspringen.

## Installation
### Das Projekt Clonen
Clone das Projekt über [GitHub Dextop](https://desktop.github.com/) oder vorzugsweise [GitKraken](https://www.gitkraken.com/).

In beiden Fällen musst du dich mit deinem GitHub-Account anmelden.

### Webserver

##### _**ENTWEDER**_ Lokaler Webserver
Du _**kannst**_ das Projekt über einen lokalen Webserver, wie beispielsweise [WampServer](http://wampserver.aviatechno.net/) oder [XAMPP](https://www.apachefriends.org/de/index.html) bedienen. Gehe in egal welchem Fall sicher, die aktuellste Version mit **PHP 7** zu verwenden.

Beide Webserver bringen die notwendigen PHP-Versionen bereits mit. Um sicher zu stellen, dass alles funktioniert, gehe in dein WampServer- oder XAMPP-Instalationsverzeichnis und finde den Ordner, in dem die `php.exe` liegt. Bei Wamp ist das im Unterverzeichnis `\bin\php\php7.x.x`.

Der Pfad dieses Ordners wird im folgenden Schritt (_in beiden Fällen_ ...) benötigt.

##### _**ODER**_ Standalone PHP
Alternativ zum lokalen Server ist es auch möglich, PHP direkt zu installieren und, wie in Schritt `Entwicklung > Webserver` der Installationsanleitung beschrieben, den Webdienst über ``artisan`` verfügbar zu machen.

Um diese Variante zu verwenden, downloade von [hier](http://windows.php.net/download/) das entsprechende Archiv (sehr wahrscheinlich 'x64 Thread Safe') und extrahiere es in ein neues Verzeichnis (z.B. nach `"C:\Programme\PHP 7.2"`).

Diesen Installationspfad brauchst du im nächsten Schritt.

##### _IN BEIDEN FÄLLEN:_

Öffne eine neue Console (`cmd.exe`) und führe folgenden Befehl aus:
````bat
SET PATH=%PATH%;C:\Dein\PHP\Ordner
````
Im Zweifelsfall ist es immer der Ordner, in dem sich die `php.exe` befindet.

Desweiteren ist zu beachten, dass der Document-Root, also das Verzeichnis, auf das der Webserver zugreifen sollte, nicht das Projekt-Stammverzeichnis ist, sondern der Unterordner `\public`. In diesem ist auch die begehrte `index.php`.

Wenn das geschafft ist, gehe zum nächsten Schritt über.

#### Composer installieren

Installiere [Composer von hier][Composer] entweder über den Windows Installer oder, vorzugsweise, über die Command-line (`cmd.exe`).

Wenn die Command-line-Installation ausgibt, dass der Befehl `php` nicht gefunden wurde, musst du nochmal einen Schritt zurückgehen. Herzlichen Glückwunsch.

#### Node.js installieren

Die Installation von Node.js ist eine Grundvoraussetzung, um das Projekt weiterentwickeln zu können.

**1** Gehe auf [nodejs.org](https://nodejs.org/de/) und installiere die letze stabile Version (LTS)

**2** Öffne ein neues Terminal (`cmd.exe`) und navigiere zum Wurzelverzeichnis des Projektes.

**2a** (für Dummies): Mit dem Befehl ``E:`` oder ``C:`` oder ``F:`` oder weiß der Kuckuck, welchen Laufwerksbuchstaben dein PC verwendet, wechselst du das Laufwerk.

Mit ``cd "\gewünschter\ordner"`` springst du in ein Verzeichnis **ausgehend vom Laufwerk selbst**.

Mit ``cd "sub\ordner\name"`` oder ``cd ".\sub\ordner\name"`` navigierst du **relativ zum Verzeichnis, in dem du gerade bist** - also dem Ordner, der vor dem `>` in deiner Console angezeigt wird. 

Mit ``cd ..`` gehst du ein Verzeichnis zurück.

**3** Wenn du einmal im Projekt-Verzeichnis angekommen bist, führst du folgenden Befehl aus:

````bat
npm install
````

Daraufhin wird der **N**ode**P**ackage**M**anager von Node.js alle für das Projekt notwendigen Pakete in den Ordner ``\node_modules`` herunterladen.

In der Zwischenzeit darfst du dir gern einen Kaffee kochen, denn _**Java**_Script heißt ja nicht grundlos so, oder du betest und hoffst bitterlich darauf, dass bei der Installation keine Fehler auftreten. Wie gesagt: _**Java**_Script.

#### Installation abgeschlossen.

## Entwicklung

Wann immer du von nun an an dem Projekt arbeitest, gehe sicher, vorher mit einer Console in das Projektverzeichnis zu navigieren, und dort folgenden Befehl auszuführen:

````bat
npm run watch
````

Das Konsolen-Fenster muss während der Entwicklung offen bleiben, damit der Prozess nicht abgebrochen wird.

Alternativ dazu, wenn du nur einmalig kompilieren möchtest:

````bat
npm run dev
````

Bevor das Projekt auf den Kundenserver geladen wird, ist es wichtig, nicht mit `dev` zu kompilieren, sondern mit `prod`, also:

````bat
npm run prod
````

#### Webserver

Wenn du keinen lokalen Webserver installiert hast und jetzt verwendest, vielleicht auch, weil du lediglich das PHP-Archiv heruntergeladen hast, verwende folgenden Befehl in einem neuen Terminal, zum Bereitstellen eines Webdienstes, nachdem du ins Projektverzeichnis navigiert hast:

````bat
php artisan serve
````

Danach kannst du unter [`http://localhost:8000`](http://localhost:8000) auf den Server zugreifen.

Auch dieses Konsolen-Fenster muss Zeit der Entwicklung geöffnet bleiben.

## Git
Vergiss nicht, deine Änderungen auch auf GitHub zu pushen.
Natürlich ***in deinem eigenen Branch***, damit du nicht alles kaputt machst und mir damit mehr Arbeit.

#### &mdash; Danke und viel Spaß damit, Eric.

P.S.: Fragen nehme ich jederzeit gerne entgegen.

[Composer]: https://getcomposer.org/download/
