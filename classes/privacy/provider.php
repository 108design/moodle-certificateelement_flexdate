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
 * Privacy provider for certificateelement_flexdate.
 *
 * @package    certificateelement_flexdate
 * @copyright  2018 Mark Nelson <markn@moodle.com>
 * @copyright  2026 Andreas Giesen <andreas@108design.com>
 * @author     Mark Nelson <markn@moodle.com>
 * @author     Andreas Giesen <andreas@108design.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace certificateelement_flexdate\privacy;

/**
 * The element stores no personal data of its own.
 */
class provider implements \core_privacy\local\metadata\null_provider {

    /**
     * Explain why this plugin stores no personal data.
     *
     * @return string language string identifier
     */
    public static function get_reason(): string {
        return 'privacy:metadata';
    }
}
