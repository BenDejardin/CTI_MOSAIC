<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" language="javascript" src="bootstrap-4.4.1/js/jquery-3.4.1.js"></script>
    <script src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="bootstrap-4.4.1/js/bootstrap-datepicker.js"></script>
    <script src="bootstrap-4.4.1/js/bootstrap-datepicker.fr.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<script type="text/javascript">
    // Initialisation JQUERY
    $(document).ready(function() {
        // dateTraitement = '';
        // Site Boostrap datePicker 
        // https://bootstrap-datepicker.readthedocs.io/en/latest/options.html

        $('.periode').datepicker({
            maxViewMode: 2,
            language: "fr",
            orientation: "bottom left",
            //daysOfWeekDisabled: "0",
            calendarWeeks: true,
            todayHighlight: true,
            autoclose: true
        });

    });
</script>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <header class="masthead">
        <div class="container">
            <img src="img/logo.png"></td> <!-- logo du CTI de Melun -->
            <div class="text-center title">    
                <h1><?= $title ?></h1>
            </div>