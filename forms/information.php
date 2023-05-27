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
 * Information form
 *
 * @package    local_participantforms
 * @copyright  2021 Jennifer Aube <jennifer.aube@civicactions.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once("$CFG->libdir/formslib.php");

class information_form extends moodleform
{
    //Add elements to form
    public function definition()
    {
        global $CFG;

        $mform = $this->_form; // Don't forget the underscore!
        $mform->addElement('html', '<div class="information-select">');
        $radioarray1=array();
        $radioarray1[] = $mform->createElement('radio', 'who', '', 'State staff', 1, '');
        $radioarray1[] = $mform->createElement('radio', 'who', '', 'Program administrator', 0, '');
        $radioarray1[] = $mform->createElement('radio', 'who', '', 'Classroom teacher', 2, '');
        $mform->addGroup($radioarray1, 'who', '<strong>First tell us who you are:</strong>', array(' '), false);

        $mform->addElement('html', '</div>');
        // Classroom teacher
        $mform->addElement('html', '<div class="information class-teacher">');
        $mform->addElement('text', 'programname', 'Program name', ' size="100%" ');
        $mform->setType('programname', PARAM_TEXT);
        $mform->setDefault('programname', '');

        $mform->addElement('text', 'site', 'How many instructional sites are there?', ' size="100%" ');
        $mform->setType('site', PARAM_TEXT);
        $mform->setDefault('site', '');

        $radioyesno=array();
        $radioyesno[] = $mform->createElement('radio', 'evidence_based', '', 'Yes', 1, '');
        $radioyesno[] = $mform->createElement('radio', 'evidence_based', '', 'No', 0, '');
        $mform->addGroup($radioyesno, 'evidence_based', '<strong>New to evidence-based reading instruction?</strong>', array(' '), false);

        $radioyesno1=array();
        $radioyesno1[] = $mform->createElement('radio', 'time', '', 'Yes', 1, '');
        $radioyesno1[] = $mform->createElement('radio', 'time', '', 'No', 0, '');
        $mform->addGroup($radioyesno1, 'time', '<strong>Do you have paid planning time?</strong>', array(' '), false);

        $mform->addElement('html', '<p>STAR training includes: <ol><li>learning about EBRI; and</li><li>practicing the new techniques learned with intermediate level adult readers.</li></ol></p><div class="accordion" id="studentdata-accordion--inner"><div class="accordion-item" id="accordion">');
        $mform->addElement('html',
            '<span class="usa-accordion__heading" id="headingone">
                    <button class="usa-accordion__button collapsed" type="button" aria-expanded="false">
                    Answer the following questions about the class in which you plan to practice the techniques you\'ll learn:<i class="fa fa-plus"></i><i class="fa fa-minus"></i></button></span>');

        $mform->addElement('html', '<div id="collapseone" class="accordion-collapse usa-accordion__content usa-prose collapse" aria-labelledby="headingone"><div class="accordion-body">');
        $mform->addElement('html', '<h2>Approximate number of students in the class in which you will practice:</h2>');

        $mform->addElement('text', 'student_esol', 'ESOL', ' size="100%" ');
        $mform->setType('student_esol', PARAM_TEXT);
        $mform->setDefault('student_esol', '');

        $mform->addElement('text', 'student_abe', 'ABE', ' size="100%" ');
        $mform->setType('student_abe', PARAM_TEXT);
        $mform->setDefault('student_abe', '');
        $mform->addElement('html', '<h2>How many students are at each of the following levels?</h2>');

        $mform->addElement('text', 'begin_abe', 'Beginning Level ABE Readers (GLE 0 - 3.9)', ' size="100%" ');
        $mform->setType('begin_abe', PARAM_TEXT);
        $mform->setDefault('begin_abe', '');

        $mform->addElement('text', 'int_abe', 'Intermediate Level ABE Readers (GLE 4 - 8.9)', ' size="100%" ');
        $mform->setType('int_abe', PARAM_TEXT);
        $mform->setDefault('int_abe', '');

        $mform->addElement('text', 'adv_abe', 'Advanced Level ABE Readers (GLE 9 - 12.9)', ' size="100%" ');
        $mform->setType('adv_abe', PARAM_TEXT);
        $mform->setDefault('adv_abe', '');

        $mform->addElement('text', 'begin_esol', 'Beginning Level ESOL Readers (GLE 0 - 3.9)', ' size="100%" ');
        $mform->setType('begin_esol', PARAM_TEXT);
        $mform->setDefault('begin_esol', '');

        $mform->addElement('text', 'int_esol', 'Intermediate Level ESOL Readers (GLE 4 - 8.9)', ' size="100%" ');
        $mform->setType('int_esol', PARAM_TEXT);
        $mform->setDefault('int_esol', '');

        $mform->addElement('text', 'adv_esol', 'Advanced Level ESOL Readers (GLE 9 - 12.9)', ' size="100%" ');
        $mform->setType('adv_esol', PARAM_TEXT);
        $mform->setDefault('adv_esol', '');

        $minalloted = array('15', '30', '45', '60', '75', '90', '105', '120', '135');
        $mform->addElement('select', 'min_alloted', 'Number of minutes per class allotted for reading instruction', $minalloted);

        $numclasses = array('1', '2', '3', '4', '5');
        $mform->addElement('select', 'num_classes', 'Number of days per week the class meets', $numclasses);

        $radioarray1=array();
        $radioarray1[] = $mform->createElement('radio', 'assigned', '', 'They choose based on schedule.', 1, '');
        $radioarray1[] = $mform->createElement('radio', 'assigned', '', 'They\'re assigned based on assessment scores.', 0, '');
        $radioarray1[] = $mform->createElement('radio', 'assigned', '', 'Other', 2, '');
        $mform->addGroup($radioarray1, 'assigned', '<strong>How are students assigned to classes?</strong>', array(' '), false);

        $radioarray2=array();
        $radioarray2[] = $mform->createElement('radio', 'enrolled', '', 'Any time. We have open enrollment.', 1, '');
        $radioarray2[] = $mform->createElement('radio', 'enrolled', '', 'We have managed enrollment.', 0, '');
        $radioarray2[] = $mform->createElement('radio', 'enrolled', '', 'Other', 2, '');
        $mform->addGroup($radioarray2, 'enrolled', '<strong>When can new students enroll in class?</strong>', array(' '), false);

        $mform->addElement('html', '</div></div></div></div>');

        $mform->addElement('html', '</div>');
        // End of classroom teacher

        // Program admin
        $mform->addElement('html', '<div class="information program-admin show">');
        $mform->addElement('text', 'programname1', 'Program name', ' size="100%" ');
        $mform->setType('programname1', PARAM_TEXT);
        $mform->setDefault('programname1', '');

        $radioyesno2=array();
        $radioyesno2[] = $mform->createElement('radio', 'evidence_based1', '', 'Yes', 1, '');
        $radioyesno2[] = $mform->createElement('radio', 'evidence_based1', '', 'No', 0, '');
        $mform->addGroup($radioyesno2, 'evidence_based1', '<strong>New to evidence-based reading instruction?</strong>', array(' '), false);

        $mform->addElement('html', '<div class="accordion" id="studentdata-accordion--inner"><div class="accordion-item" id="accordion">');
        $mform->addElement('html',
            '<span class="usa-accordion__heading" id="headingone">
                    <button class="usa-accordion__button collapsed" type="button" aria-expanded="false">
                    About how many students does your program serve each year?<i class="fa fa-plus"></i><i class="fa fa-minus"></i></button></span>');

        $mform->addElement('html', '<div id="collapseone" class="accordion-collapse usa-accordion__content usa-prose collapse" aria-labelledby="headingone"><div class="accordion-body">');

        $mform->addElement('text', 'abe2', 'ABE', ' size="100%" ');
        $mform->setType('abe2', PARAM_TEXT);
        $mform->setDefault('abe2', '');

        $mform->addElement('text', 'esl2', 'ESL', ' size="100%" ');
        $mform->setType('esl2', PARAM_TEXT);
        $mform->setDefault('esl2', '');
        $mform->addElement('html', '</div></div></div></div>');

        $mform->addElement('html', '<div class="accordion" id="studentdata-accordion--inner"><div class="accordion-item" id="accordion">');
        $mform->addElement('html',
            '<span class="usa-accordion__heading" id="headingtwo">
                    <button class="usa-accordion__button collapsed" type="button" aria-expanded="false">
                    How many instructional staff does your program have?<i class="fa fa-plus"></i><i class="fa fa-minus"></i></button></span>');

        $mform->addElement('html', '<div id="collapsetwo" class="accordion-collapse usa-accordion__content usa-prose collapse" aria-labelledby="headingtwo"><div class="accordion-body">');

        $mform->addElement('text', 'teachers2', 'Teachers', ' size="100%" ');
        $mform->setType('teachers2', PARAM_TEXT);
        $mform->setDefault('teachers2', '');

        $mform->addElement('text', 'instruct_aides', 'Instructional Aides', ' size="100%" ');
        $mform->setType('instruct_aides', PARAM_TEXT);
        $mform->setDefault('instruct_aides', '');

        $mform->addElement('text', 'volunteers2', 'Volunteers', ' size="100%" ');
        $mform->setType('volunteers2', PARAM_TEXT);
        $mform->setDefault('volunteers2', '');
        $mform->addElement('html', '</div></div></div></div>');

        $mform->addElement('text', 'site1', 'How many instructional sites are there?', ' size="100%" ');
        $mform->setType('site1', PARAM_TEXT);
        $mform->setDefault('site1', '');

        $mform->addElement('text', 'classes', 'How many classes?', ' size="100%" ');
        $mform->setType('classes', PARAM_TEXT);
        $mform->setDefault('classes', '');

        $mform->addElement('textarea', 'assess', 'What standardized assessment does your program use for NRS for ABE students?', ' size="100%" ');
        $mform->setType('assess', PARAM_TEXT);
        $mform->setDefault('assess', '');

      $mform->addElement('textarea', 'assess2', 'What standardized assessment does your program use for NRS for ESOL students?', ' size="100%" ');
      $mform->setType('assess2', PARAM_TEXT);
      $mform->setDefault('assess2', '');

        $mform->addElement('html', '</div>');
        // End of program admin

        // State staff
        $mform->addElement('html', '<div class="information state-staff">');

        $mform->addElement('text', 'jobtitle', 'Job Title', ' size="100%" ');
        $mform->setType('jobtitle', PARAM_TEXT);
        $mform->setDefault('jobtitle', '');

        $radioyesno3=array();
        $radioyesno3[] = $mform->createElement('radio', 'evidence_based2', '', 'Yes', 1, '');
        $radioyesno3[] = $mform->createElement('radio', 'evidence_based2', '', 'No', 0, '');
        $mform->addGroup($radioyesno3, 'evidence_based2', '<strong>New to evidence-based reading instruction?</strong>', array(' '), false);

        $mform->addElement('textarea', 'funded', 'How are programs funded in your state?', ' size="100%" ');
        $mform->setType('funded', PARAM_TEXT);
        $mform->setDefault('funded', '');

        $mform->addElement('textarea', 'dev_system', 'Describe your state\'s professional development system:', ' size="100%" ');
        $mform->setType('dev_system', PARAM_TEXT);
        $mform->setDefault('dev_system', '');

        $mform->addElement('textarea', 'current_opp', 'Describe any current or recent reading initiatives or development opportunities in your state:', ' size="100%" ');
        $mform->setType('current_opp', PARAM_TEXT);
        $mform->setDefault('current_opp', '');

        $mform->addElement('html', '</div>');
        // End of state staff

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
