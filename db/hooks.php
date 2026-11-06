<?php
/**
 * Native update protection hook registration.
 *
 * @package certificateelement_flexdate
 * @copyright 2026 Andreas Giesen <andreas@108design.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

$callbacks = [];

$callbacks[] = [
    'hook' => \core\hook\after_config::class,
    'callback' => [\certificateelement_flexdate\local\update_guard::class, 'after_config'],
    'priority' => 1002,
];
