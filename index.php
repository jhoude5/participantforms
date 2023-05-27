<?php

require_once '../../config.php';
global $USER, $DB, $CFG;

$PAGE->set_url('/local/participantforms/index.php');
$PAGE->set_context(context_system::instance());


require_login();
$PAGE->set_pagelayout('starcourse');

$strpagetitle = get_string('pagetitle', 'local_participantforms');
$strpageheading = get_string('pagetitle', 'local_participantforms');

$PAGE->set_title($strpagetitle);
$PAGE->set_heading($strpageheading);


echo $OUTPUT->header();
echo '<a href="/local/participantforms/informationform.php">Participant information form</a><br/>';
echo '<a href="/local/participantforms/agreementform.php">Participant agreement form</a>';

echo $OUTPUT->footer();
