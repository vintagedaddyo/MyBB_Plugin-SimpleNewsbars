 <?php
/*
 * MyBB: Simple Newsbars
 *
 * File: simplenewsbars.php
 * 
 * Authors: Vintagedaddyo
 *
 * MyBB Version: 1.8
 *
 * Plugin Version: 1.1
 * 
 */

if (!defined("IN_MYBB")) {
    die("You cannot access this file directly. Please make sure IN_MYBB is defined.");
}

// Add Hooks

$plugins->add_hook('index_start', 'simplenewsbars_index_start');
$plugins->add_hook('portal_start', 'simplenewsbars_portal_start');

// Plugin Information

function simplenewsbars_info()
{
    global $lang;

    // Load Language

    $lang->load("simplenewsbars");
    
    $lang->simplenewsbars_desc = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="float:right;">' .
        '<input type="hidden" name="cmd" value="_s-xclick">' . 
        '<input type="hidden" name="hosted_button_id" value="AZE6ZNZPBPVUL">' .
        '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">' .
        '<img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1">' .
        '</form>' . $lang->simplenewsbars_desc;

    return Array(
        'name' => $lang->simplenewsbars_name,
        'description' => $lang->simplenewsbars_desc,
        'website' => $lang->simplenewsbars_web,
        'author' => $lang->simplenewsbars_auth,
        'authorsite' => $lang->simplenewsbars_authsite,
        'version' => $lang->simplenewsbars_ver,
        'compatibility' => $lang->simplenewsbars_compat
    );
}

function simplenewsbars_activate()
{
    global $settings, $mybb, $db, $lang;
    
    // Load Language
    
    $lang->load("simplenewsbars");
    
    // Setting Group
        
    $simplenewsbars_group = array(
        'gid' => '0',
        'name' => 'simplenewsbars',
        'title' => $lang->simplenewsbars_title_setting_group,
        'description' => $lang->simplenewsbars_description_setting_group,
        'disporder' => "1",
        'isdefault' => "0"
    );
    
    // Settinggroup Insert Query

    $db->insert_query('settinggroups', $simplenewsbars_group);
    
    $gid = $db->insert_id();
    
    // Setting 1
        
    $simplenewsbars_setting_1 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_enable_index',
        'title' => $lang->simplenewsbars_title_setting_1,
        'description' => $lang->simplenewsbars_description_setting_1,
        'optionscode' => 'yesno',
        'value' => '1',
        'disporder' => '1',
        'gid' => intval($gid)
    );
    
    // Setting 2
        
    $simplenewsbars_setting_2 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_enable_portal',
        'title' => $lang->simplenewsbars_title_setting_2,
        'description' => $lang->simplenewsbars_description_setting_2,
        'optionscode' => 'yesno',
        'value' => '1',
        'disporder' => '2',
        'gid' => intval($gid)
    );
    
    // Setting 3
        
    $simplenewsbars_setting_3 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_input_1',
        'title' => $lang->simplenewsbars_title_setting_3,
        'description' => $lang->simplenewsbars_description_setting_3,
        'optionscode' => 'textarea',
        'value' => '<strong>Latest MyBB Release:</strong> <a href="http://blog.mybb.com/2018/03/15/mybb-1-8-15-released-security-maintenance-release/">MyBB 1.8.15 Released — Security & Maintenance Release</a> <span class="date">(March 15, 2018)</span>',
        'disporder' => '3',
        'gid' => intval($gid)
    );
    
    // Setting 4
        
    $simplenewsbars_setting_4 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_enable_input_1',
        'title' => $lang->simplenewsbars_title_setting_4,
        'description' => $lang->simplenewsbars_description_setting_4,
        'optionscode' => 'yesno',
        'value' => '1',
        'disporder' => '4',
        'gid' => intval($gid)
    );
    
    // Setting 5
        
    $simplenewsbars_setting_5 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_input_2',
        'title' => $lang->simplenewsbars_title_setting_5,
        'description' => $lang->simplenewsbars_description_setting_5,
        'optionscode' => 'textarea',
        'value' => '<strong>Latest news from the MyBB Blog:</strong> <a href="http://blog.mybb.com/2018/01/07/mybb-support-policy-changes/">MyBB Support Policy Changes</a> <span class="date">(January 7, 2018)</span>',
        'disporder' => '5',
        'gid' => intval($gid)
    );
    
    // Setting 6
        
    $simplenewsbars_setting_6 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_enable_input_2',
        'title' => $lang->simplenewsbars_title_setting_6,
        'description' => $lang->simplenewsbars_description_setting_6,
        'optionscode' => 'yesno',
        'value' => '1',
        'disporder' => '6',
        'gid' => intval($gid)
    );
    
    // Setting 7
        
    $simplenewsbars_setting_7 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_input_3',
        'title' => $lang->simplenewsbars_title_setting_7,
        'description' => $lang->simplenewsbars_description_setting_7,
        'optionscode' => 'textarea',
        'value' => '<strong>Are you on the </strong><a href="http://community.mybb.com/member.php?action=register">MyBB Community Forums</a><strong>&nbsp;?</strong> - Sign up for notification of new MyBB releases and updates.',
        'disporder' => '7',
        'gid' => intval($gid)
    );
    
    // Setting 8
        
    $simplenewsbars_setting_8 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_enable_input_3',
        'title' => $lang->simplenewsbars_title_setting_8,
        'description' => $lang->simplenewsbars_description_setting_8,
        'optionscode' => 'yesno',
        'value' => '1',
        'disporder' => '8',
        'gid' => intval($gid)
    );
    
    // Setting 9
    
    $simplenewsbars_setting_9 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_input_4',
        'title' => $lang->simplenewsbars_title_setting_9,
        'description' => $lang->simplenewsbars_description_setting_9,
        'optionscode' => 'textarea',
        'value' => '<strong>Latest MyBB Release:</strong> <a href="http://blog.mybb.com/2018/03/15/mybb-1-8-15-released-security-maintenance-release/">MyBB 1.8.15 Released — Security & Maintenance Release</a> <span class="date">(March 15, 2018)</span>',
        'disporder' => '9',
        'gid' => intval($gid)
    );
    
    // Setting 10
        
    $simplenewsbars_setting_10 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_enable_input_4',
        'title' => $lang->simplenewsbars_title_setting_10,
        'description' => $lang->simplenewsbars_description_setting_10,
        'optionscode' => 'yesno',
        'value' => '1',
        'disporder' => '10',
        'gid' => intval($gid)
    );
    
    // Setting 11
        
    $simplenewsbars_setting_11 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_input_5',
        'title' => $lang->simplenewsbars_title_setting_11,
        'description' => $lang->simplenewsbars_description_setting_11,
        'optionscode' => 'textarea',
        'value' => '<strong>Latest news from the MyBB Blog:</strong> <a href="http://blog.mybb.com/2018/01/07/mybb-support-policy-changes/">MyBB Support Policy Changes</a> <span class="date">(January 7, 2018)</span>',
        'disporder' => '11',
        'gid' => intval($gid)
    );
    
    // Setting 12
        
    $simplenewsbars_setting_12 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_enable_input_5',
        'title' => $lang->simplenewsbars_title_setting_12,
        'description' => $lang->simplenewsbars_description_setting_12,
        'optionscode' => 'yesno',
        'value' => '1',
        'disporder' => '12',
        'gid' => intval($gid)
    );
    
    // Setting 13
        
    $simplenewsbars_setting_13 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_input_6',
        'title' => $lang->simplenewsbars_title_setting_13,
        'description' => $lang->simplenewsbars_description_setting_13,
        'optionscode' => 'textarea',
        'value' => '<strong>Are you on the </strong><a href="http://community.mybb.com/member.php?action=register">MyBB Community Forums</a><strong>&nbsp;?</strong> - Sign up for notification of new MyBB releases and updates.',
        'disporder' => '13',
        'gid' => intval($gid)
    );
    
    // Setting 14
        
    $simplenewsbars_setting_14 = array(
        'sid' => '0',
        'name' => 'simplenewsbars_enable_input_6',
        'title' => $lang->simplenewsbars_title_setting_8,
        'description' => $lang->simplenewsbars_description_setting_8,
        'optionscode' => 'yesno',
        'value' => '1',
        'disporder' => '14',
        'gid' => intval($gid)
    );

    // Enable Index / Portal Insert Queries
    
    $db->insert_query('settings', $simplenewsbars_setting_1);
    $db->insert_query('settings', $simplenewsbars_setting_2);

    // Index Insert Queries

    $db->insert_query('settings', $simplenewsbars_setting_3);
    $db->insert_query('settings', $simplenewsbars_setting_4);
    $db->insert_query('settings', $simplenewsbars_setting_5);
    $db->insert_query('settings', $simplenewsbars_setting_6);
    $db->insert_query('settings', $simplenewsbars_setting_7);
    $db->insert_query('settings', $simplenewsbars_setting_8);

    // Portal Insert Queries

    $db->insert_query('settings', $simplenewsbars_setting_9);
    $db->insert_query('settings', $simplenewsbars_setting_10);
    $db->insert_query('settings', $simplenewsbars_setting_11);
    $db->insert_query('settings', $simplenewsbars_setting_12);
    $db->insert_query('settings', $simplenewsbars_setting_13);
    $db->insert_query('settings', $simplenewsbars_setting_14);
    
    // Rebuild Settings

    rebuild_settings();
    
    // Insert Array
        
    $insertarray = array(
        "title" => "simplenewsbars_1",
        "template" => "<style>
.alert {
    background: #FFF6BF;
    border-top: 1px solid #FFD324;
    border-left: 1px solid #FFD324;
    border-right: 1px solid #FFD324;
    border-bottom: 1px solid #FFD324;
    text-align: center;
    margin: 10px auto;
    padding: 5px 20px;
    border-radius: 6px;
    color: #404040;
}
</style><div id=\"alert\"><p class=\"alert\">{\$mybb->settings[\'simplenewsbars_input_1\']}</p></div>",
        "sid" => -1,
        "dateline" => TIME_NOW
    );
    
    // Insert Array Query
        
    $db->insert_query("templates", $insertarray);
    
    // Insert Array
        
    $insertarray = array(
        "title" => "simplenewsbars_2",
        "template" => "<style>
.notice1 {
    background: #D6ECA6;
    border-top: 1px solid #8DC93E;
    border-left: 1px solid #8DC93E;
    border-right: 1px solid #8DC93E;
    border-bottom: 1px solid #8DC93E;
    text-align: center;
    margin: 10px auto;
    padding: 5px 20px;
    border-radius: 6px;
    color: #404040;
}
</style><div id=\"notice1\"><p class=\"notice1\">{\$mybb->settings[\'simplenewsbars_input_2\']}</p></div>",
        "sid" => -1,
        "dateline" => TIME_NOW
    );
    
    // Insert Array Query
        
    $db->insert_query("templates", $insertarray);
    
    // Insert Array
        
    $insertarray = array(
        "title" => "simplenewsbars_3",
        "template" => "<style>
.notice2 {
    background: #ADCBE7;
    border-top: 1px solid #0F5C8E;
    border-left: 1px solid #0F5C8E;
    border-right: 1px solid #0F5C8E;
    border-bottom: 1px solid #0F5C8E;
    text-align: center;
    margin: 10px auto;
    padding: 5px 20px;
    border-radius: 6px;
    color: #404040;
}
</style><div id=\"notice2\"><p class=\"notice2\">{\$mybb->settings[\'simplenewsbars_input_3\']}</p></div>",
        "sid" => -1,
        "dateline" => TIME_NOW
    );
    
    // Insert Array Query
        
    $db->insert_query("templates", $insertarray);
    
    // Insert Array
    
    $insertarray = array(
        "title" => "simplenewsbars_4",
        "template" => "<style>
.alert {
    background: #FFF6BF;
    border-top: 1px solid #FFD324;
    border-left: 1px solid #FFD324;
    border-right: 1px solid #FFD324;
    border-bottom: 1px solid #FFD324;
    text-align: center;
    margin: 10px auto;
    padding: 5px 20px;
    border-radius: 6px;
    color: #404040;
}
</style><div id=\"alert\"><p class=\"alert\">{\$mybb->settings[\'simplenewsbars_input_4\']}</p></div>",
        "sid" => -1,
        "dateline" => TIME_NOW
    );
    
    // Insert Array Query
        
    $db->insert_query("templates", $insertarray);
    
    // Insert Array
        
    $insertarray = array(
        "title" => "simplenewsbars_5",
        "template" => "<style>
.notice1 {
    background: #D6ECA6;
    border-top: 1px solid #8DC93E;
    border-left: 1px solid #8DC93E;
    border-right: 1px solid #8DC93E;
    border-bottom: 1px solid #8DC93E;
    text-align: center;
    margin: 10px auto;
    padding: 5px 20px;
    border-radius: 6px;
    color: #404040;
}
</style><div id=\"notice1\"><p class=\"notice1\">{\$mybb->settings[\'simplenewsbars_input_5\']}</p></div>",
        "sid" => -1,
        "dateline" => TIME_NOW
    );
    
    // Insert Array Query
        
    $db->insert_query("templates", $insertarray);
    
    // Insert Array 
        
    $insertarray = array(
        "title" => "simplenewsbars_6",
        "template" => "<style>
.notice2 {
    background: #ADCBE7;
    border-top: 1px solid #0F5C8E;
    border-left: 1px solid #0F5C8E;
    border-right: 1px solid #0F5C8E;
    border-bottom: 1px solid #0F5C8E;
    text-align: center;
    margin: 10px auto;
    padding: 5px 20px;
    border-radius: 6px;
    color: #404040;
}
</style><div id=\"notice2\"><p class=\"notice2\">{\$mybb->settings[\'simplenewsbars_input_6\']}</p></div>",
        "sid" => -1,
        "dateline" => TIME_NOW
    );
    
    // Insert Array Query

    $db->insert_query("templates", $insertarray);
    
    include MYBB_ROOT . "/inc/adminfunctions_templates.php";
    
    // Activate on index
    
    find_replace_templatesets("index", "#" . preg_quote("{\$header}") . "#i", "{\$header}\r\n
        {\$simplenewsbars_1}
        {\$simplenewsbars_2}
        {\$simplenewsbars_3}");
    
    // Activate on portal
    
    find_replace_templatesets("portal", "#" . preg_quote("{\$header}") . "#i", "{\$header}\r\n
        {\$simplenewsbars_4}
        {\$simplenewsbars_5}
        {\$simplenewsbars_6}");
}

// Deactivate

function simplenewsbars_deactivate()
{
    global $db;
    
    // Enable Index / Portal Query delete

    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_enable_index')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_enable_portal')");

    // Index Query delete
    
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_enable_input_1')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_enable_input_2')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_enable_input_3')");
    
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_input_1')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_input_2')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_input_3')");

    // Portal Query delete 

    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_enable_input_4')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_enable_input_5')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_enable_input_6')");
    
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_input_4')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_input_5')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('simplenewsbars_input_6')");
    
    $db->query("DELETE FROM " . TABLE_PREFIX . "settinggroups WHERE name='simplenewsbars'");
    
    // Index Query delete

    $db->delete_query("templates", "title = 'simplenewsbars_1'");
    $db->delete_query("templates", "title = 'simplenewsbars_2'");
    $db->delete_query("templates", "title = 'simplenewsbars_3'");

    // Portal Query delete

    $db->delete_query("templates", "title = 'simplenewsbars_4'");
    $db->delete_query("templates", "title = 'simplenewsbars_5'");
    $db->delete_query("templates", "title = 'simplenewsbars_6'");

    // Rebuild Settings

    rebuild_settings();

    // Remove Index / Portal template includes
    
    include MYBB_ROOT . "/inc/adminfunctions_templates.php";
    
    // Deactivate on index
    
    find_replace_templatesets("index", "#" . preg_quote("\r\n
        {\$simplenewsbars_1}
        {\$simplenewsbars_2}
        {\$simplenewsbars_3}") . "#i", "", 0);
    
    // Deactivate on portal
    
    find_replace_templatesets("portal", "#" . preg_quote("\r\n
        {\$simplenewsbars_4}
        {\$simplenewsbars_5}
        {\$simplenewsbars_6}") . "#i", "", 0);
}

// Index Start

function simplenewsbars_index_start()
{
    global $db, $mybb, $templates, $simplenewsbars_1, $simplenewsbars_2, $simplenewsbars_3;
    
    if ($mybb->settings['simplenewsbars_enable_index'] == 1) {
        
        // Enabled Input

        if ($mybb->settings['simplenewsbars_enable_input_1'] == 1) { 
            eval("\$simplenewsbars_1 = \"" . $templates->get("simplenewsbars_1") . "\";");
        }
        
        // Enabled Input

        if ($mybb->settings['simplenewsbars_enable_input_2'] == 1) {
            eval("\$simplenewsbars_2 = \"" . $templates->get("simplenewsbars_2") . "\";");
        }
        
        // Enabled Input

        if ($mybb->settings['simplenewsbars_enable_input_3'] == 1) {
            eval("\$simplenewsbars_3 = \"" . $templates->get("simplenewsbars_3") . "\";");
        }
    }
}

// Portal Start

function simplenewsbars_portal_start()
{
    global $db, $mybb, $templates, $simplenewsbars_4, $simplenewsbars_5, $simplenewsbars_6;
    
    if ($mybb->settings['simplenewsbars_enable_portal'] == 1) {
        
        // Enabled Input

        if ($mybb->settings['simplenewsbars_enable_input_4'] == 1) {
            eval("\$simplenewsbars_4 = \"" . $templates->get("simplenewsbars_4") . "\";");
        }

        // Enabled Input

        if ($mybb->settings['simplenewsbars_enable_input_5'] == 1) {
            eval("\$simplenewsbars_5 = \"" . $templates->get("simplenewsbars_5") . "\";");
        }

        // Enabled Input

        if ($mybb->settings['simplenewsbars_enable_input_6'] == 1) {
            eval("\$simplenewsbars_6 = \"" . $templates->get("simplenewsbars_6") . "\";");
        }
    }
}

?>   