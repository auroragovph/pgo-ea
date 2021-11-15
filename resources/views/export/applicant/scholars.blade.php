<table>
    <thead>
        <tr>
            <td>TN</td>
            <td>Name</td>
            <td>MUNICIPALITY</td>
            <td>BRGY</td>
            <td>School</td>
            <td>Contact</td>
        </tr>
    </thead>
    <tbody>
        @foreach($lists as $muni)
           @foreach($muni as $list)
            <tr>
                <td>{{ $list['tn'] }}</td>
                <td>{{ strtoupper($list['name']) }}</td>
                <td>{{ $list['mun'] }}</td>
                <td>{{ $list['brgy'] }}</td>
                <td>{{ $list['school'] }}</td>
                <td>{{ $list['contact'] }}</td>

            </tr>
           @endforeach
        @endforeach
    </tbody>
</table>