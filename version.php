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
 * Version information for the flexible date certificate element.
 *
 * @package    certificateelement_flexdate
 * @copyright  2013 Mark Nelson <markn@moodle.com>
 * @copyright  2026 Andreas Giesen <andreas@108design.com>
 * @author     Mark Nelson <markn@moodle.com>
 * @author     Andreas Giesen <andreas@108design.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'certificateelement_flexdate';
$plugin->release = '1.0.5';
$plugin->version = 2026100800;
$plugin->requires = 2024100700; // Moodle 4.5.
$plugin->maturity = MATURITY_STABLE;
$plugin->supported = [405, 503];
$plugin->dependencies = ['tool_certificate' => ANY_VERSION];
