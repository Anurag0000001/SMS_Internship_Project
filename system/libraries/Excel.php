<?php
class Excel
{
    public function importTeachers($file_path)
    {
        // Load the PHPExcel library
        require_once APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $teachers = array();

        // Read the Excel file
        $objPHPExcel = PHPExcel_IOFactory::load($file_path);
        $worksheet = $objPHPExcel->getActiveSheet();

        // Iterate through rows
        foreach ($worksheet->getRowIterator() as $row) {
            $rowData = array();
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            // Iterate through cells
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }

            // Add the teacher data to the teachers array
            $teachers[] = array(
                'first_name' => $rowData[0],
                'last_name' => $rowData[1],
                'email' => $rowData[2],
                'gender' => $rowData[3],
                'address' => $rowData[4],
                'phone' => $rowData[5]
            );
        }

        return $teachers;
    }
}
