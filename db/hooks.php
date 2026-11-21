<?php
/**
 * This file is part of Moodle - https://moodle.org/
 *
 * Moodle is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Moodle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Moodle. If not, see <https://www.gnu.org/licenses/>.
 *
 */
/**
 * Native update protection hook registration.
 *
 * @package certificateelement_flexdate
 * @copyright 2026 Andreas Giesen <andreas@108design.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

$callbacks = [];

// Native installation and updates are handled by Moodle Core.

// Optional package information; Core owns preview, confirmation and installation.
$callbacks[] = [
    'hook' => \core\hook\after_config::class,
    'callback' => [\certificateelement_flexdate\local\update_notice::class, 'after_config'],
    'priority' => 1003,
];
$callbacks[] = [
    'hook' => \core\hook\output\before_standard_top_of_body_html_generation::class,
    'callback' => [\certificateelement_flexdate\local\update_notice::class, 'before_body'],
];
