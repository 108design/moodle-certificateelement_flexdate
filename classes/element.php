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
 * Flexible date certificate element.
 *
 * @package    certificateelement_flexdate
 * @copyright  2013 Mark Nelson <markn@moodle.com>
 * @copyright  2026 Andreas Giesen <andreas@108design.com>
 * @author     Mark Nelson <markn@moodle.com>
 * @author     Andreas Giesen <andreas@108design.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace certificateelement_flexdate;

defined('MOODLE_INTERNAL') || die();

/**
 * Displays the issue or expiry date using a standard or custom Moodle date format.
 */
class element extends \tool_certificate\element {

    /**
     * Return the concise label used in the certificate element chooser.
     *
     * @return string
     */
    public static function get_element_type_name() {
        return get_string('elementname', 'certificateelement_flexdate');
    }

    /** Show the issue date. */
    public const DATE_ISSUE = -1;

    /** Show the expiry date. */
    public const DATE_EXPIRY = -2;

    /** Use the standard date-format selector. */
    public const FORMAT_STANDARD = 'standard';

    /** Use a custom strftime-style format. */
    public const FORMAT_CUSTOM = 'custom';

    /** Maximum number of characters in a custom format. */
    public const CUSTOM_FORMAT_MAX_LENGTH = 100;

    /**
     * Render this element's custom form fields.
     *
     * @param \MoodleQuickForm $mform the edit form
     */
    public function render_form_elements($mform) {
        $dateoptions = [
            self::DATE_ISSUE => get_string('issueddate', 'certificateelement_flexdate'),
            self::DATE_EXPIRY => get_string('expirydate', 'certificateelement_flexdate'),
        ];
        $mform->addElement('select', 'dateitem', get_string('dateitem', 'certificateelement_flexdate'), $dateoptions);
        $mform->addHelpButton('dateitem', 'dateitem', 'certificateelement_flexdate');

        $mform->addElement('select', 'formatmode', get_string('formatmode', 'certificateelement_flexdate'), [
            self::FORMAT_STANDARD => get_string('formatmodestandard', 'certificateelement_flexdate'),
            self::FORMAT_CUSTOM => get_string('formatmodecustom', 'certificateelement_flexdate'),
        ]);
        $mform->setDefault('formatmode', self::FORMAT_STANDARD);
        $mform->addHelpButton('formatmode', 'formatmode', 'certificateelement_flexdate');

        $mform->addElement('select', 'formatlang', get_string('formatlang', 'certificateelement_flexdate'),
            self::get_available_languages());
        $mform->setType('formatlang', PARAM_SAFEDIR);
        $mform->addHelpButton('formatlang', 'formatlang', 'certificateelement_flexdate');

        $mform->addElement('select', 'dateformat', get_string('dateformat', 'certificateelement_flexdate'),
            self::get_date_formats());
        $mform->addHelpButton('dateformat', 'dateformat', 'certificateelement_flexdate');
        $mform->hideIf('dateformat', 'formatmode', 'eq', self::FORMAT_CUSTOM);

        $mform->addElement('text', 'customformat', get_string('customformat', 'certificateelement_flexdate'),
            ['maxlength' => self::CUSTOM_FORMAT_MAX_LENGTH, 'size' => 40]);
        $mform->setType('customformat', PARAM_RAW_TRIMMED);
        $mform->addHelpButton('customformat', 'customformat', 'certificateelement_flexdate');
        $mform->hideIf('customformat', 'formatmode', 'neq', self::FORMAT_CUSTOM);

        parent::render_form_elements($mform);
    }

    /**
     * Validate the custom format before it is stored.
     *
     * @param array $data submitted data
     * @param array $files submitted files
     * @return array field errors
     */
    public function validate_form_elements($data, $files) {
        $errors = parent::validate_form_elements($data, $files);
        if (($data['formatmode'] ?? self::FORMAT_STANDARD) === self::FORMAT_CUSTOM) {
            $format = trim((string)($data['customformat'] ?? ''));
            if ($format === '') {
                $errors['customformat'] = get_string('errorcustomformatrequired', 'certificateelement_flexdate');
            } else if (\core_text::strlen($format) > self::CUSTOM_FORMAT_MAX_LENGTH) {
                $errors['customformat'] = get_string('errorcustomformatlength', 'certificateelement_flexdate',
                    self::CUSTOM_FORMAT_MAX_LENGTH);
            } else if (!self::is_valid_custom_format($format)) {
                $errors['customformat'] = get_string('errorcustomformatinvalid', 'certificateelement_flexdate');
            }
        }
        $formatlang = (string)($data['formatlang'] ?? '');
        if ($formatlang !== '' && !array_key_exists($formatlang, self::get_available_languages())) {
            $errors['formatlang'] = get_string('errorformatlanginvalid', 'certificateelement_flexdate');
        }
        return $errors;
    }

    /**
     * Save the date source and both formatting settings as element JSON data.
     *
     * @param \stdClass $data submitted form data
     */
    public function save_form_data(\stdClass $data) {
        $formatmode = $data->formatmode ?? self::FORMAT_STANDARD;
        if (!in_array($formatmode, [self::FORMAT_STANDARD, self::FORMAT_CUSTOM], true)) {
            $formatmode = self::FORMAT_STANDARD;
        }
        $formatlang = clean_param((string)($data->formatlang ?? ''), PARAM_SAFEDIR);
        if ($formatlang !== '' && !array_key_exists($formatlang, self::get_available_languages())) {
            $formatlang = '';
        }
        $data->data = json_encode([
            'dateitem' => (int)$data->dateitem,
            'dateformat' => (string)$data->dateformat,
            'formatmode' => $formatmode,
            'customformat' => trim((string)($data->customformat ?? '')),
            'formatlang' => $formatlang,
        ]);
        parent::save_form_data($data);
    }

    /**
     * Render the date in a certificate PDF.
     *
     * @param \pdf $pdf the PDF object
     * @param bool $preview whether this is a preview
     * @param \stdClass $user the recipient
     * @param \stdClass $issue the certificate issue
     */
    public function render($pdf, $preview, $user, $issue) {
        $dateinfo = $this->get_date_info();
        if ($preview) {
            $date = time();
        } else if ($dateinfo['dateitem'] === self::DATE_EXPIRY) {
            $date = $issue->expires;
        } else {
            $date = $issue->timecreated;
        }

        if (!empty($date)) {
            \tool_certificate\element_helper::render_content($pdf, $this, $this->format_date($date, $dateinfo));
        }
    }

    /**
     * Render the date in the template editor.
     *
     * @return string HTML for the editor canvas
     */
    public function render_html() {
        return \tool_certificate\element_helper::render_html_content($this, $this->format_date(time(), $this->get_date_info()));
    }

    /**
     * Prepare the stored element data for the edit form.
     *
     * @return \stdClass|array form data
     */
    public function prepare_data_for_form() {
        $record = parent::prepare_data_for_form();
        $dateinfo = $this->get_date_info();
        $record->dateitem = $dateinfo['dateitem'];
        $record->dateformat = $dateinfo['dateformat'];
        $record->formatmode = $dateinfo['formatmode'];
        $record->customformat = $dateinfo['customformat'];
        $record->formatlang = $dateinfo['formatlang'];
        return $record;
    }

    /**
     * Return the standard date formats from the date element shipped with tool_certificate.
     *
     * @return array format identifier => example output
     */
    public static function get_date_formats(): array {
        // Fixed date makes formats with and without a leading zero distinguishable.
        $date = 1530849658;
        $dateformats = [];
        foreach ([
            'strftimedate',
            'strftimedatefullshort',
            'strftimedatefullshortwleadingzero',
            'strftimedateshort',
            'strftimedaydate',
            'strftimedayshort',
            'strftimemonthyear',
        ] as $strdateformat) {
            $dateformats[$strdateformat] = self::get_standard_date_format_string($date, $strdateformat);
        }
        return $dateformats;
    }

    /**
     * Return the installed site languages available for date formatting.
     *
     * @return array language code => display name
     */
    public static function get_available_languages(): array {
        $languages = get_string_manager()->get_list_of_translations();
        asort($languages, SORT_NATURAL | SORT_FLAG_CASE);
        return ['' => get_string('formatlanginherit', 'certificateelement_flexdate')] + $languages;
    }

    /**
     * Determine whether a format is safe and contains only supported strftime directives.
     *
     * Literal text and punctuation are allowed, but HTML tags, control characters and unknown
     * percent directives are rejected. The format is passed only to Moodle's userdate().
     *
     * @param string $format format pattern
     * @return bool whether the pattern is valid
     */
    public static function is_valid_custom_format(string $format): bool {
        if ($format === '' || \core_text::strlen($format) > self::CUSTOM_FORMAT_MAX_LENGTH ||
                preg_match('/[<>\x00-\x1F\x7F]/u', $format)) {
            return false;
        }

        $allowed = 'aAbBcdDeFgGhHIjklmMnprRStTuUVwWxXyYzZ%';
        $length = strlen($format);
        for ($index = 0; $index < $length; $index++) {
            if ($format[$index] !== '%') {
                continue;
            }
            $index++;
            if ($index >= $length || strpos($allowed, $format[$index]) === false) {
                return false;
            }
        }
        return true;
    }

    /**
     * Return a fully populated, defensive representation of stored JSON data.
     *
     * @return array date settings
     */
    protected function get_date_info(): array {
        $defaults = [
            'dateitem' => self::DATE_ISSUE,
            'dateformat' => 'strftimedate',
            'formatmode' => self::FORMAT_STANDARD,
            'customformat' => '',
            'formatlang' => '',
        ];
        $dateinfo = json_decode((string)$this->get_data(), true);
        if (!is_array($dateinfo)) {
            return $defaults;
        }

        $result = array_merge($defaults, $dateinfo);
        $result['dateitem'] = (int)$result['dateitem'];
        $result['dateformat'] = (string)$result['dateformat'];
        $result['customformat'] = trim((string)$result['customformat']);
        $result['formatlang'] = clean_param((string)$result['formatlang'], PARAM_SAFEDIR);
        if ($result['formatmode'] !== self::FORMAT_CUSTOM || !self::is_valid_custom_format($result['customformat'])) {
            $result['formatmode'] = self::FORMAT_STANDARD;
        }
        if ($result['formatlang'] !== '' && !array_key_exists($result['formatlang'], self::get_available_languages())) {
            $result['formatlang'] = '';
        }
        return $result;
    }

    /**
     * Format one timestamp according to the selected mode.
     *
     * @param int $date timestamp
     * @param array $dateinfo date settings
     * @return string formatted date
     */
    protected function format_date(int $date, array $dateinfo): string {
        if ($dateinfo['formatlang'] === '') {
            return $this->format_date_in_current_language($date, $dateinfo);
        }

        // The parent Certificate manager also uses this API during PDF generation.
        // Always restore the prior language so this element cannot affect neighbouring elements.
        $previouslanguage = force_current_language($dateinfo['formatlang']);
        try {
            return $this->format_date_in_current_language($date, $dateinfo);
        } finally {
            force_current_language($previouslanguage);
        }
    }

    /**
     * Format a date in the currently active Moodle language.
     *
     * @param int $date timestamp
     * @param array $dateinfo date settings
     * @return string formatted date
     */
    protected function format_date_in_current_language(int $date, array $dateinfo): string {
        if ($dateinfo['formatmode'] === self::FORMAT_CUSTOM) {
            return userdate($date, $dateinfo['customformat'], 99, false);
        }
        return self::get_standard_date_format_string($date, $dateinfo['dateformat']);
    }

    /**
     * Format a timestamp using the standard date-element logic.
     *
     * @param int $date timestamp
     * @param string $dateformat language string key
     * @return string formatted date
     */
    protected static function get_standard_date_format_string(int $date, string $dateformat): string {
        if ($dateformat === 'strftimedatefullshortwleadingzero') {
            return userdate($date, get_string('strftimedatefullshort', 'langconfig'), 99, false);
        }
        if (get_string_manager()->string_exists($dateformat, 'langconfig')) {
            return userdate($date, get_string($dateformat, 'langconfig'));
        }
        return userdate($date, get_string('strftimedate', 'langconfig'));
    }
}
