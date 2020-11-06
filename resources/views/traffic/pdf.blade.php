<html>
<head>
{{--<!-- Styles -->--}}
{{--    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">--}}
</head>
<body class="font-sans antialiased">

{{--    Heading for traffic--}}
    <div style="background-color: beige;">
        <h1 style="border: 1px solid #999999; text-transform: uppercase; margin:0; padding-left: 5px">
            Check {{ $traffic->io }}: {{ $traffic->make }} {{ $traffic->model }} S/N:{{ $traffic->sn }}
        </h1>

        <div style="clear:left; float:left; width: 100%;">
            <div style="float:left; position: relative; width: 100%;">
                <div style="float: left; width:100%; text-transform: uppercase; border: 1px solid #999; border-top: none; border-right: none; padding-left: 10px">
                    @if(!is_null($traffic->hours)) {{ $traffic->hours }} hours @endif
                </div>
                <div style="float: left; width:100%; text-transform: uppercase; text-align: right; border: 1px solid #999; border-top: none; border-left: none; padding-right: 10px">
                    {{ $traffic->date_for_display }} by {{ $enteredBy->name }}
                </div>
            </div>
        </div>
    </div>

{{--Traffic table with details--}}
    <div style="margin-top:35px; padding-bottom: 10px;">
        <table style="border:1px solid #999999; width: 100%;">
            <tr>
                <td style="text-transform: uppercase; font-weight: bold; width: 100%; border-bottom:1px solid #999999; padding:5px; margin-bottom:0; background-color:#eeeeee;">
                    Branch
                </td>
            </tr>
            <tr>
                <td style="text-transform: uppercase; width: 100%; margin-top:0; padding:5px;">
                    {{ $traffic->branch }}
                </td>
            </tr>
            <tr>
                <td style="text-transform: uppercase; font-weight: bold; width: 100%; border-bottom:1px solid #999999; padding:5px; margin-bottom:0; background-color:#eeeeee;">
                    Customer
                </td>
            </tr>
            <tr>
                <td style="text-transform: uppercase; width: 100%; margin-top:0; padding:5px;">
                    {{ $traffic->customer }}
                </td>
            </tr>
            <tr>
                <td style="text-transform: uppercase; font-weight: bold; width: 100%; border-bottom:1px solid #999999; padding:5px; margin-bottom:0; background-color:#eeeeee;">
                    Salesman
                </td>
            </tr>
            <tr>
                <td style="text-transform: uppercase; width: 100%; margin-top:0; padding:5px;">
                    {{ $traffic->salesman }}
                </td>
            </tr>
            <tr>
                <td style="text-transform: uppercase; font-weight: bold; width: 100%; border-bottom:1px solid #999999; padding:5px; margin-bottom:0; background-color:#eeeeee;">
                    Fuel
                </td>
            </tr>
            <tr>
                <td style="text-transform: uppercase; width: 100%; margin-top:0; padding:5px;">
                    {{ $traffic->fuel }}
                </td>
            </tr>
            <tr>
                <td style="text-transform: uppercase; font-weight: bold; width: 100%; padding:5px; margin-bottom:0; @if($traffic->damages == 'Yes') background-color:#fed7d7; border-bottom:1px solid #e53e3e; @else background-color:#eeeeee; border-bottom:1px solid #999999; @endif">
                    Damages
                </td>
            </tr>
            <tr>
                <td style="text-transform: uppercase; width: 100%; margin-top:0; padding:5px;">
                    {{ $traffic->damages }}
                </td>
            </tr>
            <tr>
                <td style="text-transform: uppercase; font-weight: bold; width: 100%; border-bottom:1px solid #999999; padding:5px; margin-bottom:0; background-color:#eeeeee;">
                    Attachments
                </td>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li>
                            {{ $traffic->attachments }}
                        </li>
                        <li>
                            coverletter_back_end_developer.pdf
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>

{{--Images for the traffics--}}
    <table>
        @foreach($traffic->details->chunk(2) as $detail)
            <tr style="width: 100%;">
            @foreach($detail as $image)
            <td style="width: 50%; vertical-align: top;">
                    <img style="width:100%;" src="{{ public_path() }}\details\{{ $image->name }}"/>
            </td>
            @endforeach
            </tr>
        @endforeach
    </table>

</body>
</html>
