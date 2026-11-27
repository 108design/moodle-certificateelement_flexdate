<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
//
// Adapted from certificateelement_date in 2026 by Andreas Giesen.

/**
 * German strings for certificateelement_flexdate.
 *
 * @package    certificateelement_flexdate
 * @copyright  2026 Andreas Giesen <andreas@108design.com>
 * @author     Andreas Giesen <andreas@108design.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['customformat_help'] = 'Gib ein Moodle-konformes strftime-Muster ein, zum Beispiel <code>%d.%m.%Y</code> (18.08.2026), <code>%Y-%m-%d</code> (2026-08-18) oder <code>%d. %B %Y</code> (18. August 2026). Mit <code>%%</code> wird ein Prozentzeichen ausgegeben. HTML und unbekannte Formatdirektiven sind nicht zulässig.';
$string['dateformat_help'] = 'Wähle das sprachabhängige Moodle-Standardformat, das im Modus „Standardformat“ verwendet wird.';
$string['dateitem_help'] = 'Wähle das Zertifikatsdatum, das ausgegeben werden soll.';
$string['errorcustomformatinvalid'] = 'Gib ein gültiges strftime-Datumsformat ein. Zulässig sind nur unterstützte Prozent-Direktiven und einfacher Text.';
$string['errorcustomformatrequired'] = 'Gib ein eigenes Datumsformat ein.';
$string['errorformatlanginvalid'] = 'Wähle eine installierte Site-Sprache.';
$string['formatlang_help'] = 'Wähle optional eine installierte Site-Sprache nur für dieses Datum. Dies beeinflusst übersetzte Monats- und Wochentagsnamen sowie sprachabhängige Standardformate. Mit „Zertifikatssprache verwenden“ bleibt das Verhalten des Certificate Managers unverändert.';
$string['updateguard_hint'] = 'Verwende ein freigegebenes Paket für die installierte Ausgabe. Du kannst den Vorgang erneut prüfen.';
$string['updateguard_dependency'] = 'Eine benötigte Plugin-Version fehlt. Aktualisiere die Abhängigkeit gemeinsam mit diesem Plugin oder vorher.';
$string['updateguard_approval'] = 'Die Pakete oder der installierte Stand haben sich seit der Vorschau geändert. Prüfe den Vorgang erneut.';
$string['updateguard_busy'] = 'Eine andere Installation läuft. Versuche es nach deren Abschluss erneut.';
$string['updateguard_installed'] = 'Der installierte Updateschutz ist unvollständig. Stelle die Dateien der zuletzt installierten freigegebenen Version wieder her.';
$string['updateguard_operation'] = 'Diese Kombination von Installationsaktionen wird nicht unterstützt. Starte einen einzelnen Updatevorgang erneut.';
$string['updateinfo_choice'] = 'Kontrolliere vor dem Fortfahren die Paketquelle und Moodles Prüfergebnisse. Mit „{$a}“ unten kannst du abbrechen.';
