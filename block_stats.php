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

/**
 * Stats block caps.
 *
 * @package    block_stats
 * @copyright  Dylan Keys <dylankeys@icloud.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class block_stats extends block_base {

    function init() {
        $this->title = get_string('pluginname', 'block_stats');
    }

    // Block content
    function get_content() {
        global $USER;

        // Do we have any content?
        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

        // Add content
        $this->content = new stdClass();
        $this->content->footer = '';

        $blockid = $this->instance->id;
        $courseid = $this->page->course->id;
        $renderer = $this->page->get_renderer('block_stats');
        $this->content->text = $renderer->fetch_block_content($blockid, $courseid);

        return $this->content;
    }

    /**
     * This is a list of places where the block may or
     * may not be added.
     */
    public function applicable_formats() {
        return array('all' => false,
            'site' => true,
            'site-index' => true,
            'course-view' => true,
            'my' => true);
    }

    public function instance_allow_multiple() {
          return true;
    }

    function has_config() {
        return true;
    }

    public function cron() {
        mtrace( "Hey, my cron script is running" );

        // do something
        return true;
    }
}
