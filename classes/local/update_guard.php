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
 * Early independent update-package guard.
 *
 * @package certificateelement_flexdate
 * @copyright 2026 Andreas Giesen <andreas@108design.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace certificateelement_flexdate\local;

defined('MOODLE_INTERNAL') || die();

/** Keep the update guard available independently of optional product hosts. */
final class update_guard {
    /**
     * Check supported native update requests before any plugin files are replaced.
     *
     * @param \core\hook\after_config $hook Native early configuration hook.
     * @return void
     */
    public static function after_config(\core\hook\after_config $hook): void {
        if (!class_exists(\design108\update_guard\v1\guard::class, false)) {
            require_once(dirname(__DIR__, 2) . '/update-guard.php');
        }
        \design108\update_guard\v1\guard::enter('certificateelement_flexdate', dirname(__DIR__, 2));
    }
}
