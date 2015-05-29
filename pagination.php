<?php

$list = array( "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua & Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belau (Palau)", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia Herzegovina");

$minimumPerPage = 6;

$page_list = paginate($list, $minimumPerPage);

function paginate($list, $minimumPerPage){

    $size = count($list);
    $pages = floor( $size / $minimumPerPage );
    $perPage = ceil( $size / $pages );

    $offset = 0;
    $result = [];

    for ($i = 0; $i < $pages; $i++) { 
	
		$result[$i] = ["offset" => $offset, "limit" => $perPage];
	
		if( ($perPage-1)*($pages-$i-1) == ($size-$offset-$perPage) ){

			$perPage -= 1;
			$offset++;	

		}

		$offset += $perPage;
	}

    return $result;
}
