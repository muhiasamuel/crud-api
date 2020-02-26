<!DOCTYPE html>
<html lang="en">
<head>

    <title>crud api</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!--<script src="jquery.min.js"></script>
    <script src="jquery-3"></script>-->
    <!--    <script src="bootstrap/js/bootstrap.min.js"></script>-->
</head>
<body>
<h2 text align="center">CRUD API</h2>

<div class="container">
    <br>
    <div align="right" style="margin-bottom: 4px; ">

        <button type="button" name="add" class="btn btn-success btn-xs" id="add">ADD DATA</button>

    </div>
    <div id="user_data" class="table-responsive">

    </div>
    <br>
</div>
<div id="user_dialog" title="Add Data">
    <form id="user_form" method="POST">
        <div class="form-group">
            <label>Enter first name</label>
            <input type="text" name="first_name" class="form-control" id="first_name" class="form-control">
            <span id="error_first_name" class="text-danger"></span>
        </div>
        <div class="form-group">
            <label>Enter last name</label>
            <input type="text" name="last_name" class="form-control" id="last_name">
            <span id="error_last_name" class="text-danger"></span>
        </div>
        <div class="form-group">
            <input type="hidden" name="action" id="action" value="insert">
            <input type="hidden" name="hidden_id" id="hidden_id">
            <input type="button" name="form_action" id="form_action" class="btn btn-info" value="Insert">
        </div>

    </form>

</div>

<div id="action alert" title="alert">
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
<script>
    $(document).ready(function () {

        load_data();

        function load_data() {
            $.ajax({
                url: "fetch.php",
                method: "POST",
                success: function (data) {

                    $('#user_data').html(data);

                }
            })
        }

        $('#user_dialog').dialog({
            autoOpen: false,
            width: 400
        });

        $('#add').click(function () {
            $('#user_dialog').attr('title', 'Add_Data');
            $('#action').val('insert');
            $('#form_action').val("Insert");
            $('#user_dialog').dialog('open');
        });

        $(document).ready(function () {
            $('#form_action').click(function () {
                var error_first_name = '';
                var error_last_name = '';
                var first_name = $("#first_name").val();
                var last_name = $('#last_name').val();
                if (first_name == '') {
                    error_first_name = 'first name required';
                    $('#error_first_name').text(error_first_name);
                    $('#first_name').css('border-color', 'red');
                } else if (last_name == '') {
                    error_last_name = 'last_name_required';
                    $('#error_last_name').text(error_last_name);
                    $('#last_name').css('border-color', 'red');
                } else {
                    console.log(first_name);
                    $.ajax({
                        url: "action.php",
                        method: "POST",
                        data: {
                            first_name: first_name,
                            last_name: last_name
                        },
                        success: function (data) {
                            $('#user_dialog').dialog('close');
                            console.log(data);
                            $('#action_alert').html(data);
                            $('#action_alert').dialog('open');
                            load_data();
                        }
                    });
                }
            });
        });

        $('#action_alert').dialog({
            autoOpen: false
        });
    });
</script>
