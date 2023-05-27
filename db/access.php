<?php


/**
 * Plugin capabilities
 *
 * @package    local_participantforms
 * @copyright  2021 Jennifer Aube <jennifer.aube@civicactioncs.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$capabilities = array(
    'local/participantforms:admin' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager'=> CAP_ALLOW,
        ),
    )
);
