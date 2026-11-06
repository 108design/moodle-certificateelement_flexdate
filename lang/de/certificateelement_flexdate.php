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

$string['customformat'] = 'Eigenes Format';
$string['customformat_help'] = 'Geben Sie ein Moodle-konformes strftime-Muster ein, zum Beispiel <code>%d.%m.%Y</code> (18.08.2026), <code>%Y-%m-%d</code> (2026-08-18) oder <code>%d. %B %Y</code> (18. August 2026). Mit <code>%%</code> wird ein Prozentzeichen ausgegeben. HTML und unbekannte Formatdirektiven sind nicht zulässig.';
$string['dateformat'] = 'Datumsformat';
$string['dateformat_help'] = 'Wählen Sie das sprachabhängige Moodle-Standardformat, das im Modus „Standardformat“ verwendet wird.';
$string['dateitem'] = 'Datumsquelle';
$string['dateitem_help'] = 'Wählen Sie das Zertifikatsdatum, das ausgegeben werden soll.';
$string['errorcustomformatinvalid'] = 'Geben Sie ein gültiges strftime-Datumsformat ein. Zulässig sind nur unterstützte Prozent-Direktiven und einfacher Text.';
$string['errorcustomformatlength'] = 'Das eigene Datumsformat darf höchstens {$a} Zeichen lang sein.';
$string['errorcustomformatrequired'] = 'Geben Sie ein eigenes Datumsformat ein.';
$string['errorformatlanginvalid'] = 'Wählen Sie eine installierte Site-Sprache.';
$string['expirydate'] = 'Ablaufdatum';
$string['formatlang'] = 'Sprache des Datums';
$string['formatlang_help'] = 'Wählen Sie optional eine installierte Site-Sprache nur für dieses Datum. Dies beeinflusst übersetzte Monats- und Wochentagsnamen sowie sprachabhängige Standardformate. Mit „Zertifikatssprache verwenden“ bleibt das Verhalten des Certificate Managers unverändert.';
$string['formatlanginherit'] = 'Zertifikatssprache verwenden';
$string['formatmode'] = 'Formatmodus';
$string['formatmode_help'] = 'Das Standardformat verwendet das ausgewählte Moodle-Sprachformat. Das eigene Format verwendet ausschließlich für dieses Element das unten eingegebene Muster.';
$string['formatmodecustom'] = 'Eigenes Format';
$string['formatmodestandard'] = 'Standardformat';
$string['issueddate'] = 'Ausstellungsdatum';
$string['elementname'] = 'Flex Date';
$string['pluginname'] = 'Flex Date for tool_certificate';
$string['privacy:metadata'] = 'Das Plugin „Flex Date for tool_certificate“ speichert keine personenbezogenen Daten.';


$string['updateguard_heading'] = 'Update angehalten';
$string['updateguard_component'] = 'Das Paket für {$a} wurde abgewiesen.';
$string['updateguard_hint'] = 'Verwende ein freigegebenes Paket für die installierte Ausgabe. Du kannst den Vorgang erneut prüfen.';
$string['updateguard_unchanged'] = 'Dieser Vorgang hat keine Plugin-Dateien ersetzt.';
$string['updateguard_help'] = 'Das installierte Plugin prüft vor dem Ersetzen die Herausgebersignatur, den Paketinhalt, den erlaubten Updatekanal und die Kompatibilität. Eine gültige Signatur erlaubt keinen Wechsel auf eine andere Ausgabe. Wird ein Paket abgewiesen, stoppt die gesamte Sammelaktion.';
$string['updateguard_signature'] = 'Die Herausgebersignatur oder der Paketinhalt konnte nicht bestätigt werden.';
$string['updateguard_policy'] = 'Das Paket passt nicht zur installierten Ausgabe oder zum erlaubten Paketprofil.';
$string['updateguard_channel'] = 'Updates über diesen Kanal sind für dieses Plugin nicht freigegeben.';
$string['updateguard_metadata'] = 'Die Versions- oder Abhängigkeitsangaben sind nicht konsistent.';
$string['updateguard_dependency'] = 'Eine benötigte Plugin-Version fehlt. Aktualisiere die Abhängigkeit gemeinsam mit diesem Plugin oder vorher.';
$string['updateguard_approval'] = 'Die Pakete oder der installierte Stand haben sich seit der Vorschau geändert. Prüfe den Vorgang erneut.';
$string['updateguard_busy'] = 'Eine andere Installation läuft. Versuche es nach deren Abschluss erneut.';
$string['updateguard_installed'] = 'Der installierte Updateschutz ist unvollständig. Stelle die Dateien der zuletzt installierten freigegebenen Version wieder her.';
$string['updateguard_operation'] = 'Diese Kombination von Installationsaktionen wird nicht unterstützt. Starte einen einzelnen Updatevorgang erneut.';
$string['updateguard_failed'] = 'Das Update konnte nicht geprüft werden. Es wurde keine Installation gestartet.';
$string['updateguard_back'] = 'Zur Pluginübersicht';
