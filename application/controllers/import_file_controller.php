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
                            $emp_t_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                            $emp_grade = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $emp_position = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                            $emp_division = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                            $emp_section = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                            $emp_hired_date = date('d/m/Y', PHPExcel_Shared_Date::ExcelToPHP($worksheet->getCellByColumnAndRow(7, $row)->getValue()));
                            $emp_email = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                            $superior_emp_id1 = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                            $superior_name1 = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                            $superior_grade1 = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                            $superior_email1 = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                            $superior_emp_id2 = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                            $superior_name2 = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                            $superior_grade2 = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                            $superior_email2 = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                            $foreman = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                            $foreman_email = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                            $factory_Manager_GM = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                            $factory_Manager_GM_email = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                            $status_excel = $worksheet->getCellByColumnAndRow(21, $row)->getValue();

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
                                't_name_emp' => trim($emp_t_name),
                                'emp_grade' => trim($emp_grade),
                                'emp_position' => trim($emp_position),
                                'emp_division' => trim($emp_division),
                                'emp_section' => trim($emp_section),
                                'emp_hired_date' => trim($emp_hired_date),
                                'emp_email' => trim($emp_email),
                                'superior_emp_id1' => trim($superior_emp_id1),
                                'superior_name1' => trim($superior_name1),
                                'superior_grade1' => trim($superior_grade1),
                                'superior_email1' => trim($superior_email1),
                                'superior_emp_id2' => trim($superior_emp_id2),
                                'superior_name2' => trim($superior_name2),
                                'superior_grade2' => trim($superior_grade2),
                                'superior_email2' => trim($superior_email2),
                                'foreman' => trim($foreman),
                                'foreman_email' => trim($foreman_email),
                                'factory_Manager_GM' => trim($factory_Manager_GM),
                                'factory_Manager_GM_email' => trim($factory_Manager_GM_email),
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
                    for ($row = 3; $row <= $highestRow; $row++) {
                        // ตรวจสอบว่าเซลล์มีข้อมูลอยู่จริงก่อนอ่านค่า
                        if (!empty($worksheet->getCellByColumnAndRow(0, $row)->getValue())) {
                            $emp_id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                            $business_leave1 = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $sick_leave1 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                            $absenteeism1 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $late1 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                            $business_leave2 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                            $sick_leave2 = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                            $absenteeism2 = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                            $late2 = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                            $verbal_warning = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                            $letter_warning = $worksheet->getCellByColumnAndRow(10, $row)->getValue();

                            $data[] = array(
                                'emp_id' => trim($emp_id),
                                'business_leave1' => trim($business_leave1),
                                'sick_leave1' => trim($sick_leave1),
                                'absenteeism1' => trim($absenteeism1),
                                'late1' => trim($late1),
                                'business_leave2' => trim($business_leave2),
                                'sick_leave2' => trim($sick_leave2),
                                'absenteeism2' => trim($absenteeism2),
                                'late2' => trim($late2),
                                'verbal_warning' => trim($verbal_warning),
                                'letter_warning' => trim($letter_warning),
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
