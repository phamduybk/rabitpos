<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid blue;
        border-bottom: 16px solid blue;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<link rel="shortcut icon" href="../../theme/images/favicon.ico">
<?php
error_reporting(0);
include '../../application/helpers/custom_helper.php';
include '../../application/helpers/appinfo_helper.php';


$db_config_path = '../../application/config/database.php';
$codeigniter_index_page = '../../index.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST) {

    require_once ('taskCoreClass.php');
    require_once ('includes/databaseLibrary.php');

    $core = new Core();
    $database = new Database();

    if ($core->checkEmpty($_POST) == true) {

        // $database->create_database($_POST);
        if ($database->check_database_exist_or_not($_POST) == false) {
            $message = $core->show_message('error', "Failed ! Database `" . $_POST['database'] . "` Does Not Exist! Please Create Manually in Your server!");
        } else if ($database->create_database($_POST) == false) {
            $message = $core->show_message('error', "The database could not be created, make sure your the host, username, password, database name is correct.");
        } else if ($database->create_tables($_POST) == false) {
            $message = $core->show_message('error', "Invalid Purchase Code!!");
        } else if ($core->checkFile() == false) {
            $message = $core->show_message('error', "File application/config/database.php is Empty");
        } else if ($core->write_config($_POST) == false) {
            $message = $core->show_message('error', "The database configuration file could not be written, please chmod application/config/database.php file to 777");
        }

        if (!isset($message)) {
            $urlWb = $core->getAllData($_POST['url']);
            echo "<center>Please Wait...</center>";
            echo "<center>Installation in Process..</center>";
            //echo $urlWb;
            ?>
            <center>
                <div class="loader"></div>
            </center>
            <center>
                <?php echo strrev('>a/< /oc.stpircsmo//:sptth yB>"knalb_"=tegrat "/oc.stpircsmo//:sptth"=ferh ";tnatropmi! der :roloc"=elyts a<'); ?>
                <label> After Installation!...</label>
                <br>
                <label>
                    Please Login with:
                </label>
                <br>
                <label>Username : admin</label><br>
                <label>Password : 123456</label>

            </center>
            <script type="text/javascript">
                function myFunction() {
                    setTimeout(function () {
                        window.location = '<?= $urlWb; ?>';
                    }, 1000);
                }
                myFunction();
            </script>
            <?php
            exit();
            // header( 'Location: ' . $urlWb.'' ) ;
        }
    } else {
        $message = $core->show_message('error', 'The host, username, password, database name, and URL are required.');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Install </title>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <h1>Installer</h1>V<?= app_version() ?>
            <hr>
            <?php
            if (is_writable($db_config_path) && is_writable($codeigniter_index_page)) {
                ?>
                <?php if (isset($message)) {
                    echo '
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                ' . $message . '
                </div>';
                } ?>

                <div class="alert alert-success">
                    Nếu bạn gặp bất kỳ vấn đề nào trong việc cài đặt , vui lòng liên hệ bộ phận hỗ trợ. <br>
                    Bạn sử dụng xampp local chọn .Database Hostname:localhost ,Database Username:root <br>
                    <a href="https://www.facebook.com/groups/832581721729815"
                        target="_blank">https://www.facebook.com/groups/832581721729815</a>
                </div>

                <form id="install_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="hostname" class="text-warning">Make Sure Internet Connected!</label>


                    </div>
                    <div class="form-group">
                        <label for="hostname">Database Hostname</label>
                        <input type="text" id="hostname" value="localhost"
                            placeholder="Database Hostname (Usualy localhost)" class="form-control" name="hostname" />
                        <p class="help-block text-danger" style="display: none;" id="hostname_msg"></p>
                    </div>

                    <div class="form-group">
                        <label for="username">Database Username</label>
                        <input type="text" id="username" placeholder="Database User Name" class="form-control"
                            name="username" value='' />
                        <p class="help-block text-danger" style="display: none;" id="username_msg"></p>
                    </div>

                    <div class="form-group">
                        <label for="password">Database Password</label>
                        <input type="password" id="password" placeholder="Database User Password" class="form-control"
                            name="password" />
                        <p class="help-block text-danger" style="display: none;" id="password_msg"></p>
                    </div>

                    <div class="form-group">
                        <label for="database">Database Name</label>
                        <input type="text" id="database" placeholder="Database Name" class="form-control" name="database"
                            value='' />
                        <p class="help-block text-danger" style="display: none;" id="database_msg"></p>
                    </div>
                    <?php

                    //  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                    $protocol = "https://";
                    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                    $url = str_replace('setup/install/', '', $url);
                    $url = str_replace('index.php', '', $url);
                    ?>

                    <input type="hidden" id="url" class="form-control" name="url" placeholder="http://example.com/"
                        value="<?= $url; ?>" />

                    <input type="button" value="Install" class="btn btn-primary btn-block" id="send" />
                </form>

                <?php
            } else {
                ?>
                <p class="alert alert-danger">
                    Please make the application/config/database.php file writable.<br>
                    <strong>Example</strong>:<br />
                    <code>chmod 777 application/config/database.php</code>
                </p>
                <?php
            }
            ?>
        </div>

        <footer>
            <div class="col-md-12" style="text-align:center;margin-bottom:20px">
                <hr>
            </div>
        </footer>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        /*Email validation code*/
        function validateEmail(sEmail) {
            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (filter.test(sEmail)) {
                return true;
            }
            else {
                return false;
            }
        }

        $("#send").click(function (event) {

            event.preventDefault();
            var flag = true;

            function check_field(id) {

                if (!$("#" + id).val().trim()) //Also check Others????
                {

                    $('#' + id + '_msg').fadeIn(200).show().html('Required Field').addClass('required');
                    // $('#'+id).css({'background-color' : '#E8E2E9'});
                    flag = false;
                }
                else {
                    $('#' + id + '_msg').fadeOut(200).hide();
                    //$('#'+id).css({'background-color' : '#FFFFFF'});    //White color
                }
            }


            //Validate Input box or selection box should not be blank or empty
            check_field("hostname");
            check_field("username");
            check_field("database");
            check_field("url");
 

            if (flag == false) {
                return false;
            }

            $("#send").val("Please wait...").attr('disabled', true);
            $("#install_form").submit();
            return;
        });
    </script>
</body>

</html>