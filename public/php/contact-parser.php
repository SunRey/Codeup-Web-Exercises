<?php

function parseContacts($filename)
{
    $contacts = array();

    $resource = fopen($filename, 'r');
    $stuff = fread($resource, filesize($filename));
    fclose($resource);

    $info_array = explode("\n", trim($stuff));

    foreach ($info_array as $i => $info) {
        $name = explode('|', $info);
        var_dump($name);
        $contacts[$i] = ['name' => $name[0], 'number' => $name[1]];

    }

    return $contacts;
}

print_r(parseContacts('contacts.txt'));
