<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Import_file_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelHR', 'hr');
        $this->load->library('excel');
    }

    public function index()
    {
        $this->load->view('ImportFileExcelEMP');
    }

    public function import_emp()
    {
        if (isset($_FILES["file"]["name"])) {
            $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            // ตรวจสอบไฟล์เป็นไฟล์ Excel
            if ($file_extension == 'xlsx' || $file_extension == 'xls') {
                $path = $_FILES["file"]["tmp_name"];
                $object = PHPExcel_IOFactory::load($path);
                foreach ($object->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    // เริ่มต้นลูปที่แถวที่ 2 เพื่อข้ามหัวข้อหรือชื่อคอลัมน์
                    for ($row = 2; $row <= $highestRow; $row++) {
                        // ตรวจสอบว่าเซลล์มีข้อมูลอยู่จริงก่อนอ่านค่า
                        if (!empty($worksheet->getCellByColumnAndRow(0, $row)->getValue())) {
                            $emp_id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                            $emp_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $emp_grade = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                            $emp_division = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $emp_section = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                            $emp_hired_date = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                            $emp_email = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                            $superior_name = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                            $superior_grade = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                            $superior_email = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                            $status_excel = $worksheet->getCellByColumnAndRow(10, $row)->getValue();

                            if ($status_excel == "Active") {
                                $status = '1';
                            } else if ($status_excel == "Inactive") {
                                $status = '0';
                            } else {
                                $status = '0';
                            }
                            $data[] = array(
                                'emp_id' => trim($emp_id),
                                'emp_name' => trim($emp_name),
                                'emp_grade' => trim($emp_grade),
                                'emp_division' => trim($emp_division),
                                'emp_section' => trim($emp_section),
                                'emp_hired_date' => trim($emp_hired_date),
                                'emp_email' => trim($emp_email),
                                'superior_name' => trim($superior_name),
                                'superior_grade' => trim($superior_grade),
                                'superior_email' => trim($superior_email),
                                'status' => $status,
                                'updated_date' => date('Y-m-d H:i:s')
                            );
                        }
                    }
                }
                // เรียกใช้เมธอด model_hr_insert() เพื่อเพิ่มข้อมูล
                $this->hr->model_hr_insert_emp($data);
                echo 'Data Imported successfully';
            } else {
                echo 'Invalid file type. Please upload an Excel file.';
            }
        }
    }

    public function index_2()
    {
        $this->load->view('ImportFileExcelLeaveRecord');
    }

    public function import_leave_record()
    {
        if (isset($_FILES["file_leave"]["name"])) {
            $file_extension = pathinfo($_FILES["file_leave"]["name"], PATHINFO_EXTENSION);
            if ($file_extension == 'xlsx' || $file_extension == 'xls') {
                $path = $_FILES["file_leave"]["tmp_name"];
                $object = PHPExcel_IOFactory::load($path);
                foreach ($object->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    // เริ่มต้นลูปที่แถวที่ 2 เพื่อข้ามหัวข้อหรือชื่อคอลัมน์
                    for ($row = 2; $row <= $highestRow; $row++) {
                        // ตรวจสอบว่าเซลล์มีข้อมูลอยู่จริงก่อนอ่านค่า
                        if (!empty($worksheet->getCellByColumnAndRow(0, $row)->getValue())) {
                            $emp_id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                            $year = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $business_leave = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                            $sick_leave = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $absenteeism = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                            $late = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                            $data[] = array(
                                'emp_id' => trim($emp_id),
                                'year' => trim($year),
                                'business_leave' => trim($business_leave),
                                'sick_leave' => trim($sick_leave),
                                'absenteeism' => trim($absenteeism),
                                'late' => trim($late),
                                'updated_date' => date('Y-m-d H:i:s')
                            );
                        }
                    }
                }
                // เรียกใช้เมธอด model_hr_insert() เพื่อเพิ่มข้อมูล
                $this->hr->model_hr_insert_leave($data);
                echo 'Data Imported successfully';
            } else {
                echo 'Invalid file type. Please upload an Excel file.';
            }
        }
    }
}
