<div class="container-fluid mt-3">
    <table class="table table-form border-0">
        <tr>
            <th class="border-0 h4">
                <img src="<?php echo base_url('/img/images.png'); ?>" width="50px" class="mx-2">THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.
            </th>
        </tr>
        <tr>
            <th class="border-0">
                <u>[YYYY] BONUS & ANNUAL Assessment for Foreman & below</u>
            </th>
        </tr>
    </table>
</div>
<div class="container-fluid mt-3">
    <table class="table table-form border-0">
        <?php foreach ($emp_data as $emp_datas) ?>
        <?php foreach ($emp_leave_data as $emp_leave_datas) ?>
        <tr>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0 text-end mit-v" style="width: 15em;">Date</td>
            <td class="border-0" style="width: 20em;">
                <input type="text" class="form-control" id="date_submit" name="date_submit" placeholder="DD/MM/YYYY" value="<?php echo date('d-M-Y') ?>" disabled>
            </td>
        </tr>
        <tr>
            <td class="border-0 mit-v text-end">Employee name</td>
            <td class="border-0">
                <input type="text" class="form-control" id="emp_name" name="emp_name" value="<?php echo $emp_datas->emp_name; ?>" disabled>
            </td>
            <td class="border-0 mit-v text-end">Employee ID</td>
            <td class="border-0">
                <input type="text" id="emp_id" name="emp_id" class="form-control" value="<?php echo $emp_datas->emp_id; ?>" disabled>
            </td>
            <td class="border-0 mit-v text-end">Position</td>
            <td class="border-0">
                <input type="text" name="position" id="position" class="form-control" value="<?php echo $emp_datas->emp_position; ?>" disabled>
            </td>
        </tr>
        <tr>
            <td class="border-0 mit-v text-end">Section</td>
            <td class="border-0">
                <input type="text" id="section" name="section" class="form-control" value="<?php echo $emp_datas->emp_section; ?>" disabled>
            </td>
            <td class="border-0 mit-v text-end">Employment date</td>
            <td class="border-0">
                <input type="text" name="hired_date" id="hired_date" class="form-control" value="<?php
                                                                                                    $date_hired_format = DateTime::createFromFormat('d/m/Y', $emp_datas->emp_hired_date)->format('d-M-Y');
                                                                                                    echo $date_hired_format
                                                                                                    ?>" disabled>
            </td>
            <td class="border-0 mit-v text-end">Years of service</td>
            <td class="border-0">
                <?php
                $emp_hired_date_format = DateTime::createFromFormat('d/m/Y', $emp_datas->emp_hired_date)->format('Y-m-d');
                $emp_hired_date = new DateTime($emp_hired_date_format);
                $current_date = new DateTime();
                $diff = $current_date->diff($emp_hired_date);
                $year_text = ($diff->y > 0) ? $diff->y . " Year" : "";
                $month_text = ($diff->m > 0) ? $diff->m . " Month" : "";
                $day_text = ($diff->d > 0) ? $diff->d . " Day" : "";
                if ($diff->y >= 1 && $diff->m >= 0) {
                    $date_emp_year_of_service = $year_text . " " . $month_text . " " . $day_text;
                    echo "<input type=\"text\" id=\"emp_year_of_service\" name=\"emp_year_of_service\" class=\"form-control\" value=\"$date_emp_year_of_service\" disabled>";
                } else {
                    $date_emp_year_of_service = $month_text . " " . $day_text;
                    echo "<input type=\"text\" id=\"emp_year_of_service\" name=\"emp_year_of_service\" class=\"form-control\" value=\"$date_emp_year_of_service\" disabled>";
                } ?>
            </td>
        </tr>
        <tr>
            <?php if ($emp_datas->foreman != "") { ?>
                <td class="border-0 mit-v text-end">Foreman</td>
                <td class="border-0">
                    <input type="text" name="" id="" class="form-control" value="<?php echo $emp_datas->foreman; ?>" disabled>
                </td>
            <?php } ?>
            <?php if ($emp_datas->superior_name1 != "") { ?>
                <td class="border-0 mit-v text-end">Supervisor Name 1</td>
                <td class="border-0">
                    <input type="text" name="" id="" class="form-control" value="<?php echo $emp_datas->superior_name1; ?>" disabled>
                </td>
            <?php } ?>
            <?php if ($emp_datas->superior_name2 != "") { ?>
                <td class="border-0 mit-v text-end">Supervisor Name 2</td>
                <td class="border-0">
                    <input type="text" name="" id="" class="form-control" value="<?php echo $emp_datas->superior_name2; ?>" disabled>
                </td>
            <?php } ?>
        </tr>
        <tr>
            <?php if ($emp_datas->factory_Manager_GM != "") { ?>
                <td class="border-0 mit-v text-end">Factory Manager / GM</td>
                <td class="border-0">
                    <input type="text" name="" id="" class="form-control" value="<?php echo $emp_datas->factory_Manager_GM; ?>" disabled>
                </td>
            <?php } ?>
        </tr>
    </table>
</div>