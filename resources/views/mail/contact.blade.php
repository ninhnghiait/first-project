<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ session('locale') }}">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>
      N-Shop
    </title>
    <style type="text/css">
    a:hover { text-decoration: none !important; }
    .header h1 {color: #fff !important; font: normal 33px Georgia, serif; margin: 0; padding: 0; line-height: 33px;}
    .header p {color: #dfa575; font: normal 11px Georgia, serif; margin: 0; padding: 0; line-height: 11px; letter-spacing: 2px}
    .content h2 {color:#8598a3 !important; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 30px; font-size: 30px;font-family: Georgia, serif; }
    .content p {color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 12px;font-family: Georgia, serif;}
    .content a {color: #d18648; text-decoration: none;}
    .footer p {padding: 0; font-size: 11px; color:#fff; margin: 0; font-family: Georgia, serif;}
    .footer a {color: #f7a766; text-decoration: none;}
    button {display: inline-block; font-weight: 400; text-align: center; white-space: nowrap; vertical-align: middle; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; border: 1px solid transparent; padding: .250rem .75rem; font-size: 1rem; line-height: 1.5; border-radius: .25rem; transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;background-color: transparent; background-image: none;}
    button a {font-size: 15px;}
    button.primary {border-color: #007bff;}
    button.primary a {color: #007bff;}
    button.secondary {border-color: #6c757d;}
    button.secondary a {color: #6c757d;}
    button.success {border-color: #28a745;}
    button.success a {color: #28a745;}
    button.danger {border-color: #dc3545;}
    button.danger a {color: #dc3545}
    button.warning {border-color: #ffc107;}
    button.warning a {color: #ffc107;}
    button.info {border-color: #17a2b8;}
    button.info a {color: #17a2b8;}
    button.dark {border-color: #343a40;}
    button.dark a {color: #343a40;}
    </style>
  </head>
  <body style="margin: 0; padding: 0; background: #bccdd9;">
    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
          <tr>
            <td align="center" style="margin: 0; padding: 0; background:#bccdd9 url('https://png.pngtree.com/thumb_back/fw800/20160721/pngtree-Lakeside-Shore-Water-Sky-background-photo-314156.jpg');padding: 35px 0">
                <table cellpadding="0" cellspacing="0" border="0" align="center" width="650" style="font-family: Georgia, serif;" class="header">
                  <tr>
                    <td bgcolor="#698291" height="115" align="center">
                        <h1 style="color: #fff !important; font: normal 33px Georgia, serif; margin: 0; padding: 0; line-height: 33px;"><singleline label="Title">N-Core</singleline></h1>
            <p style="color: #dfa575; font: normal 11px Georgia, serif; margin: 0; padding: 0; line-height: 11px;"><singleline label="Title">Code By NinhNghiaIt</singleline></p>
                    </td>
                  </tr>
                  <tr>
                      <td style="font-size: 1px; height: 5px; line-height: 1px;" height="5">&nbsp;</td>
                  </tr> 
                </table><!-- header-->
                <table cellpadding="0" cellspacing="0" border="0" align="center" width="650" style="font-family: Georgia, serif; background: #fff;" bgcolor="#ffffff">
                  <tr>
                    <td width="14" style="font-size: 0px;" bgcolor="#ffffff">&nbsp;</td>
                    <td width="620" valign="top" align="left" bgcolor="#ffffff" style="font-family: Georgia, serif; background: #fff; padding: 0 0 10px;" class="content">
                        <table cellpadding="0" cellspacing="0" border="0" style="color: #717171; font: normal 11px Georgia, serif; margin: 0; padding: 0;" width="620">
                        <tr>
                            <td style="padding: 25px 0 5px; border-bottom: 2px solid #d2b49b;font-family: Georgia, serif; " valign="top" align="center">
                                <h3 style="color:#767676; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 13px; font-size: 13px;">~ <currentmonthname /> <currentday />, <currentyear /> ~</h3>
                            </td>
                        </tr>
                        <repeater>
                        <tr>
                            <td valign="top" style="padding: 0; margin: 0">
                                <table cellpadding="0" cellspacing="0" border="0" style="color: #717171; font: normal 11px Georgia, serif; margin: 0; padding: 0;" width="620"> 
                                <tr>
                                    <td style="padding: 25px 0 0;" align="left">            
                                        <h2 style="color:#8598a3 !important; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 30px; font-size: 30px;font-family: Georgia, serif; "><singleline label="Title">Welcome to N-Core!</singleline></h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px 0 15px; border-bottom: 1px solid #d2b49b;" valign="top">                                       
                                        <img width="300" style="padding-bottom: 15px; padding-left: 15px;" align="right" editable="true" label="Image" />
                                        <p>
                                            <multiline label="Description">Name: </multiline>
                                            <singleline label="Title">{{ $arInfoMail->name }}</singleline>
                                        </p>
                                        <p>
                                            <multiline label="Description">Email: </multiline>
                                            <singleline label="Title">{{ $arInfoMail->email }}</singleline>
                                        </p>
                                        <p>
                                            <multiline label="Description">Phone: </multiline>
                                            <singleline label="Title">{{ $arInfoMail->phone }}</singleline>
                                        </p>
                                        <p>
                                            <multiline label="Description">Address: </multiline>
                                            <singleline label="Title">{{ $arInfoMail->address }}</singleline>
                                        </p>
                                        <p>
                                            <multiline label="Description">Created at: </multiline>
                                            <singleline label="Title">{{ $arInfoMail->created_at->toTimeString() }}</singleline>
                                        </p>
                                        <p>
                                            <multiline label="Description">Send at: </multiline>
                                            <singleline label="Title">{{ date('H:i:s') }}</singleline>
                                        </p>
                                    </td>
                                </tr>
                                
                                </table>
                            </td>
                        </tr>       
                        </repeater>
                        </table>
                        <br /><br />    
                    </td>
                    <td width="16" bgcolor="#ffffff" style="font-size: 0px; font-family: Georgia, serif; background: #fff;">&nbsp;</td>
                  </tr>
                </table><!-- body -->
                <table cellpadding="0" cellspacing="0" border="0" align="center" width="650" style="font-family: Georgia, serif; line-height: 10px;" bgcolor="#698291" class="footer">
                  <tr>
                    <td bgcolor="#698291" align="center" style="padding: 15px 0 10px; font-size: 11px; color:#fff; margin: 0; line-height: 1.2;font-family: Georgia, serif;" valign="top">
                        <p style="padding: 0; font-size: 11px; color:#fff; margin: 0; font-family: Georgia, serif;"> <singleline label="Title">N-Core NinhNghiaIt!</singleline></p>
                        <p style="padding: 0; font-size: 11px; color:#fff; margin: 0 0 8px 0; font-family: Georgia, serif;">Phone: <webversion style="color: #f7a766; text-decoration: none;">0974 155 708</webversion> - Address: <webversion style="color: #f7a766; text-decoration: none;">Danang, Vietnam</webversion> - Email: <webversion style="color: #f7a766; text-decoration: none;">ninhnghia2@gmail.com</webversion></p>
                    </td>
                  </tr>
                </table><!-- footer-->
            </td>
        </tr>
    </table>
  </body>
</html>
