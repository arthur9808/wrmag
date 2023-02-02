<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
      "
    >
      Quarterback Magazine
    </div>
    <table
      border="0"
      cellpadding="0"
      cellspacing="0"
      height="100%"
      width="100%"
      id="bodyTable"
    >
      <tr>
        <td align="center" valign="top" style="padding: 0 20px">
          <table
            border="0"
            cellpadding="20"
            cellspacing="0"
            width="100%"
            id="emailContainer"
            style="
              min-width: 500px;
              width: 100%;
              max-width: 700px;
              background-color: #fff;
              color: #333;
              border: 2px solid #ccc;
            "
          >
            <tr>
              <td align="center" valign="top">
                <p style="text-align: center; margin: 5px">
                  <a href="https://wrmag.com.com/sign-in/" title="Go to login"
                    ><img
                      src="{{ url('/template/assets/img/3QB-Magazine-logo.png') }}"
                      width="174"
                      height="105"
                      alt="Go to login"
                  /></a>
                </p>
              </td>
            </tr>
            <tr>
              <td
                align="left"
                valign="top"
                style="
                  font-size: 18px;
                  font-family: Arial, sans-serif;
                  color: #2d323c;
                "
              >
                <h1 style="text-align: center">
                  <strong>We have created an account for you</strong>
                </h1>
                <br>
                <p style="line-height: 1.2">
                  Hi {{ $f_name }},
                </p>
                <br>
                <p style="line-height: 1.2">
                  We have created your recruiting profile on our state of the art marketing platform.  Below are your login credentials.
                </p>
                <br>
                <p style="line-height: 1.2">
                  Your username is: {{ $username }} <br>
                  Your password is: {{ $password }}
                </p>
                <br>
                <p style="line-height: 1.2; text-align:center;">
                  <a style="color:#1967d2"  href="{{ url('/') }}">{{ url('/') }}</a>
                </p>
                <br>

                <p style="line-height: 1.2">
                  Thank you,<br />
                  Team Quarterback Magazine
                </p>
              </td>
            </tr>
            <tr>
              <td align="center" valign="top">
                
              </td>
            </tr>
            <tr>
              <td
                align="center"
                valign="top"
                {{-- style="border-bottom: 6px solid #ff0000" --}}
              >
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
