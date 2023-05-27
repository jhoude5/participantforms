<?php


require_once('../../config.php');
global $USER, $DB, $CFG, $PAGE, $OUTPUT, $SESSION;

require_once("forms/agreement.php");

$PAGE->set_url('/local/participantforms/agreementform.php');
$PAGE->set_context(context_system::instance());
$PAGE->requires->js('/local/participantforms/assets/participantforms.js');

require_login();
$PAGE->set_pagelayout('starcourse');
$strpagetitle = get_string('agreement', 'local_participantforms');
$strpageheading = get_string('agreement', 'local_participantforms');

$PAGE->set_title($strpagetitle);
$PAGE->set_heading($strpageheading);

$mform = new agreement_form();
$toform = [];
$agreearr = array();
$agreedb = $DB->get_record('local_participantforms_agree', ['userid'=>$USER->id]);
//Form processing and displaying is done here
$previous = '';
if ($mform->is_cancelled()) {
    //Handle form cancel operation, if cancel button is present on form
    redirect("/local/staruser/user.php?userid=" . $USER->id, '', 10);
} elseif ($fromform = $mform->get_data()) {
    foreach($fromform as $key => $value) {
        $agreearr[$key] = $value;
    }
    $agreearr['userid'] = $USER->id;


    if (!empty($agreedb)) {

        $agreearr['id'] = $agreedb->id;
        $DB->update_record('local_participantforms_agree', $agreearr);

    } else {
        $DB->insert_record('local_participantforms_agree', $agreearr);
    }
    if (isset($SESSION->previous)) {
        $previous = $SESSION->previous;
        redirect($previous, 'Form updated', 10,  \core\output\notification::NOTIFY_SUCCESS);
    } else {
        redirect("/local/staruser/user.php?userid=" . $USER->id, 'Form updated', 10,  \core\output\notification::NOTIFY_SUCCESS);
    }

} else {
    //In this case you process validated data. $mform->get_data() returns data posted in form.
    // Save form data
    if(isset($_SERVER['HTTP_REFERER'])) {
        $SESSION->previous = $_SERVER['HTTP_REFERER'];
    }
    if (!empty($agreedb)) {
            foreach($agreedb as $key => $value) {
                $toform[$key] = $value;
            }

    }
    //Set default data (if any)
    $mform->set_data($toform);

    echo $OUTPUT->header();
    $mform->display();

    echo $OUTPUT->footer();
}
