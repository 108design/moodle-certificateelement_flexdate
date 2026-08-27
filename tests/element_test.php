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
 * Tests for the flexible date certificate element.
 *
 * @package    certificateelement_flexdate
 * @copyright  2018 Daniel Neis Araujo <daniel@moodle.com>
 * @copyright  2026 Andreas Giesen <andreas@108design.com>
 * @author     Daniel Neis Araujo <daniel@moodle.com>
 * @author     Andreas Giesen <andreas@108design.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace certificateelement_flexdate;

use advanced_testcase;
use tool_certificate_generator;

/**
 * Tests for the flexible date element.
 *
 * @package    certificateelement_flexdate
 * @group      tool_certificate
 * @covers     \certificateelement_flexdate\element
 */
final class element_test extends advanced_testcase {

    /** Reset database state between tests. */
    public function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    /**
     * Get the Certificate manager generator.
     *
     * @return tool_certificate_generator
     */
    protected function get_generator(): tool_certificate_generator {
        return $this->getDataGenerator()->get_plugin_generator('tool_certificate');
    }

    /** Validate supported and rejected custom patterns. */
    public function test_custom_format_validation(): void {
        $this->assertTrue(element::is_valid_custom_format('%d.%m.%Y'));
        $this->assertTrue(element::is_valid_custom_format('%d. %B %Y'));
        $this->assertTrue(element::is_valid_custom_format('Issued: %Y-%%m'));
        $this->assertFalse(element::is_valid_custom_format(''));
        $this->assertFalse(element::is_valid_custom_format('%Q'));
        $this->assertFalse(element::is_valid_custom_format('%'));
        $this->assertFalse(element::is_valid_custom_format('<b>%d</b>'));
    }

    /** Save custom-format settings in element JSON. */
    public function test_save_custom_format_data(): void {
        global $DB;

        $template = $this->get_generator()->create_template((object)['name' => 'Certificate']);
        $pageid = $this->get_generator()->create_page($template)->get_id();
        $element = $this->get_generator()->new_element($pageid, 'flexdate');
        $data = (object)[
            'dateitem' => element::DATE_ISSUE,
            'dateformat' => 'strftimedate',
            'formatmode' => element::FORMAT_CUSTOM,
            'customformat' => '%Y-%m-%d',
            'formatlang' => current_language(),
        ];
        $element->save_form_data($data);

        $stored = $DB->get_field('tool_certificate_elements', 'data', ['id' => $element->get_id()]);
        $this->assertEquals([
            'dateitem' => element::DATE_ISSUE,
            'dateformat' => 'strftimedate',
            'formatmode' => element::FORMAT_CUSTOM,
            'customformat' => '%Y-%m-%d',
            'formatlang' => current_language(),
        ], json_decode($stored, true));
    }

    /** Ensure the edit form for this element can render. */
    public function test_edit_element_form(): void {
        $this->setAdminUser();
        $form = $this->get_generator()->create_template_and_edit_element_form('flexdate');
        $this->assertNotEmpty($form->render());
    }
}
