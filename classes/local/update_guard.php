<?php
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
