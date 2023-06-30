<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CITA CONFIRMADA</title>
</head>

<body>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#f1f1f1">
        <tr>
            {{-- @include('emails.partials.header') --}}

        </tr>
        <tr>
            @include('emails.partials.image')
        </tr>
        <tr>
            @include('emails.partials.body')
        </tr>
        <tr>
            @include('emails.partials.appoinment-info')
        </tr>
        <tr>
            @include('emails.partials.appoinment-message')
        </tr>
        <tr em="block">
            <td align="center" valign="top" style="background: #1f7fd7;" bgcolor="#1f7fd7">
                <div style="height: 60px; line-height: 60px; font-size: 8px;">&nbsp;</div>
            </td>
        </tr>
        <tr>
            {{-- @include('emails.partials.footer') --}}
        </tr>
    </table>
</body>

</html>
