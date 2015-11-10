<?php

function parseContacts($filename)
{
    $contacts = array();
    function format_string ($string) {
        $string = substr($string, 0, -7) . '-' . substr($string, 3, -4) . '-' . substr($string, -4);
        return $string;
    }
    
    $resource = fopen($filename, 'r');
    $stuff = fread($resource, filesize($filename));
    fclose($resource);

    $info_array = explode("\n", trim($stuff));

    foreach ($info_array as $i => $info) {
        $name = explode('|', $info);
        $number = format_string($name[1]);
        $contacts[$i] = ['name' => $name[0], 'number' => $number];
    }

    return $contacts;
}

print_r(parseContacts('contacts.txt'));
