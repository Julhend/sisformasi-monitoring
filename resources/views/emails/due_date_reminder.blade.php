{{-- <!DOCTYPE html>
<html>

<head>
    <title>Due Date Reminder</title>
</head>

<body>
    <h1>Calibration Reminder</h1>
    <p>Hello {{ $item->name }},</p>
    <p>Your next calibration date is approaching. Please take action accordingly.</p>
    <p>Calibration Equipment Description: {{ $item->equipment_description }}</p>
    <p>Calibration Equipment Control Number: {{ $item->equip_control_no }}</p>
    <p>Next Calibration Date: {{ $item->next_cal->format('Y-m-d') }}</p>
</body>

</html> --}}


<!DOCTYPE html>
<html>

<head>
    <title>Pengingat Kalibrasi</title>
</head>

<body>
    <h1>Calibration Reminder</h1>
    <p>Hello {{ $item->name }},</p>
    <p>Tanggal kalibrasi berikutnya sudah dekat. Silakan mengambil tindakan yang sesuai.</p>
    <p>Kalibrasi Equipment Description: {{ $item->equipment_description }}</p>
    <p>Kalibrasi Equipment Control Number: {{ $item->equip_control_no }}</p>
    <p>Tanggal Kalibrasi Selanjutnya: {{ $item->next_cal->format('Y-m-d') }}</p>
</body>

</html>
