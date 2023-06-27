<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reporte de Ventas</title>

    <!-- cargar a través de la url del sistema -->
    <!--
  <link rel="stylesheet" href="{{ asset('css/custom_pdf.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom_page.css') }}">
 -->
    <!-- ruta física relativa OS -->
    <link rel="stylesheet" href="{{ public_path('css/custom_pdf.css') }}">
    <link rel="stylesheet" href="{{ public_path('css/custom_page.css') }}">

</head>

<body>

    <section class="header" style="top: -287px;">
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td colspan="3" class="text-center">
                    <span style="font-size: 25px; font-weight: bold;">Resumen de Entrevista Medica</span>
                </td>
            </tr>
            <tr>
                <td width="20%" style="vertical-align: top; padding-top: 10px; position: relative">
                    <img class="img-rounded" src="{{ asset('assets/onlyLogov1.svg') }}" style="background: white"
                        alt="" class="invoice-logo">
                </td>
                <td width="50%" class="text-left text-company" style="vertical-align: top; padding-top: 10px">
                    <br>
                    <span style="font-size: 16px"><strong>ENTREVISTA MEDICA <strong
                                style="color: #175da4">#{{ $patient->id }}{{ $interview->id }}</span>
                    <br>
                    <span style="font-size: 16px"><strong>Fecha de Consulta: {{ $interview->date }}</strong></span>
                    <br>
                    <span style="font-size: 14px">Paciente: <strong
                            style="color: #175da4">{{ $patient->name }}</strong></span>
                </td>
                <td width="30%" class="text-left text-company" style="vertical-align: top; padding-top: 10px">
                    <span style="font-size: 14px"><strong>RESUMEN GENERAL: <strong style="color: #175da4"></span>
                    <br>
                    <span style="font-size: 12px"><strong>Doctor: <strong
                                style="color: #175da4">{{ $doctor->name }}</span>
                    <br>
                    <span style="font-size: 12px"><strong>Paciente: {{ $patient->name }}</strong></span>
                    <br>
                    <span style="font-size: 12px">Sexo: <strong
                            style="color: #175da4">{{ $patient->gender }}</strong></span>
                    <br>
                    <span style="font-size: 12px">Edad: <strong
                            style="color: #175da4">{{ \Carbon\Carbon::parse($patient->birthdate)->diffInYears() }} años</strong></span>
                    <br>
                    <span style="font-size: 12px">Tel: <strong
                            style="color: #175da4">{{ $patient->phone }}</strong></span>
                </td>


    </section>
    <section>
        <span style="font-size: 16px"><strong>Medicamentos recetados:</strong> </span>
        <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
            <thead>
                <tr>
                    <th width="10%">MEDICAMENTO</th>
                    <th width="40%">DOSIS</th>
                    <th width="50%">INSTRUCCIONES</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($patient_medicines as $medicine)
                    <tr>
                        <td align="center">{{ $medicine->name }}</td>
                        <td align="center">{{ $medicine->pivot->dosage }}</td>
                        <td align="center">{{ $medicine->pivot->instruction }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-center">
                        <span><b>SINTOMAS:</b></span>
                    </td>
                    <td colspan="2" class="text-center">
                        @foreach ($patient_symptoms as $ps)
                            <small><strong>{{ $ps->name }}</strong></small>
                        @endforeach
                    </td>
                </tr>
            </tfoot>
        </table>
    </section>

    <section style="margin-top: 6rem">
        <span style="font-size: 14px"><strong>RESUMEN DE CONSULTA:</strong></span>
        <table cellpadding="0" cellspacing="0" class="" width="100%">
            <thead>
                <tr>
                    <th width="50%">El paciente presento:</th>
                    <th width="50%">Se le diagnostico:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="">{{ $interview->suspicion }}</td>
                    <td align="">{{ $interview->diagnosis }}</td>
                </tr>
            </tbody>

        </table>
    </section>



    <section class="footer">

        <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
            <tr>
                <td width="20%">
                    <span>UAPS SAN LUIS PLANES</span>
                </td>
                <td width="60%" class="text-center">
                    Tel: +504 95998871
                </td>
                <td class="text-center" width="20%">
                    página <span class="pagenum"></span>
                </td>

            </tr>
        </table>
    </section>

</body>

</html>
