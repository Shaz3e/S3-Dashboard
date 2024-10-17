<?php

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

function DiligentCreators($name)
{
    // Check if the 'settings' table exists
    if (Schema::hasTable('settings')) {
        // Check if the 'name' exists in the 'settings' table and return its value
        return Setting::where('name', $name)->value('value');
    }

    // Return an empty string if the table or the setting doesn't exist
    return '';
}

function getAllTimeZonesSelectBox($selectedValue)
{
    echo '<select name="app_timezone" class="form-control select2" id="app_timezone" required="required">';
    echo '<option value="">-- Select Time Zone --</option>';
    $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
    foreach ($tzlist as $value) {
        $selected = ($value === $selectedValue) ? 'selected="selected"' : '';
        echo '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
    }
    echo '</select>';
}

function calcTime($startTime, $endTime)
{
    $start_time = Carbon::parse($startTime);
    $complete_time = Carbon::parse($endTime);

    $time_diff = $complete_time->diff($start_time);

    if ($time_diff->days > 0) {
        $days = $time_diff->format('%d');
        $hours = $time_diff->format('%h');
        $minutes = $time_diff->format('%i');
        return "$days days $hours hrs $minutes minutes";
    } elseif ($time_diff->hours > 0) {
        $hours = $time_diff->format('%h');
        $minutes = $time_diff->format('%i');
        return "$hours hrs $minutes minutes";
    } else {
        $minutes = $time_diff->format('%i');
        return "$minutes minutes";
    }
}

function currencyFormat($value)
{
    return number_format($value, 2);
}

/**
 * Convert HTML to Text
 */
function shortTextWithOutHtml($text, $limit = 255)
{
    $plainText = strip_tags($text);
    $limitedText = (strlen($plainText) > $limit) ? substr($plainText, 0, $limit) . "..." : $plainText;
    return $limitedText;
}
