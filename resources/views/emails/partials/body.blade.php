<td align="center" valign="top" style="background: #1f7fd7;" bgcolor="#1f7fd7">
    <div style="height: 60px; line-height: 60px; font-size: 8px;">&nbsp;</div>
    <table cellpadding="0" cellspacing="0" border="0" width="75%"
        style="width: 75%; min-width: 330px; border-radius: 10px; border-color: #ffffff; border-width: 17px; border-style: solid;">
        <tr>
            <td align="left" bgcolor="#FFFFFF" style="background-color: #ffffff;">
                <div class="NunitoSans400"
                    style="font-family: Arial, sans-serif; color: #FFFFFF; font-size: 15px; line-height: 21px;">
                    <span style="color: #1f7fd7;">Hola! {{ $appoinment->patient->name }},</span><br><br><span
                        style="color: #1f7fd7;">Confirmando tu cita con {{ $appoinment->doctor->name }} el
                        {{ $appoinment->date }} a las {{ $appoinment->hour }}. Por favor, revisa los detalles a
                        continuación:</span>
                </div>
                <div style="height: 30px; line-height: 30px; font-size: 8px;">&nbsp;</div>
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tr>
                        <td align="left" bgcolor="#ffffff"
                            style="padding-left: 40px; padding-right: 40px; background-color: #ffffff;">
                            <div class="NunitoSans400"
                                style="font-family: Arial, sans-serif; color: #1f7fd7; font-size: 15px; line-height: 24px;">
                                <strong>Appointment Details:</strong><br>
                                <strong>Date:</strong> {{ $appoinment->date }}<br>
                                <strong>Time:</strong> {{ $appoinment->hour }}<br>
                                <strong>Location:</strong> {{ $appoinment->office->local }}<br>
                                <strong>Additional Notes:</strong><br>
                                {{ $appoinment->description }}
                            </div>
                        </td>
                    </tr>
                </table>
                <div style="height: 30px; line-height: 30px; font-size: 8px;">&nbsp;</div>
                <div class="NunitoSans400"
                    style="font-family: Arial, sans-serif; color: #1f7fd7; font-size: 15px; line-height: 24px;">
                    Si tienes alguna pregunta o necesitas reprogramar, por favor contáctanos a través de daniel@gmail.com o +504-95998871.
                </div>
                <div style="height: 60px; line-height: 60px; font-size: 8px;">&nbsp;</div>
            </td>
        </tr>
    </table>
    <div style="height: 40px; line-height: 40px; font-size: 8px;">&nbsp;</div>
</td>
