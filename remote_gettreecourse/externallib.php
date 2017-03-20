<?php

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
 * External Web Service Template
 *
 * @package    localwstemplate
 * @copyright  2011 Moodle Pty Ltd (http://moodle.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once($CFG->libdir . "/externallib.php");

class local_unionws_external extends external_api {

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_tree_course_parameters() {
        return new external_function_parameters(
                array(
                //'welcomemessage' => new external_value(PARAM_RAW, 'The welcome message. By default it is "Hello world,"', VALUE_DEFAULT, 'Hello world, ')
                )
        );
    }

    /**
     * Returns welcome message
     * @return string welcome message
     */
    public static function get_tree_course() {
        global $USER, $PAGE;

        //Parameter validation
        //REQUIRED
      //  $params = self::validate_parameters(self::get_tree_course_parameters(),
        //        array('welcomemessage' => $welcomemessage));

        //Context validation
        //OPTIONAL but in most web service it should present
      /*  $context = get_context_instance(CONTEXT_USER, $USER->id);
        self::validate_context($context);

        //Capability checking
        //OPTIONAL but in most web service it should present
        if (!has_capability('moodle/user:viewdetails', $context)) {
            throw new moodle_exception('cannotviewprofile');
        }*/
        
        //take course tree
        $courserenderer = $PAGE->get_renderer('core', 'course');
		$availablecourseshtml = $courserenderer->frontpage_combo_list();
		
        return $availablecourseshtml;
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_tree_course_returns() {
       /*  new external_single_structure(
                array(
                    'TEXT' => new external_value(PARAM_RAW, 'group record id')     
                )
        );*/
        return new external_value(PARAM_RAW, 'group record id');
    }



}
