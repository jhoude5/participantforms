<?php


require_once('../../config.php');
global $USER, $DB, $CFG, $PAGE, $OUTPUT, $SESSION;

require_once("forms/information.php");

$PAGE->set_url('/local/participantforms/informationform.php');
$PAGE->set_context(context_system::instance());
$PAGE->requires->js('/local/participantforms/assets/participantforms.js');

require_login();
$PAGE->set_pagelayout('starcourse');
$strpagetitle = get_string('information', 'local_participantforms');
$strpageheading = get_string('information', 'local_participantforms');

$PAGE->set_title($strpagetitle);
$PAGE->set_heading($strpageheading);

$mform = new information_form();
$toform = [];
$infoarr = array();
$infodb = $DB->get_record('local_participantforms_info', ['userid'=>$USER->id]);
  //Form processing and displaying is done here
$previous = '';
      if ($mform->is_cancelled()) {
          //Handle form cancel operation, if cancel button is present on form
          redirect("/local/staruser/user.php?userid=" . $USER->id, '', 10);
      } elseif ($fromform = $mform->get_data()) {

          foreach($fromform as $key => $value) {
              $infoarr[$key] = $value;
          }
          $infoarr['userid'] = $USER->id;

          if (!empty($infodb)) {

              $toform = $DB->get_record('local_participantforms_info', ['userid' => $USER->id]);

              $infoarr['id'] = $infodb->id;
              $DB->update_record('local_participantforms_info', $infoarr);

          } else {
              $DB->insert_record('local_participantforms_info', $infoarr);
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
          if (!empty($infodb)) {

             foreach($infodb as $key => $value) {
                  $toform[$key] = $value;
              }
          }

          //Set default data (if any)
          $mform->set_data($toform);

          echo $OUTPUT->header();
          $mform->display();

          echo $OUTPUT->footer();
}
