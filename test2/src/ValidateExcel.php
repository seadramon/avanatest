<?php

require 'vendor/autoload.php';

class ValidateExcel
{
	private $excel;

	public function __construct(string $excel)
	{
		$this->excel = $excel;
	}

	public function getData()
	{
		$inputFileName = 'src/excel/' . $this->excel;

		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		$spreadsheet = $reader->load($inputFileName);

		$data = $spreadsheet->getActiveSheet()->toArray();

		if (!empty($data)) {
			$cek = self::validate($data);

			print_r($cek);die();
		}

		return $data;
	}

	private static function validate($data)
	{
		$header = $data[0];
		$respose = "";
		unset($data[0]);

		foreach ($data as $key => $value) {
			$star = strpos($header[$key], "*");
			$hast = strpos($header[$key], "#");

			if ($star === true) {
				if (empty($value)) {
					$respose .= "Missing value in " . $header[$key];
				}
			}

			if ($hast === true) {
				$cekspace = strpos($value, " ");
				if (empty($value)) {
					$respose .=  $header[$key] . "SHould not contain any space";
				}
			}
		}

		return $respose;
	}
}