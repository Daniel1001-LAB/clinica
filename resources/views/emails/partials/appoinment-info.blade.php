<td align="center" valign="top" style="background: #1f7fd7; padding-top: 20px; padding-bottom: 20px;" bgcolor="#1f7fd7">
    <table cellpadding="0" cellspacing="0" border="0" width="75%"
        style="width: 75%; min-width: 330px; background: #FFFFFF; border-width: 1px; border-style: solid; border-color: #EAEAEA; box-shadow: 0px 2px 7px #000000; border-radius: 10px;">
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0" border="0" width="93%"
                    style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;">
                    <tr>
                        <td align="left">
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                            </div>
                            <div class="Roboto400"
                                style="font-family: Arial, sans-serif; color: #1f7fd7; font-size: 15px; line-height: 21px;">
                                <span style="text-decoration: underline;"><span
                                        style="color: #1f7fd7; text-decoration: underline;">Appointment
                                        name:</span></span>
                            </div>
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                            </div>
                        </td>
                        <td width="10" style="width: 10px;">&nbsp;</td>
                        <td align="left" width="50%" style="width: 50%; max-width: 50%; min-width: 190px;">
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                            </div>
                            <div class="Roboto400"
                                style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                {{$appoinment->patient->name}}-{{Illuminate\Support\Str::random(5)}}</div>
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                            </div>
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" border="0" width="93%"
                    style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;">
                    <tr>
                        <td align="left">
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                            </div>
                            <div class="Roboto400"
                                style="font-family: Arial, sans-serif; color: #1f7fd7; font-size: 15px; line-height: 21px;">
                                <span style="text-decoration: underline;"><span
                                        style="color: #1f7fd7; text-decoration: underline;">Date:</span></span>
                            </div>
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                            </div>
                        </td>
                        <td width="10" style="width: 10px;">&nbsp;</td>
                        <td align="left" width="50%" style="width: 50%; max-width: 50%; min-width: 190px;">
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                            </div>
                            <div class="Roboto400"
                                style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                {{$appoinment->date}}</div>
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                            </div>
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" border="0" width="93%"
                    style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;">
                    <tr>
                        <td align="left">
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                            </div>
                            <div class="Roboto400"
                                style="font-family: Arial, sans-serif; color: #1f7fd7; font-size: 15px; line-height: 21px;">
                                <span style="text-decoration: underline;"><span
                                        style="color: #1f7fd7; text-decoration: underline;">Time:</span></span>
                            </div>
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                            </div>
                        </td>
                        <td width="10" style="width: 10px;">&nbsp;</td>
                        <td align="left" width="50%" style="width: 50%; max-width: 50%; min-width: 190px;">
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                            </div>
                            <a href="tel:+14843559888" target="_blank" class="Roboto400"
                                style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px; text-decoration: none; white-space: nowrap;">{{$appoinment->hour}}<br></a>
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                            </div>
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" border="0" width="93%"
                    style="width: 93%; min-width: 300px;">
                    <tr>
                        <td width="10" style="width: 10px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <div style="height: 10px; line-height: 10px; font-size: 8px;">&nbsp;</div>
</td>
