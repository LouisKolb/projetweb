<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Événement : {{$event->name}}</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        * {
            font-family: Roboto;
        }

        a {
            text-decoration: none;
        }

        table {
            font-size: x-small;
        }

        .tab table {
            margin: 15px;
        }

        .header table {
            padding: 10px;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <table>
            <tr>
                <td align="left">
                    <img src="..\public\image\vrailogo.jpg" style="width: 30%;">
                </td>
                <h3>Événement {{$event->id}} : {{$event->name}}</h3>
            </tr>
        </table>
    </div>
    <br>
    <div class="tab">
        <table width="100%">
            <thead>
            <tr>
                <th> ID</th>
                <th> Prenom</th>
                <th> Nom</th>
                <th> Mail</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($event->participants() as $p)
            <tr>
                <td>
                    {{$p->id}}
                </td>
                <td>
                    {{$p->first_name}}
                </td>
                <td>
                    {{$p->last_name}}
                </td>
                <td>
                    {{$p->email}}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>