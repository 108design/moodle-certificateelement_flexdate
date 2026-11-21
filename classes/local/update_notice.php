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
 * Package replacement compatibility.
 *
 * @package certificateelement_flexdate
 * @copyright 2026 Andreas Giesen <andreas@108design.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace certificateelement_flexdate\local;

defined('MOODLE_INTERNAL') || die();

/** Optional information on the native preview; never replaces Core's decisions. */
final class update_notice {
    /** Remember the preview without output or additional authentication. */
    public static function after_config(\core\hook\after_config $hook): void {
        try {
            if (!class_exists(\design108\package_notice\v1\notice::class, false)) {
                $path = dirname(__DIR__, 2) . '/update-notice.php';
                if (!is_readable($path)) {
                    return;
                }
                require_once($path);
            }
            \design108\package_notice\v1\notice::remember('certificateelement_flexdate', dirname(__DIR__, 2));
        } catch (\Throwable $ignored) {
            // Optional information must never abort the request.
        }
    }

    /** Render before Core's native confirmation controls in maintenance layouts. */
    public static function before_body(\core\hook\output\before_standard_top_of_body_html_generation $hook): void {
        try {
            if (class_exists(\design108\package_notice\v1\notice::class, false)) {
                \design108\package_notice\v1\notice::before_body('certificateelement_flexdate', $hook);
            }
        } catch (\Throwable $ignored) {
            // Core continues even if optional rendering fails.
        }
    }
}
