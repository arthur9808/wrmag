<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Quarterback Magazine</title>
    <style>
        body {
            color: #2d323c;
            font-size: 14px;
            background-color: #fff;
            font-family: Arial, sans-serif;
            line-height: 1.2;
            padding-right: 10px;
            padding-left: 10px;
        }

        #emailContainer {
            background-color: #fff;
            color: #333;
            border: 2px solid #ccc;
        }

        #emailContainer a,
        #emailContainer a:visited {
            color: #555;
        }

        .table {
            font-size: 18px;
        }

        .table th {
            background-color: #e1e1e1;
        }

        .table tr {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <!-- HIDDEN PREHEADER TEXT -->
    <div
        style="
        display: none;
        mso-hide: all;
        width: 0px;
        height: 0px;
        max-width: 0px;
        max-height: 0px;
        font-size: 0px;
        line-height: 0px;
      ">
        Quarterback Magazine
    </div>
    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
        <tr>
            <td align="center" valign="top" style="padding: 0 20px">
                <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailContainer"
                    style="
              min-width: 500px;
              width: 100%;
              max-width: 700px;
              background-color: #fff;
              color: #333;
              border: 2px solid #ccc;
            ">
                    <tr>
                        <td align="center" valign="top">
                            <p style="text-align: center; margin: 5px">
                                <a href="https://wrmag.com/sign-in/" title="Go to login"><img
                                        src="{{ url('/template/assets/img/3QB-Magazine-logo.png') }}" width="174"
                                        height="105" alt="Go to login" /></a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top"
                            style="
                  font-size: 18px;
                  font-family: Arial, sans-serif;
                  color: #2d323c;
                ">
                            <h1 style="text-align: center">
                                <strong style="color: #ff0000">YOUR PROFILE HAS BEEN DELETED DUE TO INACTIVITY FOR 48 HOURS</strong>
                            </h1>
                            <br>
                            <br>
                            <p style="line-height: 1.2">
                                Hi {{ $user }},
                            </p>
                            <br>
                            <p style="line-height: 1.2">
                                Oops! it looks like your profile is no longer active. If you would still like to create your FREE profile, please try again and then e-mail us your completed profile.
                            </p>
                            <br>
                            <p style="line-height: 1.2; text-align:center;">
                                <a style="color:#1967d2; font-weight: bold;" href="{{ url('/sign-up') }}">https://wrmag.com/sign-up</a>
                            </p>
                            
                            <br>
                            <p style="line-height: 1.2">
                                Thank you,<br />
                                Team Quarterback Magazine<br /><br />
                                <a style="color:#1967d2; text-decoration:none;" href="mailto:catch@wrmag.com">catch@wrmag.com</a>

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <table class="table" cellpadding="7" cellspacing="0" border="0" width="100%"
                                style="width: 100%; font-size: 12px">
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top" {{-- style="border-bottom: 6px solid #ff0000" --}}>
                            <p style="text-align: center; margin: 5px">

                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
