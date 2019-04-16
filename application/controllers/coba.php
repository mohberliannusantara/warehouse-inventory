<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {

	public function index()
	{
		$a = 150000;
		$b = str_split($a);

		for ($i = count($b); $i > 0 ; $i--) {
			if ($i & 3 == 0) {
				
			}
		}
		$number = 1234.56;

// english notation (default)
		$english_format_number = number_format($a);
		echo $english_format_number;
// 1,235
		//echo count($b);
	}

}

/* End of file coba.php */
/* Location: ./application/controllers/coba.php */