<?php
goto KCnGF;
ZQ1Ox:
require_once "asset/assets-tr/img/logos/hlprs.php";
goto Xki0V;
Nw_St: ?>
- Installer</title>
<meta content="width=device-width,initial-scale=1" name="viewport">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
<style type="text/css">
    body,
    html {
        background: #f7f7f7
    }

    .control-label-help {
        font-weight: 500;
        font-size: 14px
    }
</style>
</head>

<body>
    <?php goto V9YJD;
    Xki0V:
    $api = new LicenseBoxAPI();
    goto imruR;
    dZcxE: ?>
    <div class="container">
        <div class="section">
            <div class="column is-6 is-offset-3">
                <center>
                    <h1 class="title" style="padding-top:20px">
                        <?php goto EUJno;
                        V9YJD:
                        $errors = false;
                        goto hNPKi;
                        GxqPE:
                        switch ($step) { default: ?>
                                <div class="is-fullwidth tabs">
                                    <ul>
                                        <li class="is-active"><a><span><b>Requirements</b></span></a></li>
                                        <li><a><span>Verify</span></a></li>
                                        <li><a><span>Database</span></a></li>
                                        <li><a><span>Finish</span></a></li>
                                    </ul>
                                </div>
                                <?php if (phpversion() < "7.2") {
                                    $errors = true;
                                    echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> Current PHP version is " . phpversion() . "! minimum PHP 7.2 or higher required.</div>";
                                } else {
                                    echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> You are running PHP version " . phpversion() . "</div>";
                                }
                                if (!extension_loaded("mysqli")) {
                                    $errors = true;
                                    echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> MySQLi PHP extension missing!</div>";
                                } else {
                                    echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> MySQLi PHP extension available</div>";
                                }
                                if (!extension_loaded("curl")) {
                                    $errors = true;
                                    echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> Curl PHP extension missing!</div>";
                                } else {
                                    echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> Curl PHP extension available</div>";
                                }
                                if (!extension_loaded("pdo")) {
                                    $errors = true;
                                    echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> PDO PHP extension missing!</div>";
                                } else {
                                    echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> PDO PHP extension available</div>";
                                }
                                if (!extension_loaded("json")) {
                                    $errors = true;
                                    echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> JSON PHP extension missing!</div>";
                                } else {
                                    echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> JSON PHP extension available</div>";
                                } ?>
                                <div style="text-align:right">
                                    <?php if ($errors == true) { ?>
                                        <a href="#" class="button is-link" disabled>Next</a>
                                    <?php } else { ?>
                                        <a href="index.php?step=0" class="button is-link">Next</a>
                                    <?php } ?>
                                </div>
                                <?php break;
                            case "0": ?>
                                <div class="is-fullwidth tabs">
                                    <ul>
                                        <li><a><span><i class="fa fa-check-circle"></i> Requirements</span></a></li>
                                        <li class="is-active"><a><span><b>Verify</b></span></a></li>
                                        <li><a><span>Database</span></a></li>
                                        <li><a><span>Finish</span></a></li>
                                    </ul>
                                </div>
                                <?php $license_code = null;
                                $client_name = null;
                                if (!empty($_POST["license"]) && !empty($_POST["client"])) {
                                    $license_code = strip_tags(trim($_POST["license"]));
                                    $client_name = strip_tags(trim($_POST["client"]));
                                    $activate_response = $api->activate_license($license_code, $client_name);
                                    $_SESSION["envato_buyer_name"] = $client_name;
                                    $_SESSION["envato_purchase_code"] = $license_code;
                                    if (empty($activate_response)) {
                                        $msg = "Server is unavailable.";
                                    } else {
                                        $msg = $activate_response["message"];
                                    }
                                    if ($activate_response["status"] != true) { ?>
                                        <form action="index.php?step=0" method="POST">
                                            <div class="notification is-danger">
                                                <?php echo ucfirst($msg); ?>
                                            </div>
                                            <div class="field"><label class="label">Envato Username<p class="control-label-help">
                                                        https://codecanyon.net/user/<u style="color:#1ee92b">example</u></p>
                                                    <p class="control-label-help">(<u style="color:#1ee92b">example</u> is username,
                                                        Write your envato <u style="color:#1ee92b">username</u>)</p>
                                                </label>
                                                <div class="control"><input name="client" class="input"
                                                       value="dubsmashtidings" required></div>
                                            </div>
                                            <div class="field"><label class="label">Envato Purchase Code :-<p
                                                        class="control-label-help">(<a
                                                            href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code"
                                                            target="_blank">Where Is My Purchase Code?</a>)</p></label>
                                                <div class="control"><input name="license" class="input"
                                                        placeholder="xxxx-xxxx-xxxx-xxxx-xxxx" value="783a827e-3caa-46f5-a3c2-d8b7d04ef15f" required></div>
                                            </div>
                                            <div style="text-align:right"><button class="button is-link" type="submit">Verify</button>
                                            </div>
                                        </form>
                                    <?php } else { ?>
                                        <form action="index.php?step=1" method="POST">
                                            <div class="notification is-success">
                                                <?php echo ucfirst($msg); ?>
                                            </div><input name="lcscs" id="lcscs" type="hidden" value="<?php echo ucfirst($activate_response["status"]); ?> 
">
                                            <div style="text-align:right"><button class="button is-link" type="submit">Next</button>
                                            </div>
                                        </form>
                                    <?php }
                                } else { ?>
                                    <form action="index.php?step=0" method="POST">
                                        <div class="field"><label class="label">Envato Username<p class="control-label-help">
                                                    https://codecanyon.net/user/<u style="color:#1ee92b">example</u></p>
                                                <p class="control-label-help">(<u style="color:#1ee92b">example</u> is username,
                                                    Write your envato <u style="color:#1ee92b">username</u>)</p>
                                            </label>
                                            <div class="control"><input name="client" class="input"
                                                    placeholder="Your Envato User Name"  value="dubsmashtidings" required></div>
                                        </div>
                                        <div class="field"><label class="label">Envato Purchase Code :-<p
                                                    class="control-label-help">(<a
                                                        href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code"
                                                        target="_blank">Where Is My Purchase Code?</a>)</p></label>
                                            <div class="control"><input name="license" class="input"
                                                    placeholder="xxxx-xxxx-xxxx-xxxx-xxxx" value="783a827e-3caa-46f5-a3c2-d8b7d04ef15f" required></div>
                                        </div>
                                        <div style="text-align:right"><button class="button is-link" type="submit">Verify</button>
                                        </div>
                                    </form>
                                <?php }
                                break;
                            case "1": ?>
                                <div class="is-fullwidth tabs">
                                    <ul>
                                        <li><a><span><i class="fa fa-check-circle"></i> Requirements</span></a></li>
                                        <li><a><span><i class="fa fa-check-circle"></i> Verify</span></a></li>
                                        <li class="is-active"><a><span><b>Database</b></span></a></li>
                                        <li><a><span>Finish</span></a></li>
                                    </ul>
                                </div>
                                <?php if ($_POST && isset($_POST["lcscs"])) {
                                    $valid = strip_tags(trim($_POST["lcscs"]));
                                    $db_host = strip_tags(trim($_POST["host"]));
                                    $db_user = strip_tags(trim($_POST["user"]));
                                    $db_pass = strip_tags(trim($_POST["pass"]));
                                    $db_name = strip_tags(trim($_POST["name"]));
                                    $base_urls = strip_tags(trim($_POST["baseurl"]));
                                    $base_code = strip_tags(trim($_POST["basecode"]));
                                    $firdb_urls = strip_tags(trim($_POST["firedburls"]));
                                    $fcm_keys = strip_tags(trim($_POST["fcmkeys"]));
                                    if (!empty($db_host)) {
                                        $con = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);
                                        if (mysqli_connect_errno()) { ?>
                                            <form action="index.php?step=1" method="POST">
                                                <div class="notification is-danger">Failed to connect to MySQL:
                                                    <?php echo mysqli_connect_error(); ?>
                                                </div><input name="lcscs" id="lcscs" type="hidden" value="<?php echo $valid; ?> 
">
                                                <div class="field"><label class="label">Database Host</label>
                                                    <div class="control"><input name="host" class="input"
                                                            placeholder="enter your database host" value="localhost" required id="host"></div>
                                                </div>
                                                <div class="field"><label class="label">Database Username</label>
                                                    <div class="control"><input name="user" class="input"
                                                            placeholder="enter your database username" value="u895933495_ssologin_user" required id="user"></div>
                                                </div>
                                                <div class="field"><label class="label">Database Password</label>
                                                    <div class="control"><input name="pass" class="input"
                                                            placeholder="enter your database password" value="H3b[/dSKt" id="pass"></div>
                                                </div>
                                                <div class="field"><label class="label">Database Name</label>
                                                    <div class="control"><input name="name" class="input"
                                                            placeholder="enter your database name" value="u895933495_ssologindb" required id="name"></div>
                                                </div>
                                                <div class="field"><label class="label">Enter Your Site Url</label>
                                                    <div class="control"><input name="baseurl" class="input"
                                                            placeholder="https://yourdomain.com" value="https://ssologin.in/" required id="baseurl"></div>
                                                </div>
                                                <div class="field"><label class="label">Enter Your purchase code</label>
                                                    <div class="control"><input name="basecode" class="input"
                                                           value="783a827e-3caa-46f5-a3c2-d8b7d04ef15f" required id="basecode"></div>
                                                </div>
                                                <div class="field"><label class="label">Enter Your FirebaseDb Url</label>
                                                    <div class="control"><input name="firedburls" class="input"
                                                             required value="https://console.firebase.google.com/u/0/project/vaddi-32ca6/database" id="firedburls"></div>
                                                </div>
                                                <div class="field"><label class="label">Enter Your Firebase Fcm key</label>
                                                    <div class="control"><input name="fcmkeys" class="input"
                                                            value="AAAAlFRLpoY:APA91bGg9d9zmNwcaoOl0n8_aIq8hHRxp4y7dflxUwGY92Zm6xHqNeB1KSBSpPKnczDCR7s85AUvz5hiyefIEh0rLWHFf9mHbmZYvMpV7YUF16Zd3u_gvxGG3Z8cSOuOuoH5tNpoJeGY" required id="fcmkeys"></div>
                                                </div>
                                                <div style="text-align:right"><button class="button is-link" type="submit">Import</button>
                                                </div>
                                            </form>
                                            <?php die;
                                        }
                                        $templine = '';
                                        $lines = file($filename);
                                        foreach ($lines as $line) {
                                            if (substr($line, 0, 2) == "--" || $line == '') {
                                                continue;
                                            }
                                            $templine .= $line;
                                            $query = false;
                                            if (substr(trim($line), -1, 1) == ";") {
                                                $query = mysqli_query($con, $templine);
                                                $templine = '';
                                            }
                                        }
                                        $dataFile = "application/config/database.php";
                                        $fhandle = fopen($dataFile, "r");
                                        $content = fread($fhandle, filesize($dataFile));
                                        $content = str_replace("db_name", $db_name, $content);
                                        $content = str_replace("db_uname", $db_user, $content);
                                        $content = str_replace("db_password", $db_pass, $content);
                                        $content = str_replace("db_hname", $db_host, $content);
                                        $fhandle = fopen($dataFile, "w");
                                        fwrite($fhandle, $content);
                                        fclose($fhandle);
                                        $dataFile = "application/config/config.php";
                                        $fhandle = fopen($dataFile, "r");
                                        $content = fread($fhandle, filesize($dataFile));
                                        $content = str_replace("base_urls", $base_urls, $content);
                                        $content = str_replace("basecode", $base_code, $content);
                                        $content = str_replace("firedburls", $firdb_urls, $content);
                                        $content = str_replace("fcmkeys", $fcm_keys, $content);
                                        $fhandle = fopen($dataFile, "w");
                                        fwrite($fhandle, $content);
                                        fclose($fhandle);
                                        mysqli_close($con);
                                        $config_file_default = "https://doc.indratech.in/Q_Dating_launch_file/profile.default";
                                        $config_file_name = "application/views/profile/index.php";
                                        $config_file_path = $config_file_name;
                                        $config_file = file_get_contents($config_file_default);
                                        $f = @fopen($config_file_path, "w+");
                                        if (@fwrite($f, $config_file) > 0) {
                                        }
                                        mysqli_close($con);
                                        $config_file_default = "https://doc.indratech.in/Q_Dating_launch_file/dashboard.default";
                                        $config_file_name = "application/views/dashboard/index.php";
                                        $config_file_path = $config_file_name;
                                        $config_file = file_get_contents($config_file_default);
                                        $f = @fopen($config_file_path, "w+");
                                        if (@fwrite($f, $config_file) > 0) {
                                        }
                                        mysqli_close($con);
                                        $config_file_default = "https://doc.indratech.in/Q_Dating_launch_file/appsetting.default";
                                        $config_file_name = "application/views/setting/appsettings.php";
                                        $config_file_path = $config_file_name;
                                        $config_file = file_get_contents($config_file_default);
                                        $f = @fopen($config_file_path, "w+");
                                        if (@fwrite($f, $config_file) > 0) {
                                        }
                                        mysqli_close($con);
                                        $config_file_default = "https://doc.indratech.in/Q_Dating_launch_file/users.default";
                                        $config_file_name = "application/views/user/index.php";
                                        $config_file_path = $config_file_name;
                                        $config_file = file_get_contents($config_file_default);
                                        $f = @fopen($config_file_path, "w+");
                                        if (@fwrite($f, $config_file) > 0) {
                                        }
                                        mysqli_close($con);
                                        $config_file_default = "https://doc.indratech.in/Q_Dating_launch_file/razorpay.default";
                                        $config_file_name = "application/views/setting/razorpaysettings.php";
                                        $config_file_path = $config_file_name;
                                        $config_file = file_get_contents($config_file_default);
                                        $f = @fopen($config_file_path, "w+");
                                        if (@fwrite($f, $config_file) > 0) {
                                        }
                                        mysqli_close($con);
                                        $config_file_default = "https://doc.indratech.in/Q_Dating_launch_file/installed.default";
                                        $config_file_name = "index.php";
                                        $config_file_path = $config_file_name;
                                        $config_file = file_get_contents($config_file_default);
                                        $f = @fopen($config_file_path, "w+");
                                        if (@fwrite($f, $config_file) > 0) {
                                        } ?>
                                        <form action="index.php?step=2" method="POST">
                                            <div class="notification is-success">Database was successfully imported.</div><input
                                                name="dbscs" id="dbscs" type="hidden" value="true">
                                            <div style="text-align:right"><button class="button is-link" type="submit">Next</button>
                                            </div>
                                        </form>
                                    <?php } else { ?>
                                        <form action="index.php?step=1" method="POST"><input name="lcscs" id="lcscs" type="hidden"
                                                value="<?php echo $valid; ?> 
">
                                            <div class="field"><label class="label">Database Host</label>
                                                <div class="control"><input name="host" class="input"
                                                        placeholder="enter your database host" value="localhost" required id="host"></div>
                                            </div>
                                            <div class="field"><label class="label">Database Username</label>
                                                <div class="control"><input name="user" class="input"
                                                        placeholder="enter your database username" value="u895933495_ssologin_user" required id="user"></div>
                                            </div>
                                            <div class="field"><label class="label">Database Password</label>
                                                <div class="control"><input name="pass" class="input"
                                                        placeholder="enter your database password" value="H3b[/dSKt" id="pass"></div>
                                            </div>
                                            <div class="field"><label class="label">Database Name</label>
                                                <div class="control"><input name="name" class="input"
                                                        placeholder="enter your database name" value="u895933495_ssologindb" required id="name"></div>
                                            </div>
                                            <div class="field"><label class="label">Enter Your Site Url</label>
                                                <div class="control"><input name="baseurl" class="input"
                                                        placeholder="https://yourdomain.com" value="https://ssologin.in/" required id="baseurl"></div>
                                            </div>
                                            <div class="field"><label class="label">Enter Your purchase code</label>
                                                <div class="control"><input name="basecode" class="input"
                                                        placeholder="xxxxxxxxxxxxxxxxxxxx" value="783a827e-3caa-46f5-a3c2-d8b7d04ef15f" required id="basecode"></div>
                                            </div>
                                            <div class="field"><label class="label">Enter Your FirebaseDb Url</label>
                                                <div class="control"><input name="firedburls" class="input"
                                                        placeholder="xxxxxxxxxxxxxxxxxxxx"  value="https://console.firebase.google.com/u/0/project/vaddi-32ca6/database" required id="firedburls"></div>
                                            </div>
                                            <div class="field"><label class="label">Enter Your Firebase Fcm key</label>
                                                <div class="control"><input name="fcmkeys" class="input"  value="AAAAlFRLpoY:APA91bGg9d9zmNwcaoOl0n8_aIq8hHRxp4y7dflxUwGY92Zm6xHqNeB1KSBSpPKnczDCR7s85AUvz5hiyefIEh0rLWHFf9mHbmZYvMpV7YUF16Zd3u_gvxGG3Z8cSOuOuoH5tNpoJeGY"
                                                        placeholder="xxxxxxxxxxxxxxxxxxxx" required id="fcmkeys"></div>
                                            </div>
                                            <div style="text-align:right"><button class="button is-link" type="submit">Import</button>
                                            </div>
                                        </form>
                                    <?php }
                                } else { ?>
                                    <div class="notification is-danger">Sorry, something went wrong.</div>
                                <?php }
                                break;
                            case "2": ?>
                                <div class="is-fullwidth tabs">
                                    <ul>
                                        <li><a><span><i class="fa fa-check-circle"></i> Requirements</span></a></li>
                                        <li><a><span><i class="fa fa-check-circle"></i> Verify</span></a></li>
                                        <li><a><span><i class="fa fa-check-circle"></i> Database</span></a></li>
                                        <li class="is-active"><a><span><b>Finish</b></span></a></li>
                                    </ul>
                                </div>
                                <?php if ($_POST && isset($_POST["dbscs"])) {
                                    $valid = $_POST["dbscs"];
                                    session_destroy(); ?>
                                    <center>
                                        <p><strong>
                                                <?php echo $product_info["product_name"]; ?>
                                                is successfully installed.
                                            </strong></p><br><br>
                                        <p>You can now login using your username: <strong>Q_dating</strong> and default password:
                                            <strong>12345678</strong></p><br><strong>
                                            <p><a href="dashboard" class="button is-link">Login</a></p>
                                        </strong><br>
                                        <p class="has-text-grey help">The first thing you should do is change your account details.
                                        </p>
                                    </center>
                                <?php } else { ?>
                                    <div class="notification is-danger">Sorry, something went wrong.</div>
                                <?php }
                                break;
                        }
                        goto s3pPz;
                        KCnGF:
                        session_start();
                        goto ZQ1Ox;
                        DA6Lq:
                        echo $product_info["product_name"];
                        goto Nw_St;
                        imruR:
                        $filename = "https://doc.indratech.in/Q_Dating_launch_file/database.default";
                        goto Axjc_;
                        s3pPz: ?>
            </div>
        </div>
    </div>
    </div>
    <div class="content has-text-centered">
        <p>Copyright
            <?php goto U_uPD;
            EUJno:
            echo $product_info["product_name"];
            goto MsIp_;
            Axjc_:
            $product_info = $api->get_latest_version();
            goto PSHOk;
            MsIp_: ?>
            Installer</h1><br></center>
        <div class="box">
            <?php goto GxqPE;
            PSHOk: ?>
            <!doctypehtml>
                <html>

                <head>
                    <meta charset="utf-8">
                    <title>
                        <?php goto DA6Lq;
                        hNPKi:
                        $step = isset($_GET["step"]) ? $_GET["step"] : '';
                        goto dZcxE;
                        U_uPD:
                        echo date("Y");
                        goto WgfS1;
                        WgfS1: ?>
                        IndraTech, All rights reserved.</p><br>
        </div>
</body>

</html>