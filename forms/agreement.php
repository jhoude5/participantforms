<?php

/**
 * Agreement form
 *
 * @package    local_participantforms
 * @copyright  2021 Jennifer Aube <jennifer.aube@civicactions.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once("$CFG->libdir/formslib.php");

class agreement_form extends moodleform
{
    //Add elements to form
    public function definition()
    {
        global $CFG;
        global $USER;

        $mform = $this->_form; // Don't forget the underscore!
        $mform->addElement('html', '<p>The STAR toolkit contains 30 modules completed in approximately 22 hours over several months. Teachers will need an additional 24 hours to complete assignments and try out STAR techniques in their classrooms. Administrators and state leaders will need some additional time to support and coach the teachers.</p>');
        $radioarray1=array();
        $mform->addElement('html', '<div class="agreement-select">');
        $radioarray1[] = $mform->createElement('radio', 'who', '', 'State Leader', 1, '');
        $radioarray1[] = $mform->createElement('radio', 'who', '', 'Program Administrator', 0, '');
        $radioarray1[] = $mform->createElement('radio', 'who', '', 'Classroom Teacher', 2, '');
        $mform->addGroup($radioarray1, 'who', '<strong>First tell us who you are:</strong>', array(''), false);
        $mform->addElement('html', '</div>');
        // State staff
        $mform->addElement('html', '<div class="agree state-lead"><h2>As a State Leader, I Agree to:</h2>');
        $mform->addElement('checkbox', 'assemble', 'Assemble a state leadership team');
        $mform->addElement('checkbox', 'communicate', 'Communicate expectations of participation to programs');
        $mform->addElement('checkbox', 'identify', 'Identify prospective programs for participation');
        $mform->addElement('checkbox', 'implement', 'Provide state-level resources to support completion of training and pilot implementation');
        $mform->addElement('html', '</div>');
        // Program admin
        $mform->addElement('html', '<div class="agree program-admin show"><h2>As a Program Administrator, I Agree to:</h2>');
        $mform->addElement('checkbox', 'assemble', 'Communicate expectations of participation to programs.');
        $mform->addElement('checkbox', 'communicate', 'Communicate program-level needs to state leadership.');
        $mform->addElement('checkbox', 'identify', 'Identify prospective teachers for participation.');
        $mform->addElement('checkbox', 'implement', 'Provide program-level resources to support completion of training and pilot implementation.');
        $mform->addElement('html', '</div>');
        // Class teacher
        $mform->addElement('html', '<div class="agree class-teacher"><h2>As a Classroom Teacher, I Agree to:</h2>');
        $mform->addElement('checkbox', 'communicate', 'Communicate classroom-level needs to program administrators and state leaders.');
        $mform->addElement('checkbox', 'identify', 'Identify prospective intermediate-level readers for inclusion in the pilot program.');
        $mform->addElement('checkbox', 'implement', 'Implement a pilot, evidence-based reading class for intermediate-level readers.');
        $mform->addElement('html', '</div>');

        $mform->addElement('html', '<h2>Participant Commitments</h2>');
        $mform->addElement('advcheckbox', 'complete', 'Complete 30 training modules including instructional modules, assignment modules, program planning modules, and synchronous meetings (approximately 65 hours) within the timeline of the cohort syllabus');
        $mform->addElement('advcheckbox', 'program', 'Participate in program and/or state level leadership activities to enable and sustain implementation of EBRI, including:
                    <ul>
                        <li>identifying systemic changes necessary for implementing EBRI, and</li>
                        <li>planning and executing plans to address identified changes.</li>
                    </ul>');
        $mform->addElement('advcheckbox', 'community', 'Participate in training cohort online discussions');

        $buttonarray=array();
        $buttonarray[] = $mform->createElement('submit', 'Submit', 'Save');
        $buttonarray[] = $mform->createElement('cancel');
        $mform->addgroup($buttonarray, 'buttonar', '', ' ', false);

    }
    //Custom validation should be added here
    public function validation($data, $files)
    {
        return array();
    }
}
