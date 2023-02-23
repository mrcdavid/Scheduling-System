<?php
require 'config/config.php';
require GLOBAL_FUNC;
require CONNECT_PATH;
require CL_SESSION_PATH;
include ISLOGIN;

$room = ROOM_TYPE;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include DOMAIN_PATH . "/app/global/meta_data.php";
    include DOMAIN_PATH . "/app/global/include_top.php";
    ?>

    <style>
        /* Style the form - display items horizontally */
        .form-inline {
            display: flex;
            flex-flow: row wrap;
            align-items: center;
        }

        /* Add some margins for each label */
        .form-inline label {
            margin: 5px 10px 5px 0;
        }

        /* Style the input fields */
        .form-inline input {
            vertical-align: middle;
            margin: 5px 10px 5px 0;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        /* Style the submit button */
        .form-inline button {
            padding: 10px 20px;
            background-color: dodgerblue;
            border: 1px solid #ddd;
            color: white;
        }

        .form-inline button:hover {
            background-color: royalblue;
        }

        /* Add responsiveness - display the form controls vertically instead of horizontally on screens that are less than 800px wide */
        @media (max-width: 800px) {
            .form-inline input {
                margin: 10px 0;
            }

            .form-inline {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"light","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <div class="page"></div>
    <div id="loading"></div>
    <!-- Begin page -->

    <div class="wrapper">
        <!-- SIDE VAR -->
        <?php
        include DOMAIN_PATH . "/app/global/side_var.php";
        ?>
        <!-- END SIDE VAR -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <?php
                include DOMAIN_PATH . "/app/global/top_var.php";
                ?>

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Generate Schedule</h4>
                            </div>
                        </div>
                    </div>


                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card w-100">
                                <div class="card-header">
                                    <b>Title</b>
                                </div>
                                <div class="card-body">
                                    <input type="text" class="form-control mb-2" name="title" id="title" placeholder="input title">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-6">
                            <div class="card w-100">
                                <div class="card-header">
                                    <b>Teacher Load</b>
                                </div>
                                <div class="card-body">
                                    <input type="file" class="form-control" id="input_teaching_load_csv"><br>
                                    <div><button class="btn btn-primary m-1" type="button" id="add_teaching_load">Add new</button> <button class="btn btn-success" id="teaching_load_csv_template">Download CSV Template</button></div><br>
                                    <div id="teaching_load"></div>
                                    <div id="teach_load_template"></div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-6">
                            <div class="card w-100">
                                <div class="card-header">
                                    <b>Teacher Sched</b>
                                </div>
                                <div class="card-body">
                                    <input type="file" class="form-control" id="input_teaching_sched_csv"><br>
                                    <div><button class="btn btn-primary m-1" type="button" id="add_teacher_sched">Add new</button><button class="btn btn-success" id="teacher_sched_csv_template">Download CSV Template</button></div><br>
                                    <div id="teaching_sched"></div>
                                    <div id="teaching_sched_template"></div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-6">
                            <div class="card w-100">
                                <div class="card-header">
                                    <b>Room</b>
                                </div>
                                <div class="card-body">
                                    <input type="file" class="form-control" id="input_room_csv"><br>
                                    <div><button class="btn btn-primary m-1" type="button" id="add_room">Add new</button><button class="btn btn-success" id="room_csv_template">Download CSV Template</button></div><br>
                                    <div id="room"></div>
                                    <div id="room_template"></div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-6">
                            <div class="card w-100">
                                <div class="card-header">
                                    <b>Subject</b>
                                </div>
                                <div class="card-body">
                                    <input type="file" class="form-control" id="input_subject_csv"><br>
                                    <div><button class="btn btn-primary m-1" type="button" id="add_subject">Add new</button><button class="btn btn-success" id="subject_csv_template">Download CSV Template</button></div><br>
                                    <div id="subject"></div>
                                    <div id="subject_template"></div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-6 ">
                            <button id='save' class='col-2 btn btn-primary float-end' title='Save'>Save</button>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- container -->
        </div>
        <!-- content -->

        <!-- Footer Start -->
        <?php include DOMAIN_PATH . "/call_func/footer.php"; ?>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <?php
    include DOMAIN_PATH . "/app/global/include_buttom.php";
    include DOMAIN_PATH . "/app/set_sched.php";
    ?>

</body>
<script>
    function removeDuplicates(data, count) {
        // Display the list of array objects
        // console.log(data);

        // Declare a new array
        let newArray = [];

        // Declare an empty object
        let uniqueObject = {};

        // Loop for the array elements
        for (let i in data) {

            // Extract the title
            if (count == 2) {
                objTitle = data[i]['faculty_id'] + data[i]['day'] + data[i]['from_time'] + data[i]['to_time'];
                objId = encodeUnicode(objTitle);
            }
            if (count == 1) {
                objTitle = data[i]['room'] + data[i]['type'] + data[i]['capacity'];
                objId = encodeUnicode(objTitle);
            }
            if (count == 3) { // + data[i]['hr_wk'] + data[i]['day_wk'] + data[i]['room']
                objTitle = data[i]['faculty_id'] + data[i]['subject'] + data[i]['section'] + data[i]['no_of_students'];
                objId = encodeUnicode(objTitle);
            }
            if (count == 4) {
                objTitle = data[i]['subject'].toUpperCase() + data[i]['room'] + data[i]['unit'] + data[i]['hr_wk'] + data[i]['day_wk'] + data[i]['status'];
                objId = encodeUnicode(objTitle);
            }

            // Use the title as the index
            uniqueObject[objId] = data[i];
        }

        // Loop to push unique object into array
        for (i in uniqueObject) {
            newArray.push(uniqueObject[i]);
        }

        // Display the unique objects
        console.log(newArray);
        return newArray;
    }

    $("#add_teacher_sched").on("click", function(e) {
        table_el_teach_sched.addRow({
                faculty_id: "",
                name: "",
                day: "",
                from_time: "",
                to_time: ""
            }, true)
            .then(function(row) {

            });
    });

    function military_time(from_time) {
        const military_time = /^([01]?[0-9]|2[0-3]):([0-5][0-9])$/


        if (!military_time.test(from_time)) {
            return false;
        }
        return true;
    }

    function upload(file, table_el) {
        if (file.type.match(/text\/csv/) || file.type.match(/vnd\.ms-excel/)) {
            oFReader = new FileReader();
            oFReader.onloadend = function() {

                var json = CSVJSON.csv2json(this.result);
                // console.log(json);
                try {
                    table_el.setData(json);
                } catch {
                    console.log('ERROR UPLOADING CSV');
                }
            };
            oFReader.readAsText(file);
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Something went wrong',
                text: 'This file does not seem to be a CSV.',
                timer: 5000,
            })
            return;
        }
    }

    var table_el_room = new Tabulator("#room", {
        layout: "fitColumns",
        movableColumns: true,
        height: "500px",
        placeholder: "No Data Found",
        columns: [ //Define Table Columns
            {
                title: "Room",
                field: "room",
                sorter: "string",
                width: "30%",
                headerFilter: "input",
                editor: true,
            },
            {
                title: "Type",
                field: "type",
                sorter: "string",
                width: "30%",
                headerFilter: "input",
                editor: "select",
                editorParams: {
                    values: {
                        "LECTURE": "LECTURE",
                        "COMLAB": "COMLAB",
                        "BIOLAB": "BIOLAB",
                        "PHYSICSLAB": "PHYSICSLAB",
                        "CHEMLAB": "CHEMLAB",
                        "SPEECHLAB": "SPEECHLAB",
                        "SCIENCELAB": "SCIENCELAB"

                    }
                }
            },
            {
                title: "Capacity",
                field: "capacity",
                width: "30%",
                headerFilter: "input",
                editor: true,
            },
            {
                formatter: "buttonCross",
                width: "9%",
                align: "center",
                cellClick: function(e, cell) {
                    cell.getRow().delete();
                }
            }


        ],


    });


    $("#input_room_csv").change(function(e) {
        var fileName = e.target.files[0].name;
        upload(e.target.files[0], table_el_room);
    });

    $("#add_room").on("click", function(e) {
        table_el_room.addRow({
                room: "",
                type: "",
                capacity: "",
            }, true)
            .then(function(row) {});
    });

    var room_template = new Tabulator("#room_template", {

columns: [ //Define Table Columns
    {
                title: "room",
               
            },
            {
                title: "type",
              
            },
            {
                title: "capacity",
              
            },


],

});
$('#room_template').hide();

document.getElementById("room_csv_template").addEventListener("click", function() {
    room_template.download("csv", "room_template.csv");
});

    function convert_military(input) {
        var val = moment(input, 'h:mm').format('HH:mm');

        if ("Invalid date" == val) {
            val = "";
        }
        return val;
    }

    var customMutator = function(value, data, type, params, component) {
        //value - original value of the cell
        //data - the data for the row
        //type - the type of mutation occurring  (data|edit)
        //params - the mutatorParams object from the column definition
        //component - when the "type" argument is "edit", this contains the cell component for the edited cell, otherwise it is the column component for the column

        if (value === undefined) {
            value = "";
        }
        var field = component.getField();
        if (field == "from_time" || field == "to_time") {
            value = convert_military(value);
        }
        return value;
    }

    var table_el_teach_sched = new Tabulator("#teaching_sched", {

        layout: "fitColumns",
        movableColumns: true,
        height: "500px",
        placeholder: "No Data Found",
        columns: [ //Define Table Columns
            {
                title: "Faculty ID",
                field: "faculty_id",
                sorter: "string",
                width: "16%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator

            },
            {
                title: "Name",
                field: "name",
                sorter: "string",
                width: "16%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },
            {
                title: "Day",
                field: "day",
                width: "16%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },
            {
                title: "Time From",
                field: "from_time",
                sorter: "string",
                width: "16%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },
            {
                title: "To Time",
                field: "to_time",
                sorter: "string",
                width: "16%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },
            {
                title: "Status",
                field: "status",
                sorter: "string",
                width: "16%",
                headerFilter: "input",
                editor: "select",
                editorParams: {
                    values: {
                        "FULL TIME": "FULL TIME",
                        "PART TIME": "PART TIME"
                    }
                },
                mutator: customMutator
            },
            {
                formatter: "buttonCross",
                width: "4%",
                align: "center",
                cellClick: function(e, cell) {
                    cell.getRow().delete();
                }
            },

        ],


    });

    $("#input_teaching_sched_csv").change(function(e) {
        var fileName = e.target.files[0].name;
        upload(e.target.files[0], table_el_teach_sched);
    });

    function encodeUnicode(str) {
        // First we use encodeURIComponent to get percent-encoded UTF-8,
        // then we convert the percent encodings into raw bytes which
        // can be fed into btoa.
        return btoa(
            encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function toSolidBytes(match, p1) {
                return String.fromCharCode('0x' + p1)
            })
        )
    }

    var teaching_sched_template = new Tabulator("#teaching_sched_template", {

        columns: [ //Define Table Columns
            {
                title: "faculty_id",

            },
            {
                title: "name",

            },
            {
                title: "day",

            },
            {
                title: "from_time",

            },
            {
                title: "to_time",

            },
            {
                title: "status",

            },


        ],

    });
    $('#teaching_sched_template').hide();

    document.getElementById("teacher_sched_csv_template").addEventListener("click", function() {
        teaching_sched_template.download("csv", "teaching_sched_template.csv");
    });

    var table_el_teach_load = new Tabulator("#teaching_load", {
        layout: "fitColumns",
        movableColumns: true,
        height: "500px",
        placeholder: "No Data Found",
        columns: [ //Define Table Columns
            {
                title: "Faculty ID",
                field: "faculty_id",
                sorter: "string",
                width: "19%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },
            {
                title: "Name",
                field: "name",
                sorter: "string",
                width: "19%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },
            {
                title: "Course Code",
                field: "subject",
                width: "19%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },
            {
                title: "Section",
                field: "section",
                sorter: "string",
                width: "19%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },
            {
                title: "# of student in section",
                field: "no_of_students",
                sorter: "string",
                width: "19%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },
            {
                formatter: "buttonCross",
                width: "4%",
                align: "center",
                cellClick: function(e, cell) {
                    cell.getRow().delete();
                }
            },


        ],

    });

    $("#input_teaching_load_csv").change(function(e) {
        var fileName = e.target.files[0].name;
        upload(e.target.files[0], table_el_teach_load);
    });

    $("#add_teaching_load").on("click", function(e) {
        table_el_teach_load.addRow({
                faculty_id: "",
                name: "",
                subject: "",
                section: "",
                no_of_students: "",
            }, true)
            .then(function(row) {

            });
    });

    var teach_load_template = new Tabulator("#teach_load_template", {

        columns: [ //Define Table Columns
            {
                title: "faculty_id",

            },
            {
                title: "name",

            },
            {
                title: "subject",

            },
            {
                title: "section",

            },
            {
                title: "no_of_students",

            }


        ],

    });
    $('#teach_load_template').hide();

    document.getElementById("teaching_load_csv_template").addEventListener("click", function() {
        teach_load_template.download("csv", "teaching_load_template.csv");
    });

    var table_el_subject = new Tabulator("#subject", {
        layout: "fitColumns",
        movableColumns: true,
        height: "500px",
        placeholder: "No Data Found",
        columns: [ //Define Table Columns
            {
                title: "Course Code",
                field: "subject",
                width: "15%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },
            {
                title: "Course Title",
                field: "course_title",
                sorter: "string",
                width: "20.5%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },
            {
                title: "Room Type",
                field: "room",
                sorter: "string",
                width: "15%",
                headerFilter: "input",
                editor: "select",
                editorParams: {
                    values: {
                        "LECTURE": "LECTURE",
                        "COMLAB": "COMLAB",
                        "BIOLAB": "BIOLAB",
                        "PHYSICSLAB": "PHYSICSLAB",
                        "CHEMLAB": "CHEMLAB",
                        "SPEECHLAB": "SPEECHLAB",
                        "SCIENCELAB": "SCIENCELAB",
                        "SCIENCELAB": "SCIENCELAB"

                    }
                },
                mutator: customMutator
            },
            {
                title: "Unit",
                field: "unit",
                sorter: "string",
                width: "15%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },
            {
                title: "Hour/Week",
                field: "hr_wk",
                sorter: "string",
                width: "15%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },
            {
                title: "Day/Week",
                field: "day_wk",
                sorter: "string",
                width: "15%",
                headerFilter: "input",
                editor: true,
                mutator: customMutator
            },


            {
                formatter: "buttonCross",
                width: "5%",
                align: "center",
                cellClick: function(e, cell) {
                    cell.getRow().delete();
                }
            },


        ],

    });

    $("#input_subject_csv").change(function(e) {
        var fileName = e.target.files[0].name;
        upload(e.target.files[0], table_el_subject);
    });

    $("#add_subject").on("click", function(e) {
        table_el_subject.addRow({
                subject: "",
                room: "",
                unit: "",
                hr_wk: "",
                day_wk: "",

            }, true)
            .then(function(row) {

            });
    });

    var subject_template = new Tabulator("#subject_template", {

columns: [ //Define Table Columns
    {
                title: "subject",
              
            },
            {
                title: "course_title",
               
            },
            {
                title: "room",
               
            },
            {
                title: "unit",
            },
            {
                title: "hr_wk",
              
            },
            {
                title: "day_wk",
               
            },


],

});
$('#subject_template').hide();

document.getElementById("subject_csv_template").addEventListener("click", function() {
    subject_template.download("csv", "subject_template.csv");
});


    var room = <?php echo json_encode($room); ?>;
    $(document).on("click", "#save", function(e) {
        e.preventDefault();

        var title = $('#title').val();
        if (title == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Something went wrong',
                text: 'Empty input title.',
                timer: 5000,
            })
            return;
        }


        var room_data = table_el_room.getData();
        room_data = removeDuplicates(room_data, 1);
        var data_sched = table_el_teach_sched.getData();
        data_sched.reverse();
        data_sched = removeDuplicates(data_sched, 2);
        var teach_load_data = table_el_teach_load.getData();
        teach_load_data = removeDuplicates(teach_load_data, 3);
        var subject_data = table_el_subject.getData();
        subject_data = removeDuplicates(subject_data, 4)



        var is_digit = /^\d+$/;

        if (teach_load_data.length == 0) {
            let timerInterval
            Swal.fire({
                icon: 'warning',
                title: 'Something went wrong',
                text: 'Teaching Load not found',
                timer: 5000,
            })
            return;
        }

        teach_load_data.forEach(function(item, index) {
            if (item['faculty_id'] == "" || item['subject'] == "" || item['section'] == "" || item['no_of_students'] == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Missing data in teaching load (' + item['faculty_id'] + ') Teacher Load',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }
            if (!is_digit.test(item['faculty_id'])) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Faculty id is not numeric in faculty_id (' + item['faculty_id'] + ') Teacher Load',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }
            if (!is_digit.test(item['no_of_students'])) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'No of student is not numeric in faculty_id (' + item['faculty_id'] + ') Teacher Load',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }
        });

        if (flag_error) {
            return;
        }

        if (data_sched.length == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Something went wrong',
                text: 'Teacher Schedule not found',
                timer: 5000,
            })
            return;
        }


        data_sched.forEach(function(item) {
            var from_time = item['from_time'];
            var to_time = item['to_time'];
            var valid_time = military_time(from_time);

            if (item['faculty_id'] == "" || item['name'] == "" || item['day'] == "" || item['from_time'] == "" || item['to_time'] == "" || item['status'] == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Missing data in faculty Teacher Sched',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }
            if (!is_digit.test(item['faculty_id'])) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Faculty id is not numeric in faculty_id (' + item['faculty_id'] + ') Teacher Sched',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }
            if (!valid_time) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Time from not valid in faculty_id (' + item['faculty_id'] + ') Teacher Sched',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }
            var valid_time = military_time(to_time);
            if (!valid_time) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Time to not valid in faculty_id (' + item['faculty_id'] + ') Teacher Sched',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }
            if (from_time >= to_time) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'From time is greater than To time in faculty_id (' + item['faculty_id'] + ') Teacher Sched',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }
        });

        if (flag_error) {
            return;
        }


        if (room_data.length == 0) {
            Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Room data not found',
                    timer: 5000,
                })
           
            return;
        }
        var flag_error = false;
        room_data.forEach(function(item) {
            if (item['room'] == "" || item['type'] == "" || item['capacity'] == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Missing data in room  (' + item['room'] + ')',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }
            if (!is_digit.test(item['capacity'])) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Capacity is not numeric in room (' + item['room'] + ')',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }
        });

        if (flag_error) {
            return;
        }

        if (subject_data.length == 0) {
            Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Subject data not found',
                    timer: 5000,
                })
        
            return;
        }
        var flag_error = false;

        subject_data.forEach(function(item) {
            if (item['subject'] == "" || item['room'] == "" || item['unit'] == "" || item['hr_wk'] == "" || item['day_wk'] == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Missing data in subject (' + item['subject'] + ')',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }
            if (!is_digit.test(item['unit'])) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Unit is not numeric in subject (' + item['subject'] + ')',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }
            if (!is_digit.test(item['hr_wk'])) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Hour/Week is not numeric in subject (' + item['subject'] + ')',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }
            if (!is_digit.test(item['day_wk'])) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'Day/Week is not numeric in subject (' + item['subject'] + ')',
                    timer: 5000,
                })
                flag_error = true;
                return;
            }

        });
        if (flag_error) {
            return;
        }

        // page loading
        if (!flag_error) {
            const wait = (delay = 0) =>
                new Promise(resolve => setTimeout(resolve, delay));

            const setVisible = (elementOrSelector, visible) =>
                (typeof elementOrSelector === 'string' ?
                    document.querySelector(elementOrSelector) :
                    elementOrSelector
                ).style.display = visible ? 'block' : 'none';

            setVisible('.page', false);
            setVisible('#loading', true);
        }



        $.ajax({
            type: "POST",
            url: "ajax/teacher_sched_data.php",
            data: {
                room_data: JSON.stringify({
                    room_data
                }),
                data_sched: JSON.stringify({
                    data_sched
                }),
                teach_load_data: JSON.stringify({
                    teach_load_data
                }),
                subject_data: JSON.stringify({
                    subject_data
                }),

                'title': title
            },
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == "200") {

                    setVisible('.page', true);
                    setVisible('#loading', false);

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: res.message,
                        timer: 5000,
                    }).then(function() {
                        table_el_room.clearData();
                        table_el_teach_sched.clearData();
                        table_el_teach_load.clearData();
                        table_el_subject.clearData();
                        $('#title').val('');
                    });
                }
                if (res.status == "400") {
                    setVisible('.page', true);
                    setVisible('#loading', false);

                    Swal.fire({
                        icon: 'warning',
                        title: 'Something Went Wrong',
                        html: res.message,
                        timer: 5000,
                    })
                }

            }
        });
    });
</script>

</html>