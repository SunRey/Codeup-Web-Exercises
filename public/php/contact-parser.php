<?php

function parseContacts($filename)
{
    $contacts = array();

    $resource = fopen($filename, 'r');
    $contents = fread($resource, filesize($filename));
    fclose($resource);

    $info_array = explode("\n", trim($contents));


    return $info_array;
}

print_r(parseContacts('contacts.txt'));
