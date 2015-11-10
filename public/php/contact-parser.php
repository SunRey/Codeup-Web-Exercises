<?php

function parseContacts($filename)
{
    $contacts = array();

    $resource = fopen($filename, 'r');
    $contents = fread($resource, filesize($filename));
    fclose($resource);

    $info_array = explode("\n", $contents);


    return $contacts;
}

print_r(parseContacts('contacts.txt'));
