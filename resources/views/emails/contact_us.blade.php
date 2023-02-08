<!-- © 2018 Shift Technologies. All rights reserved. -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;background-color:#f9f9f9"
    id="bodyTable">
    <tbody>
        <tr>
            <td style="padding-right:10px;padding-left:10px;" align="center" valign="top" id="bodyCell">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperBody"
                    style="max-width:600px">
                    <tbody>
                        <tr>
                            <td align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="space">
                                    <tbody>
                                        <tr>
                                            <td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableCard"
                                    style="background-color:#fff;border-color:#e5e5e5;border-style:solid;border-width:0 1px 1px 1px;">
                                    <tbody>
                                        <tr>
                                            <td style="background-color:#047edf;font-size:1px;line-height:3px"
                                                class="topBorder" height="3">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 60px; padding-bottom: 20px;" align="center"
                                                valign="middle" class="emailLogo">
                                                <a href="https://www.dalcolc.com" style="text-decoration:none"
                                                    target="_blank">
                                                    <img alt="" border="0"
                                                        src="http://email.aumfusion.com/vespro/img/hero-img/blue/logo.png"
                                                        style="width:100%;max-width:150px;height:auto;display:block"
                                                        width="150">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-bottom: 5px; padding-left: 20px; padding-right: 20px;"
                                                align="center" valign="top" class="mainTitle">
                                                <h2 class="text"
                                                    style="color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:25px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0">
                                                    Client Name: {{$mailData['name']}}
                                                </h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-bottom: 5px; padding-left: 20px; padding-right: 20px;"
                                                align="center" valign="top" class="mainTitle">
                                                <h2 class="text"
                                                    style="color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:23px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0">
                                                    Email From: {{$mailData['email']}}
                                                </h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-bottom: 5px; padding-left: 20px; padding-right: 20px;"
                                                align="center" valign="top" class="mainTitle">
                                                <h2 class="text"
                                                    style="color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:20px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0">
                                                    phone:
                                                </h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-bottom: 30px; padding-left: 20px; padding-right: 20px;"
                                                align="center" valign="top" class="subTitle">
                                                <h4 class="text"
                                                    style="color:#999;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:24px;text-transform:none;text-align:center;padding:0;margin:0">
                                                    Subject: {{$mailData['subject']}}
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:20px;padding-right:20px" align="center"
                                                valign="top" class="containtTable ui-sortable">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                    class="tableDescription" style="">
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding-bottom: 20px;" align="center"
                                                                valign="top" class="description">
                                                                <p class="text"
                                                                    style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;text-align:center;padding:0;margin:0">
                                                                    {{$mailData['body']}}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:1px;line-height:1px" height="20">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle" style="padding-bottom:40px;"
                                                class="emailRegards">
                                                <!-- Image and Link // -->
                                                <a href="https://www.dalcolc.com" target="_blank"
                                                    style="color:#fff;
                                                    background:linear-gradient(to right, #90caf9, #047edf 99%);
                                                    padding: 1rem 3rem;
                                                    border-radius: 50px;
                                                font-family:Poppins,Helvetica,Arial,sans-serif;
                                                font-size:15px;font-weight:600;
                                                font-style:normal;letter-spacing:1px;
                                                line-height:20px;text-transform:uppercase;
                                                text-decoration:none;">
                                                    Dalco System
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="space">
                                    <tbody>
                                        <tr>
                                            <td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
