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
 * Stats block renderer
 *
 * @package    block_stats
 * @copyright  Dylan Keys <dylankeys@icloud.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_stats_renderer extends plugin_renderer_base {

    function fetch_block_content($blockid, $courseid) {

        global $DB, $CFG;

        $data = new stdClass();

        // Get total number of records from the user table
        $usercount = $DB->count_records('user');

        // Take away one from this total to account for the guest user
        $usercount = $usercount - 1;

        // Build data object for output to the template
        $data->usercount = $usercount;

        // Render the data in a Mustache template and return to the block
        return $this->render_from_template('block_stats/block_content', $data);
    }
}