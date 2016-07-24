<?php 


    require('../php-excel-reader/excel_reader2.php');

    require('../SpreadsheetReader.php');
	$file_path = "../".$_GET['file_path'];
    $Reader = new SpreadsheetReader($file_path);
    print_r($Reader);
    foreach ($Reader as $Row)
    {	
    	print_r($Row);
    	// $final_output[$Row[0]]['number'][$Row[2]][] = $Row[1];
    	// //$final_output["class"][number][9842972047][] = name;
    }

    