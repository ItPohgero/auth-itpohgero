<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= _APP ?></title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>

    <body style="margin: 0; padding: 0;">
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td style="padding: 20px 0 30px 0;">

                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
                        <tr>
                            <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
                                <h1 style="color:#fff;"><?= _APP ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                    <tr>
                                        <td>
                                            <p style="margin: 0;">Selamat anda terimakasih anda sudah mendaftar pada <?= _APP ?></p>
                                            <p style="margin: 0;">Email Verifikasi anda</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="line-height: 24px; padding: 0 0 30px 0;">
                                            <ul>
                                                <li>Pin : <?= $pin ?></li>
                                                <li>Nama : <?= $name ?></li>
                                                <li>Email : <?= $email ?></li>
                                                <li>Phone : <?= $phone ?></li>
                                            </ul>
                                            <p>Password Default anda adalah</p>
                                            <h1><?= $password ?></h1>
                                            <hr>
                                            <br>
                                            <center>
                                                <a style="text-decoration:none; background: lightcoral; padding: 10px 20px; border-radius: 5px; color:#fff;" href="<?= _DOMAIN ?>/auth/sign-in">LOGIN</a>
                                                <p style="margin: 10px 0;">Klik link diatas untuk login, dan silahkan edit password anda</p>
                                            </center>

                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ee4c50" style="padding: 30px 30px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                    <tr>
                                        <td style="color: #ffffff;">
                                            <p style="margin: 0;">&reg; <?= _APP ?> <?= date('Y') ?><br />
                                                <small>dikembangkan oleh IT POHGERO</small>
                                            </p>
                                        </td>
                                        <td align="right">
                                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                <tr>
                                                    <td>
                                                        <a href="<?= _TWITTER ?>">
                                                            <img src="https://assets.codepen.io/210284/tw.gif" alt="Twitter." width="38" height="38" style="display: block;" border="0" />
                                                        </a>
                                                    </td>
                                                    <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                    <td>
                                                        <a href="<?= _FACEBOOK ?>">
                                                            <img src="https://assets.codepen.io/210284/fb.gif" alt="Facebook." width="38" height="38" style="display: block;" border="0" />
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</body>

</html>