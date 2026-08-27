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
 * English strings for certificateelement_flexdate.
 *
 * @package    certificateelement_flexdate
 * @copyright  2013 Mark Nelson <markn@moodle.com>
 * @copyright  2026 Andreas Giesen <andreas@108design.com>
 * @author     Mark Nelson <markn@moodle.com>
 * @author     Andreas Giesen <andreas@108design.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['customformat'] = 'Custom format';
$string['customformat_help'] = 'Enter a Moodle strftime-style pattern, for example <code>%d.%m.%Y</code> (18.08.2026), <code>%Y-%m-%d</code> (2026-08-18), or <code>%d. %B %Y</code> (18. August 2026). Use <code>%%</code> for a percent sign. HTML and unknown format directives are not accepted.';
$string['dateformat'] = 'Date format';
$string['dateformat_help'] = 'Choose the standard, language-aware date format used when format mode is set to Standard format.';
$string['dateitem'] = 'Date item';
$string['dateitem_help'] = 'Choose the certificate date that will be printed.';
$string['errorcustomformatinvalid'] = 'Enter a valid strftime-style date format. Only supported percent directives and plain text are allowed.';
$string['errorcustomformatlength'] = 'The custom date format must not be longer than {$a} characters.';
$string['errorcustomformatrequired'] = 'Enter a custom date format.';
$string['errorformatlanginvalid'] = 'Choose an installed site language.';
$string['expirydate'] = 'Expiry date';
$string['formatlang'] = 'Date language';
$string['formatlang_help'] = 'Optionally select an installed site language for this date only. This affects translated month and weekday names, and the language-aware standard date formats. Leave this as “Use certificate language” to keep the Certificate manager behaviour.';
$string['formatlanginherit'] = 'Use certificate language';
$string['formatmode'] = 'Format mode';
$string['formatmode_help'] = 'Standard format uses the selected Moodle language format. Custom format uses the pattern entered below for this element only.';
$string['formatmodecustom'] = 'Custom format';
$string['formatmodestandard'] = 'Standard format';
$string['issueddate'] = 'Issued date';
$string['pluginname'] = 'Flexible date';
$string['privacy:metadata'] = 'The Flexible date plugin does not store any personal data.';
