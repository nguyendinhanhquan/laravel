$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $(".nav-link").click(function () {
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });

    $("#form_info_edit").validate({
        rules: {
            fullname: {
                required: true,
                minlength: 8,
                maxlength: 50,
            },
            email: {
                required: true,
                checkEmail: true,
                maxlength: 255,
            },
            phone: {
                required: true,
                phoneVN: true,
                minlength: 10,
                maxlength: 11,
            },
            birthday: {
                required: true,
                checkBirthDay: true,
            },
            address: {
                required: true,
                maxlength: 255,
            },
            IDCard: {
                required: true,
                number: true,
                rangelength: [9, 12],
            },
            IPlace: {
                required: true,
                maxlength: 255,
            },
            IDate: {
                required: true,
                checkBirthDay: true,
            },
            university: {
                required: true,
                maxlength: 255,
            },
            YOG: {
                required: true,
                number: true,
                minlength: 4,
                maxlength: 4,
                min: 1970,
                max: 2030,
            },
            StartJob: {
                required: true,
                checkBirthDay: true,
            },
            note: {
                required: true,
                maxlength: 255,
            },
            // avatar: {
            //     checkAvatar: true,
            // },
        },
    });

    $("#form_user_update").validate({
        rules: {
            fullname: {
                required: true,
                minlength: 8,
                maxlength: 50,
            },
            email: {
                required: true,
                checkEmail: true,
                maxlength: 255,
            },
            phone: {
                required: true,
                phoneVN: true,
                minlength: 10,
                maxlength: 11,
            },
            birthday: {
                required: true,
                checkBirthDay: true,
            },
            address: {
                required: true,
                maxlength: 255,
            },
            IDCard: {
                required: true,
                number: true,
                rangelength: [9, 12],
            },
            IPlace: {
                required: true,
                maxlength: 255,
            },
            IDate: {
                required: true,
                checkBirthDay: true,
            },
            university: {
                required: true,
                maxlength: 255,
            },
            YOG: {
                required: true,
                number: true,
                minlength: 4,
                maxlength: 4,
                min: 1970,
                max: 2030,
            },
            StartJob: {
                required: true,
                checkBirthDay: true,
            },
            note: {
                required: true,
                maxlength: 255,
            },
            // avatar: {
            //     checkAvatar: true,
            // },
        },
    });

    $("#salary_basic").validate({
        rules: {
            basic_salary: {
                required: true,
                number: true,
                minlength: 8,
                maxlength: 15,
            },
        },
        messages: {
            basic_salary: {
                minlength: "Please enter more than 7 characters.",
                maxlength: "Please enter more than 12 characters.",
            },
        },
    });

    $("#admin_overtime_form").validate({
        rules: {
            feedback: {
                maxlength: 255,
            },
        },
    });

    $("#change_password").validate({
        rules: {
            new_password: {
                required: true,
                minlength: 7,
                maxlength: 255,
                checkNewPassword: true,
            },
            confirm_password: {
                required: true,
                minlength: 7,
                maxlength: 255,
                equalTo: "#new_password",
            },
            old_password: {
                required: true,
                minlength: 7,
                maxlength: 255,
            },
        },
        messages: {
            confirm_password: {
                equalTo:
                    "Your password and confirmation password do not match.",
            },
        },
    });

    $("#overtime").validate({
        rules: {
            user: {
                required: true,
            },
            place_ot: {
                required: true,
                maxlength: 255,
            },
            task_name: {
                required: true,
                maxlength: 255,
            },
            note: {
                maxlength: 255,
            },
            date_ot: {
                required: true,
                checkDayNow: true,
            },
            end_time: {
                required: true,
                checkEndTime: true,
            },
        },
    });

    $("#dayoff").validate({
        rules: {
            reason: {
                required: true,
                maxlength: 255,
            },
            startDate: {
                required: true,
                checkStartDay: true,
            },
            endDate: {
                required: true,
                greaterThan: "#startDate",
            },
        },
    });

    $("#register").validate({
        rules: {
            username: {
                required: true,
                minlength: 5,
                maxlength: 255,
                checkUsername: true,
            },
            email: {
                required: true,
                checkEmail: true,
                maxlength: 255,
            },
            password: {
                required: true,
                minlength: 7,
                maxlength: 255,
                checkNewPassword: true,
            },
            confirm_password: {
                required: true,
                minlength: 7,
                maxlength: 255,
                equalTo: "#password",
                checkNewPassword: true,
            },
        },
    });

    $.validator.addMethod(
        "phoneVN",
        function (phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return (
                this.optional(element) ||
                (phone_number.length > 9 &&
                    phone_number.match(
                        /(03|07|08|09|01[2|6|8|9])+([0-9]{8})\b/
                    ))
            );
        },
        "Please specify a valid VietNam phone number and don't need +84"
    );

    $.validator.addMethod(
        "checkUsername",
        function (value, element) {
            return (
                this.optional(element) ||
                /^(?!.*__.*)(?!.*\.\..*)[a-z0-9_.]+$/i.test(value)
            );
        },
        "Username invalid"
    );

    $.validator.addMethod(
        "checkNewPassword",
        function (value, element) {
            return (
                this.optional(element) ||
                /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%#*?&]{7,}$/i.test(
                    value
                )
            );
        },
        "Password minimum 7 character, at least one uppercase letter, one number and one special character."
    );

    $.validator.addMethod(
        "checkEmail",
        function (value, element) {
            return (
                this.optional(element) ||
                /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/i.test(
                    value
                )
            );
        },
        "Email Address is invalid: Please enter a valid email address."
    );

    $.validator.addMethod(
        "greaterThan",
        function (value, element, param) {
            var year = new Date().getFullYear();
            var valueDate = value.split("-");
            var endDate = new Date(
                valueDate[2],
                valueDate[1] - 1,
                valueDate[0]
            );
            var a = $(param).val();
            var from = a.split("-");
            var startDate = new Date(from[2], from[1] - 1, from[0]);
            return endDate.getTime() >= startDate.getTime() && from[2] >= year;
        },
        "End date must be greater than or equal to start date and year must be greater than or equal to 2020."
    );

    $.validator.addMethod(
        "checkBirthDay",
        function (value, element) {
            var year = new Date().getFullYear();
            var valueDate = value.split("-");
            var birthday = new Date(
                valueDate[2],
                valueDate[1] - 1,
                valueDate[0]
            );
            var now = $.datepicker.formatDate("yy/mm/dd", new Date());
            var birthday = $.datepicker.formatDate("yy/mm/dd", birthday);
            if (
                birthday <= now &&
                valueDate[2] <= year &&
                valueDate[2] >= 1950
            ) {
                return true;
            }
        },
        "This field can't great than today & year must be great than 1950"
    );

    $.validator.addMethod(
        "checkStartDay",
        function (value, element) {
            var year = new Date().getFullYear();
            var valueDate = value.split("-");
            var StartDay = new Date(
                valueDate[2],
                valueDate[1] - 1,
                valueDate[0]
            );
            var now = $.datepicker.formatDate("yy/mm/dd", new Date());
            var StartDay = $.datepicker.formatDate("yy/mm/dd", StartDay);
            if (
                StartDay >= now &&
                valueDate[2] <= year &&
                valueDate[2] >= 1950
            ) {
                return true;
            }
        },
        "This field must be great than or equal to today and year must be great than 1950"
    );

    $.validator.addMethod(
        "checkDayNow",
        function (value, element) {
            var valueDate = value.split("-");
            var dayOT = new Date(valueDate[2], valueDate[1] - 1, valueDate[0]);
            var now = $.datepicker.formatDate("yy/mm/dd", new Date());
            var dayOT = $.datepicker.formatDate("yy/mm/dd", dayOT);
            if (dayOT >= now) {
                return true;
            }
        },
        "Day Overtime must be great than today"
    );

    $.validator.addMethod(
        "checkEndTime",
        function (value, element) {
            var end = $("#end_time").val();
            var start = $("#start_time").val();
            if (end <= start) {
                return false;
            }
            return true;
        },
        "End Time must be great than Start Time"
    );

    //Check Avatar
    $.validator.addMethod(
        "checkAvatar",
        function (value, element) {
            $size = $("#avatar")[0].files[0].size;
            $type = $("#avatar")[0].files[0].type;
            console.log($size + "===" + $type);
            if (
                ($type == "image/gif" ||
                    $type == "image/jpeg" ||
                    $type == "image/png" ||
                    $type == "image/jpg") &&
                $size <= 2097152
            ) {
                return true;
            }
        },
        "  Type must be is gif, jpeg, jpg, png & size less than 2MB"
    );
});

//Money
$("input[data-type='currency']").on({
    keyup: function () {
        formatCurrency($(this));
    },
    blur: function () {
        formatCurrency($(this), "blur");
    },
});

function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.

    // get input value
    var input_val = input.val();

    // don't validate empty input
    if (input_val === "") {
        return;
    }

    // original length
    var original_len = input_val.length;

    // initial caret position
    var caret_pos = input.prop("selectionStart");

    // check for decimal
    if (input_val.indexOf(".") >= 0) {
        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);

        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
            right_side += "00";
        }

        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        // input_val = "$" + left_side + "." + right_side;
        input_val = left_side + "." + right_side;
    } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        // input_val = "$" + input_val;
        input_val = input_val;

        // final formatting
        // if (blur === "blur") {
        //   input_val += ".00";
        // }
    }

    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}

//Check Date
function checkValueDate() {
    var value = $("#startDate").val();
    if (value !== "") {
        // $("#update_id").prop("readonly", true);
        $("#endDate").removeAttr("disabled");
    }
}

//Check Time, add disable

function checkStartTime() {
    var value = $("#start_time").val();
    if (value != "") {
        $("#end_time").removeAttr("disabled");
    }
}

//Check Avatar

$("#avatar").bind("change", function () {
    $size = this.files[0].size;
    $type = this.files[0].type;
    if (
        ($type == "image/gif" ||
            $type == "image/jpeg" ||
            $type == "image/png" ||
            $type == "image/jpg") &&
        $size <= 2097152
    ) {
        $("#avatar-error").hide();
        $("#update_id").prop("disabled", false);
    } else {
        $("#avatar-error").show();
        $("#avatar-error").text(
            "Type must be is gif, jpeg, jpg, png & size less than 2MB"
        );
        $("#update_id").prop("disabled", true);
    }
});

$(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

// $(".toggle-password").click(function () {
//     $(this).toggleClass("fa-eye fa-eye-slash");
//     var input = $($(this).attr("toggle"));
//     if (input.attr("type") == "password") {
//         input.attr("type", "text");
//     } else {
//         input.attr("type", "password");
//     }
// });
