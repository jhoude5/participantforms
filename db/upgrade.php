<?php
/**
 * Participant forms upgrade database hook.
 *
 * @package   local_participantform
 * @copyright  2021 Jennifer Aube <jennifer.aube@civicactioncs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * upgrade this participantform plugin database
 *
 * @param int $oldversion The old version of the participantform local plugin
 *
 * @return bool
 */
function xmldb_local_participantforms_upgrade($oldversion) {
  global $CFG, $DB;

  $dbman = $DB->get_manager();

  if ($oldversion < 2021120601) {

    // Define table local_participantforms_info to be created.
    $table = new xmldb_table('local_participantforms_info');

    // Adding fields to table local_participantforms_info.
    $programename1 = new xmldb_field('programname1', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $programename1);
    $site1 = new xmldb_field('site1', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $site1);
    $abe2 = new xmldb_field('abe2', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $abe2);
    $abe3 = new xmldb_field('abe3', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $abe3);
    $esl2 = new xmldb_field('esl2', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $esl2);
    $esl3 = new xmldb_field('esl3', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $esl3);
    $volunteer2 = new xmldb_field('volunteers2', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $volunteer2);
    $volunteer3 = new xmldb_field('volunteers3', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $volunteer3);
    $teacher2 = new xmldb_field('teachers2', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $teacher2);
    $teacher3 = new xmldb_field('teachers3', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $teacher3);
    $evidence = new xmldb_field('evidence_based', XMLDB_TYPE_INTEGER, '10', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $evidence);
    $evidence1 = new xmldb_field('evidence_based1', XMLDB_TYPE_INTEGER, '10', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $evidence1);
    $evidence2 = new xmldb_field('evidence_based2', XMLDB_TYPE_INTEGER, '10', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $evidence2);
    $time = new xmldb_field('time', XMLDB_TYPE_INTEGER, '10', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $time);
    $studentesol = new xmldb_field('student_esol', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $studentesol);
    $studentabe = new xmldb_field('student_abe', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $studentabe);
    $beginabe = new xmldb_field('begin_abe', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $beginabe);
    $intabe = new xmldb_field('int_abe', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $intabe);
    $advabe = new xmldb_field('adv_abe', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $advabe);
    $beginesol = new xmldb_field('begin_esol', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $beginesol);
    $intesol = new xmldb_field('int_esol', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $intesol);
    $advesol = new xmldb_field('adv_esol', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $advesol);
    $alloted = new xmldb_field('min_alloted', XMLDB_TYPE_INTEGER, '10', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $alloted);
    $numofclasses = new xmldb_field('num_classes', XMLDB_TYPE_INTEGER, '10', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $numofclasses);
    $assigned = new xmldb_field('assigned', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $assigned);
    $enrolled = new xmldb_field('enrolled', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $enrolled);
    $classes = new xmldb_field('classes', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $classes);
    $assess = new xmldb_field('assess', XMLDB_TYPE_TEXT, NULL, NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $assess);
    $jobtitle = new xmldb_field('jobtitle', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $jobtitle);
    $funded = new xmldb_field('funded', XMLDB_TYPE_TEXT, NULL, NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $funded);
    $system = new xmldb_field('dev_system', XMLDB_TYPE_TEXT, NULL, NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $system);
    $current = new xmldb_field('current_opp', XMLDB_TYPE_TEXT, NULL, NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $current);
    $instruct = new xmldb_field('instruct_aides', XMLDB_TYPE_CHAR, '100', NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $instruct);

    // Conditionally launch create table for local_participantforms_info.
    if (!$dbman->table_exists($table)) {
      $dbman->create_table($table);
    }


    // Participantforms savepoint reached.
    upgrade_plugin_savepoint(TRUE, 2022052801, 'local', 'participantforms');
  }

  elseif ($oldversion < 2022052801) {

    // Update textarea fields to hold more characters.
    $table = new xmldb_table('local_participantforms_info');

    $assess = new xmldb_field('assess', XMLDB_TYPE_TEXT, NULL, NULL, NULL, NULL, NULL);
    $dbman->change_field_type($table, $assess);
    $funded = new xmldb_field('funded', XMLDB_TYPE_TEXT, NULL, NULL, NULL, NULL, NULL);
    $dbman->change_field_type($table, $funded);
    $system = new xmldb_field('dev_system', XMLDB_TYPE_TEXT, NULL, NULL, NULL, NULL, NULL);
    $dbman->change_field_type($table, $system);
    $current = new xmldb_field('current_opp', XMLDB_TYPE_TEXT, NULL, NULL, NULL, NULL, NULL);
    $dbman->change_field_type($table, $current);

    // Conditionally launch create table for local_participantforms_info.
    if (!$dbman->table_exists($table)) {
      $dbman->create_table($table);
    }

    // Participantforms savepoint reached.
    upgrade_plugin_savepoint(TRUE, 2022052801, 'local', 'participantforms');
  }

  elseif ($oldversion < 2022090701) {

    // Update textarea fields to hold more characters.
    $table = new xmldb_table('local_participantforms_info');

    $assess2 = new xmldb_field('assess2', XMLDB_TYPE_TEXT, NULL, NULL, NULL, NULL, NULL);
    $dbman->add_field($table, $assess2);

    // Conditionally launch create table for local_participantforms_info.
    if (!$dbman->table_exists($table)) {
      $dbman->create_table($table);
    }

    // Participantforms savepoint reached.
    upgrade_plugin_savepoint(TRUE, 2022090701, 'local', 'participantforms');
  }

}
