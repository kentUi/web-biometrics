<style>
    table,
    td,
    tr,
    th {

        border-collapse: collapse;
        text-align: center;
        font-family: arial;
        font-size: 15px;
    }

    div {
        padding-left: 230px;
    }

    p {
        text-align: left;
        font-family: arial;
        font-size: 12px;
    }

    p.civil_service_title {
        text-align: left;
        font-family: arial;
        font-size: 10px;
    }

    p.civil_service_title2 {
        padding-left: 10px;
        font-family: arial;
        font-size: 12px;
    }

    p.name {
        padding-left: 170px;
        font-family: arial;
        font-size: 12px;
    }

    p.dtr {
        padding-left: 140px;
        font-family: arial;
        font-weight: bold;
        font-size: 16px;
    }

    p.circles {
        padding-left: 180px;
        font-family: arial;
        font-size: 12px;
    }

    p.line1 {
        padding-left: 40px;
        font-family: arial;
        font-size: 16px;
    }
</style>

<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous"></script>
<div class="container" style="padding: 0 !important">
    <div class="row"style="padding: 0 !important">
        <div class="column" id="result" style="padding: 0 !important">
            <p class="civil_service_title">Civil Service Form No. 48</p>
            <p class="dtr">DAILY TIME RECORD </p>
            <p class="circles">-----o0o-----</p>
            <center><b style="position: absolute; margin-left: -165px">{{ $name }}</b></center>
            <p class="line1" style="margin-top: 15px; margin-bottom: 0; padding-left: 0">
                ________________________________________</p>
            <p class="name"> (Name) </p>
            <center><small style="position: absolute; margin-left: -70px; font-weight: bold;">
                    @php
                        echo date_format(date_create($_GET['from']), 'F') . ' ' . substr($_GET['from'], 8, 10) . '-' . substr($_GET['to'], 8, 10) . ', ' . date_format(date_create($_GET['from']), 'Y');
                    @endphp
                </small>
            </center>
            <p class="civil_service_title2"> For the month of ______________________________________<br>
                <i>Official hours for arrival <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and departure </i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;

                Regular days &ensp;____________<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Saturdays &ensp; ______________
            </p>
            </EM></CAPTION>
            {{-- <button onclick="checkSum('<?php echo 'myTable' . $id; ?>')">check <?php echo 'myTable' . $id; ?></button>
             --}}
            <TABLE border="1" id="<?php echo 'myTable' . $id; ?>">

                <tr>
                    <th rowspan="2">Day
                    <th colspan="2">A.M.
                    <th colspan="2">P.M.
                    <th colspan="2">Undertime
                <TR>
                    <th><small>Arrival</small>
                    <th><small>Departure</small>
                    <th><small>Arrival</small>
                    <th><small>Departure</small>
                    <th><small>Hours</small>
                    <th><small>Minutes</small>
                        <tbody>
                            <?php 
                            for($day = 1; $day <= 31; $day++){
                                if($day < 10){
                                    $day = '0' . $day;
                                }
                            ?>
                            <tr>
                                <th><?= $day ?>
                                <td class="stamp" id="DAY<?= $day . substr($_GET['from'], 0, 8) . $day . $id ?>A1">
                                <td class="stamp" id="DAY<?= $day . substr($_GET['from'], 0, 8) . $day . $id ?>A2">
                                <td class="stamp" id="DAY<?= $day . substr($_GET['from'], 0, 8) . $day . $id ?>A3">
                                <td class="stamp" id="DAY<?= $day . substr($_GET['from'], 0, 8) . $day . $id ?>A4">
                                <td class="stamp" id="DIFF<?= $day . substr($_GET['from'], 0, 8) . $day . $id ?>A4">
                                <td class="stamp" id="DIFFMIN<?= $day . substr($_GET['from'], 0, 8) . $day . $id ?>A4">

                                    <?php  } ?>
                        </tbody>
                <tr>
                    <th colspan="5">
                        <div> Total </div>
                    <td><span id="TOTALHRS<?= $id ?>"></span>
                    <td><span id="TOTALMIN<?= $id ?>"></span>
            </table>
            <p>I certify on my honor that the above is a true and correct report of the
                hours of work performed, record of which was made daily at the time
                of arrival and departure from office. </p><br>
            ___________________________________________<br>

            <p> VERIFIED as to the prescribed office hours:</p><br>
            ___________________________________________<br>
            <p style="margin-top: 2px; margin-bottom: 2px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                In Charge </p>
        </div>
    </div>
</div>
<script>
    function htmlDecode(input) {
        const doc = new DOMParser().parseFromString(input, "text/html");
        return doc.documentElement.textContent;
    }
    var t_hrs = 0;
    var t_min = 0;

    function displayLogs() {
        const jsonString = htmlDecode('{{ $stamp }}');
        const jsonArray = JSON.parse(jsonString);
        jsonArray.sort((a, b) => {
            return new Date(a.log_datetime) - new Date(b.log_datetime);
        });

        const uniqueDatesSet = new Set();
        const data = [];

        jsonArray.forEach(obj => {
            const dateOnly = obj.log_datetime.slice(0, 10);
            uniqueDatesSet.add(dateOnly);
        });

        const distinctDatesArray = Array.from(uniqueDatesSet);


        distinctDatesArray.forEach(date => {
            const matchingElements = jsonArray.filter(obj => obj.log_datetime.startsWith(date));
            const userData = {
                'ID': jsonArray[0]['log_userid'],
                'DATES': date,
                'LOGS': matchingElements.map(obj => ({
                    'log_datetime': obj.log_datetime,
                    'log_userid': obj.log_userid,
                    'log_status': obj.log_status,
                }))
            };
            data.push(userData);
        });
        var idx = 0;

        var comhrs = 0;
        data.forEach(row => {
            assign = 1;
            row.LOGS.forEach((logs, index) => {
                //if (row.LOGS.length <= 4) {
                const options = {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true,
                };
                const logDatetime = new Date(logs['log_datetime']);
                const timeOnly = logDatetime.toLocaleTimeString('en-US', options);

                // Create a reference Date object for 8:00 AM
                const referenceTime = new Date(logDatetime);
                referenceTime.setHours(8, 0, 0, 0);

                // Calculate the time difference in milliseconds
                const timeDifferenceMs = logDatetime - referenceTime;

                // Convert milliseconds to hours and minutes
                const hours = Math.floor(timeDifferenceMs / (1000 * 60 * 60));
                const minutes = Math.floor((timeDifferenceMs % (1000 * 60 * 60)) / (1000 * 60));

                if (timeOnly.slice(6, 8) == "AM" && logs['log_status'] == 1010) {
                    document.getElementById('DAY' + row.DATES.slice(8, 10) + row.DATES + row.ID + 'A1')
                        .innerHTML = timeOnly;

                } else if (timeOnly.slice(6, 8) == "PM" && logs['log_status'] == 1110 &&
                    hours <= 8) {

                    document.getElementById('DAY' + row.DATES.slice(8, 10) + row.DATES + row.ID + 'A2')
                        .innerHTML = timeOnly;

                } else if (timeOnly.slice(6, 8) == "PM" && logs['log_status'] == 1010) {

                    document.getElementById('DAY' + row.DATES.slice(8, 10) + row.DATES + row.ID + 'A3')
                        .innerHTML = timeOnly;

                } else if (timeOnly.slice(6, 8) == "PM" && logs['log_status'] == 1110 &&
                    hours >= 8) {

                    document.getElementById('DAY' + row.DATES.slice(8, 10) + row.DATES + row.ID + 'A4')
                        .innerHTML = timeOnly;

                }




                console.log(`Time difference: ${hours} hours and ${minutes} minutes`);


                console.log(timeOnly.slice(6, 8))
                console.log(logs['log_status'])

                


                // if (index > 0) {
                //     const previousLogDatetime = new Date(row.LOGS[0]['log_datetime']);
                //     const timeDifference = computeTimeDifference(previousLogDatetime, logDatetime);
                //     var hrs = timeDifference.slice(0, 2) - 1;
                //     if (hrs < 0) {
                //         hrs = 0
                //     }

                    // var undertime = hrs - 8;
                    // var uHrs = '';
                    // var uMin = '';

                //     // if (undertime <= 0) {

                //     // } else {
                //     //     uHrs = hrs;
                //     //     uMin = timeDifference.slice(3, 5);
                //     // }

                    if(hours > 0){
                        uHrs = hours -1 ;
                        
                        //uMin = 60 - minutes;
                    }else{
                        uHrs = '';
                        uMin = '';
                    }

                    //uMin = timeDifference.slice(3, 5);

                    document.getElementById('DIFF' + row.DATES.slice(8, 10) + row.DATES + row
                        .ID +
                        'A4').innerHTML = uHrs; //hrs;
                    document.getElementById('DIFFMIN' + row.DATES.slice(8, 10) + row.DATES + row
                        .ID + 'A4').innerHTML = uMin; 

                //     var test = 0; //document.getElementById('DIFFMIN' + row.DATES.slice(8, 10) + row.DATES +
                //         //row
                //        // .ID + 'A4');

                //     //console.log(test.textContent);
                //     t_min = Number(t_min) + Number(test.textContent);
                //     //console.log(t_min);
                //     //console.log(row.ID + " : " + index, timeDifference.slice(3, 5));
                // }

                idx = row.ID;
                assign += 1;
                //}
            });
            comhrs += Number(uHrs);
            index = 0;
            assign = 1;
        });
        document.getElementById('TOTALHRS' + idx).innerHTML = '<small>' + comhrs + 'hrs</small>';
        document.getElementById('TOTALMIN' + idx).innerHTML = ''; //t_min;
        comhrs = 0;

    }
    displayLogs();

    function computeTimeDifference(startTime, endTime) {
        const startDateTime = new Date(startTime);
        const endDateTime = new Date(endTime);
        const timeDifference = Math.abs(endDateTime - startDateTime); // Time difference in milliseconds

        // Convert the time difference to hours and minutes
        const hours = Math.floor(timeDifference / (1000 * 60 * 60));
        const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));

        // Format the time difference as HH:mm
        const formattedTimeDifference = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}`;
        return formattedTimeDifference;
    }

    window.print();

    function checkSum(id) {
        const table = document.getElementById(id);
        const columnIndexToSum = 6; // Change this to your desired column index

        let totalSum = 0;

        // Start from row index 2 to skip headers
        for (let i = 1; i < table.rows.length; i++) {
            console.log(table.rows[i].cells[columnIndexToSum].textContent);
            // const cellValue = parseFloat(table.rows[i].cells[columnIndexToSum].textContent);

            // if (!isNaN(cellValue)) {
            //     totalSum += cellValue;
            //     console.log(cellValue);
            // }
        }

        console.log(totalSum.toFixed(2)); // Display the total sum with 2 decimal places
    }
</script>
