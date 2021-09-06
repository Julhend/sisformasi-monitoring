
<style>
    #categories {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #categories td, #categories th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #categories tr:nth-child(even){background-color: #f2f2f2;}

    #categories tr:hover {background-color: #ddd;}

    #categories th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<table id="categories" width="100%">
    <thead>
    <tr>
        <td>Id</td>
        <td>Nama</td>
        <td>NIK</td>
        <td>No Hp</td>
        <td>Email</td>
        <td>Jabatan</td>
    </tr>
    </thead>
    @foreach($user as $c)
        <tbody>
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ $c->nik }}</td>
            <td>{{ $c->no_hp }}</td>
            <td>{{ $c->email }}</td>
            <td>{{ $c->role }}</td>
        </tr>
        </tbody>
    @endforeach

</table>



