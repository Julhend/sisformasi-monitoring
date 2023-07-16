<style>
    /* Your existing CSS styles here */

    .table-container {
        width: 100%;
        overflow-x: auto;
    }

    .table-container table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        white-space: nowrap;
    }

    .table-container td,
    .table-container th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .table-container tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table-container tr:hover {
        background-color: #ddd;
    }

    .table-container th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

    /* Optional: Adjust the table font size for better fit */
    .table-container table {
        font-size: 6.5px;
        /* Adjust font size for better fit on paper */
    }

    /* Additional styles for print media */
    @media print {
        .table-container {
            overflow-x: hidden;
            /* Prevent horizontal overflow on print */
            width: auto;
            /* Reset width for print layout */
        }

        .table-container table {
            width: 100%;
        }

        .table-container th,
        .table-container td {
            padding: 5px;
            /* Adjust padding for better fit on paper */
        }

        /* Prevent table rows from breaking across pages */
        .table-container tr {
            page-break-inside: avoid;
        }
    }

    h1 {
        font-size: 10px;
        /* Adjust the font size for the main title */
        font-weight: bold;
        /* Optionally adjust the font weight */
        text-align: center;
        /* Optionally center-align the main title */
        margin-bottom: 10px;
        /* Optionally add some space below the main title */
    }

    h2 {
        font-size: 9px;
        /* Adjust the font size for the subheading */
        font-weight: normal;
        /* Optionally adjust the font weight */
        font-style: italic;
        text-decoration: underline;
        text-align: center;
        /* Optionally center-align the subheading */
        margin-bottom: 20px;
        /* Optionally add some space below the subheading */
    }
</style>


<h1>PT A & ONE PRECISION ENGINEERING</h1>
<h2>MASTER LIST CALIBRATION @if ($startDate && $endDate)
        ({{ date('Y', strtotime($startDate)) }} - {{ date('Y', strtotime($endDate)) }})
    @endif
</h2>
<div class="table-container">
    <table id="categories">
        <thead>
            <tr>
                <td>No</td>
                <td>Equipment Description</td>
                <td>Range</td>
                <td>Equip Control No</td>
                <td>Inspection Metdod</td>
                <td>Aceptance Criteria</td>
                <td>Frequency</td>
                <td>Date Cal</td>
                <td>Next Cal</td>
                <td>Dept</td>
                <td>Instrument Serial No</td>
                <td>Remark</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            @php
                $rowNumber = 1; // Initialize a variable to track the row number
            @endphp
            @foreach ($masterlist as $m)
                <tr>
                    <td>{{ $rowNumber }}</td>
                    <td>{{ $m->equipment_description }}</td>
                    <td>{{ $m->range }}</td>
                    <td>{{ $m->equip_control_no }}</td>
                    <td>{{ $m->inspection_method }}</td>
                    <td>{{ $m->acceptance_kriteria }}</td>
                    <td>{{ $m->frequency }}</td>
                    <td>{{ $m->date_cal }}</td>
                    <td>{{ $m->next_cal }}</td>
                    <td>{{ $m->dept }}</td>
                    <td>{{ $m->instrument_serial_number }}</td>
                    <td>{{ $m->remark }}</td>
                    <td>{{ $m->status }}</td>
                </tr>
                @php
                    $rowNumber++; // Increment the row number for the next iteration
                @endphp
            @endforeach
        </tbody>
    </table>
</div>


{{-- <div style="margin-top: 20px; width: 100%;">
    <div style="float: left; width: 50%;">
        <strong>Sign:</strong>________________________
    </div>
    <div style="float: right; width: 50%; text-align: right;">
        <strong>Name:</strong>________________________
    </div>
</div> --}}
