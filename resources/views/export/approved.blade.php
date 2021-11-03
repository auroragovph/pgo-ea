<table>
    <thead>
        <tr>
            <th>#</th>
            <th>TN</th>
            <th>Name</th>
            <th>Address</th>
            <th>School</th>
            <th>GWA</th>
            <th>Number</th>
        </tr>
    </thead>
    <tbody>
        @foreach($scholars as $scholar)
            <?php $applicant = $scholar->applicant; ?>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $applicant->id }}</td>
                <td>{{ name($applicant->name) }}</td>
                <td>{{ $applicant->personal['address']['present'] }}</td>
                <td>{{ $applicant->school['name'] }}</td>
                <td>{{ $applicant->school['gwa'] }}</td>
                <td>{{ $applicant->personal['contact_number'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>