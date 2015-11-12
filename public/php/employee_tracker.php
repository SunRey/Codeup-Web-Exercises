<?php

function parse_sales ($filename) 
{
    $sales_report_format = array();

    $handle = fopen($filename, 'r');
    $report_content = fread($handle, filesize($filename));
    fclose($handle);

    $report_array = explode("\n", trim($report_content));
    $report_array = trim_the_kruft($report_array);

    foreach ($report_array as $string) 
    {
        $employee_info = explode(', ', $string);
        $sales_report_format[] = [
            'employeeNum' => $employee_info[0],
            'employeeFullName' => $employee_info[1] . ' ' . $employee_info[2],
            'salesUnits' => $employee_info[3]
        ];
    }
    return $sales_report_format;
}

function trim_the_kruft ($array_report) 
{
    for($i = 0; $i <= 5; $i++) 
    {
        array_shift($array_report);
    }
    return $array_report;
}

function sales_unit_sort ($a, $b) 
{
    return strnatcmp($b['salesUnits'], $a['salesUnits']);
}

$sales_report = (parse_sales('report.txt'));
usort($sales_report, 'sales_unit_sort');

echo '~~~~~~~~~~^~~~~~~~~~~^~~~~~~~~~~^~~~~~~~~~~^~~~~~~~~~~^~~~~~~~~~~~' . PHP_EOL;
echo "\tUnits\t\t|\tFull Name\t\t|\tEmployee Number" . PHP_EOL;
echo '------------------------------------------------------------------' . PHP_EOL;
for ($i = 0; $i < count($sales_report); $i++)
{
    echo " \t{$sales_report[$i]['salesUnits']}\t\t|";
    echo "\t{$sales_report[$i]['employeeFullName']}\t\t|";
    echo "\t{$sales_report[$i]['employeeNum']}\n";
}
// Output should include:
// - total number of employees
// - total number of units sold
// - avg units sold per employee
// - Then output should share employee production, ordered from highest to lowest # of u$
// * Units   |     Full Name       |   Employee Number
// * 5             Bob Boberson        2
