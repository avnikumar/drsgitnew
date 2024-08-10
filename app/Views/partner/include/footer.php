<!--  Scripts -->
<script src="<?= base_url('public/inner/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/jquery-migrate.js') ?>"></script>
<script src="<?= base_url('public/inner/js/popper.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/charts.js') ?>"></script>
<script src="<?= base_url('public/inner/js/final-countdown.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/fancy-box.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/fullcalendar.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/datatables.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/circle-progress.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/nice-select.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/pikaday.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/main.js') ?>"></script>

<script>
    /*
    $(document).ready(function() {
        $("#crancy-table__main").DataTable({
            searching: true, // Enable search functionality
            info: true,
            lengthChange: true, // Enable the ability to change the number of records per page
            pageLength: 6,
            lengthMenu: [
                [6, 14, 25, 50, -1],
                [6, 14, 25, 50, "All"],
            ],
            language: {
                paginate: {
                    next: '<i class="fas fa-angle-right"></i>',
                    previous: '<i class="fas fa-angle-left"></i>',
                },
                lengthMenu: "Show result: _MENU_ ", // Customize the "Show entries" text
            },
            dom: 'rt<"crancy-table-bottom"flp><"clear">', // Set the desired layout for the table
        });
    });*/
</script>
<script>
    /*
    var picker = new Pikaday({
        field: document.getElementById("dateInput")
    });
    // Create a new instance of Pikaday for the date-input field
    const picker1 = new Pikaday({
        field: document.getElementById("date-input"),
        format: "MMM DD", // Set the desired format
        toString(date, format) {
            const day = date.getDate();
            const month = date.toLocaleString("default", {
                month: "short"
            });
            const formattedDate = `${day} ${month}`;
            return formattedDate;
        },
    });

    // Create another instance of Pikaday for the dateInput field
    const picker2 = new Pikaday({
        field: document.getElementById("date-input2"),
        format: "MMM DD", // Set the desired format
        toString(date, format) {
            const day = date.getDate();
            const month = date.toLocaleString("default", {
                month: "short"
            });
            const formattedDate = `${day} ${month}`;
            return formattedDate;
        },
    });
    */
</script>

<script>
    /*
    document.addEventListener("DOMContentLoaded", function() {
        var calendarEl = document.getElementById("crancy-calender");
        var calendar = new FullCalendar.Calendar(calendarEl, {
            defaultView: "timeGridWeek",
            contentHeight: "auto",
            height: "100%",
            fixedWeekCount: false,
            showNonCurrentDates: true,
            columnHeaderFormat: {
                week: "ddd",
            },
        });
        calendar.render();
    });
    */
</script>

<script>
    /*
    jQuery(document).ready(function($) {
        $(".circle__one").circleProgress({
            size: 82,
            thickness: 8,
            lineCap: "round",
            fill: {
                // the fill color and border radius of the progress bar
                color: "#194BFB",
                borderRadius: "5px",
            },
            border: {
                // the border color, width, and border radius of the progress bar
                color: "#000",
                width: 5,
                borderRadius: "315px",
            },
            emptyFill: "#CEE6FF", // the background color of the progress bar
        });

        $(".circle__two").circleProgress({
            lineCap: "round",
            fill: {
                // the fill color and border radius of the progress bar
                color: "#EF5DA8",
                borderRadius: "50px",
            },
            border: {
                // the border color, width, and border radius of the progress bar
                color: "#000",
                width: 50,
                borderRadius: "50px",
            },
            emptyFill: "#FCDFEE", // the background color of the progress bar
        });

        $(".circle__three").circleProgress({
            lineCap: "round",
            fill: {
                // the fill color and border radius of the progress bar
                color: "#27AE60",
                borderRadius: "50px",
            },
            border: {
                // the border color, width, and border radius of the progress bar
                color: "#000",
                width: 50,
                borderRadius: "50px",
            },
            emptyFill: "#D4EFDF", // the background color of the progress bar
        });

        $(".circle__four").circleProgress({
            lineCap: "round",
            fill: {
                // the fill color and border radius of the progress bar
                color: "#9B51E0",
                borderRadius: "50px",
            },
            border: {
                // the border color, width, and border radius of the progress bar
                color: "#000",
                width: 50,
                borderRadius: "50px",
            },
            emptyFill: "#EBDCF9", // the background color of the progress bar
        });

        $(".circle_side_one").circleProgress({
            startAngle: -Math.PI / 1,
            lineCap: "round",
            size: 250,
            fill: {
                // the fill color and border radius of the progress bar
                color: "#9B51E0",
                borderRadius: "10px",
            },
            border: {
                // the border color, width, and border radius of the progress bar
                color: "#000",
                width: 190,
                borderRadius: "10px",
            },
            emptyFill: "#D7B9F3", // the background color of the progress bar
        });

        $(".circle_side_two").circleProgress({
            startAngle: -Math.PI / 3,
            lineCap: "round",
            size: 250,
            fill: {
                // the fill color and border radius of the progress bar
                color: "#0A82FD",
                borderRadius: "50px",
            },
            border: {
                // the border color, width, and border radius of the progress bar
                color: "#000",
                width: 190,
                borderRadius: "50px",
            },
            emptyFill: "#9DCDFE", // the background color of the progress bar
        });

        $(".circle_side_three").circleProgress({
            startAngle: -Math.PI / 2,
            lineCap: "round",
            size: 250,
            fill: {
                // the fill color and border radius of the progress bar
                color: "#F2C94C",
                borderRadius: "50px",
            },
            border: {
                // the border color, width, and border radius of the progress bar
                color: "#000",
                width: 190,
                borderRadius: "50px",
            },
            emptyFill: "#FAE9B7", // the background color of the progress bar
        });
    });
    */
</script>
<script>
    // Chart Seven
    /*
    const ctx_net1 = document
        .getElementById("myChart_Net_Income")
        .getContext("2d");
    const gradientBg_chart1 = ctx_net1.createLinearGradient(0, 0, 0, 150);
    gradientBg_chart1.addColorStop(0, "rgba(25, 75, 251, 0.40) ");
    gradientBg_chart1.addColorStop(0.3, "rgba(25, 75, 251, 0.00)");

    const myChart_Net_Income = new Chart(ctx_net1, {
        type: "line",

        data: {
            labels: [
                "1",
                "2",
                "3",
                "4",
                "5",
                "6",
                "7",
                "8",
                "9",
                "10",
                "11",
                "12",
                "13",
                "14",
                "15",
                "16",
                "17",
                "18",
                "19",
                "20",
                "21",
                "22",
                "23",
                "24",
            ],
            datasets: [{
                label: "Total Sells",
                data: [
                    20, 10, 20, 5, 30, 10, 20, 40, 30, 45, 50, 40, 60, 50, 20, 45,
                    60, 40, 35, 30, 25, 30, 25, 20,
                ],
                backgroundColor: gradientBg_chart1,
                borderColor: "#194BFB",
                pointRadius: 0,
                borderWidth: 1,
                fill: true,
                fillColor: "#fff",
            }, ],
        },

        options: {
            layout: {
                padding: {
                    bottom: -20,
                    left: -20,
                },
            },
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                x: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: false,
                    },
                    suggestedMax: 10,
                    suggestedMin: 30,
                },

                y: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: false,
                    },
                    suggestedMax: 10,
                    suggestedMin: 30,
                },
            },

            plugins: {
                tooltip: {
                    padding: 10,
                    displayColors: true,
                    yAlign: "bottom",
                    backgroundColor: "#fff",
                    titleColor: "#000",
                    titleFont: {
                        weight: "normal"
                    },
                    bodyColor: "#2F3032",
                    cornerRadius: 12,
                    boxPadding: 3,
                    usePointStyle: true,
                    borderWidth: 0,
                    font: {
                        size: 14,
                    },
                    caretSize: 9,
                    bodySpacing: 100,
                },
                legend: {
                    position: "bottom",
                    display: false,
                },
                title: {
                    display: false,
                    text: "Visitor: 2k",
                },
            },
        },
    });

    // Chart Seven
    const ctx_net2 = document
        .getElementById("myChart_Net_Income2")
        .getContext("2d");
    const gradientBg_chart2 = ctx_net2.createLinearGradient(0, 0, 0, 150);
    gradientBg_chart2.addColorStop(0, "rgba(25, 75, 251, 0.40) ");
    gradientBg_chart2.addColorStop(0.3, "rgba(25, 75, 251, 0.00)");

    const myChart_Net_Income2 = new Chart(ctx_net2, {
        type: "line",

        data: {
            labels: [
                "1",
                "2",
                "3",
                "4",
                "5",
                "6",
                "7",
                "8",
                "9",
                "10",
                "11",
                "12",
                "13",
                "14",
                "15",
                "16",
                "17",
                "18",
                "19",
                "20",
                "21",
                "22",
                "23",
                "24",
            ],
            datasets: [{
                label: "Total Sells",
                data: [
                    20, 10, 20, 5, 30, 10, 20, 40, 30, 45, 50, 40, 60, 50, 20, 45,
                    60, 40, 35, 30, 25, 30, 25, 20,
                ],
                backgroundColor: gradientBg_chart2,
                borderColor: "#194BFB",
                pointRadius: 0,
                borderWidth: 1,
                fill: true,
                fillColor: "#fff",
            }, ],
        },

        options: {
            layout: {
                padding: {
                    bottom: -20,
                    left: -20,
                },
            },
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                x: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: false,
                    },
                    suggestedMax: 10,
                    suggestedMin: 30,
                },

                y: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: false,
                    },
                    suggestedMax: 10,
                    suggestedMin: 30,
                },
            },

            plugins: {
                tooltip: {
                    padding: 10,
                    displayColors: true,
                    yAlign: "bottom",
                    backgroundColor: "#fff",
                    titleColor: "#000",
                    titleFont: {
                        weight: "normal"
                    },
                    bodyColor: "#2F3032",
                    cornerRadius: 12,
                    boxPadding: 3,
                    usePointStyle: true,
                    borderWidth: 0,
                    font: {
                        size: 14,
                    },
                    caretSize: 9,
                    bodySpacing: 100,
                },
                legend: {
                    position: "bottom",
                    display: false,
                },
                title: {
                    display: false,
                    text: "Visitor: 2k",
                },
            },
        },
    });

    // Chart Seven
    const ctx_net3 = document
        .getElementById("myChart_Net_Income3")
        .getContext("2d");
    const gradientBg_chart3 = ctx_net3.createLinearGradient(0, 0, 0, 150);
    gradientBg_chart3.addColorStop(0, "rgba(25, 75, 251, 0.40) ");
    gradientBg_chart3.addColorStop(0.3, "rgba(25, 75, 251, 0.00)");

    const myChart_Net_Income3 = new Chart(ctx_net3, {
        type: "line",

        data: {
            labels: [
                "1",
                "2",
                "3",
                "4",
                "5",
                "6",
                "7",
                "8",
                "9",
                "10",
                "11",
                "12",
                "13",
                "14",
                "15",
                "16",
                "17",
                "18",
                "19",
                "20",
                "21",
                "22",
                "23",
                "24",
            ],
            datasets: [{
                label: "Total Sells",
                data: [
                    20, 10, 20, 5, 30, 10, 20, 40, 30, 45, 50, 40, 60, 50, 20, 45,
                    60, 40, 35, 30, 25, 30, 25, 20,
                ],
                backgroundColor: gradientBg_chart2,
                borderColor: "#194BFB",
                pointRadius: 0,
                borderWidth: 1,
                fill: true,
                fillColor: "#fff",
            }, ],
        },

        options: {
            layout: {
                padding: {
                    bottom: -20,
                    left: -20,
                },
            },
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                x: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: false,
                    },
                    suggestedMax: 10,
                    suggestedMin: 30,
                },

                y: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: false,
                    },
                    suggestedMax: 10,
                    suggestedMin: 30,
                },
            },

            plugins: {
                tooltip: {
                    padding: 10,
                    displayColors: true,
                    yAlign: "bottom",
                    backgroundColor: "#fff",
                    titleColor: "#000",
                    titleFont: {
                        weight: "normal"
                    },
                    bodyColor: "#2F3032",
                    cornerRadius: 12,
                    boxPadding: 3,
                    usePointStyle: true,
                    borderWidth: 0,
                    font: {
                        size: 14,
                    },
                    caretSize: 9,
                    bodySpacing: 100,
                },
                legend: {
                    position: "bottom",
                    display: false,
                },
                title: {
                    display: false,
                    text: "Visitor: 2k",
                },
            },
        },
    });

    // Chart Seven
    const ctx_net4 = document
        .getElementById("myChart_Net_Income4")
        .getContext("2d");
    const gradientBg_chart4 = ctx_net4.createLinearGradient(0, 0, 0, 150);
    gradientBg_chart4.addColorStop(0, "rgba(25, 75, 251, 0.40) ");
    gradientBg_chart4.addColorStop(0.3, "rgba(25, 75, 251, 0.00)");

    const myChart_Net_Income4 = new Chart(ctx_net4, {
        type: "line",

        data: {
            labels: [
                "1",
                "2",
                "3",
                "4",
                "5",
                "6",
                "7",
                "8",
                "9",
                "10",
                "11",
                "12",
                "13",
                "14",
                "15",
                "16",
                "17",
                "18",
                "19",
                "20",
                "21",
                "22",
                "23",
                "24",
            ],
            datasets: [{
                label: "Total Sells",
                data: [
                    20, 10, 20, 5, 30, 10, 20, 40, 30, 45, 50, 40, 60, 50, 20, 45,
                    60, 40, 35, 30, 25, 30, 25, 20,
                ],
                backgroundColor: gradientBg_chart2,
                borderColor: "#194BFB",
                pointRadius: 0,
                borderWidth: 1,
                fill: true,
                fillColor: "#fff",
            }, ],
        },

        options: {
            layout: {
                padding: {
                    bottom: -20,
                    left: -20,
                },
            },
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                x: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: false,
                    },
                    suggestedMax: 10,
                    suggestedMin: 30,
                },

                y: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: false,
                    },
                    suggestedMax: 10,
                    suggestedMin: 30,
                },
            },

            plugins: {
                tooltip: {
                    padding: 10,
                    displayColors: true,
                    yAlign: "bottom",
                    backgroundColor: "#fff",
                    titleColor: "#000",
                    titleFont: {
                        weight: "normal"
                    },
                    bodyColor: "#2F3032",
                    cornerRadius: 12,
                    boxPadding: 3,
                    usePointStyle: true,
                    borderWidth: 0,
                    font: {
                        size: 14,
                    },
                    caretSize: 9,
                    bodySpacing: 100,
                },
                legend: {
                    position: "bottom",
                    display: false,
                },
                title: {
                    display: false,
                    text: "Visitor: 2k",
                },
            },
        },
    });

    // Chart One
    const ctx = document.getElementById("myChart_Ecom").getContext("2d");
    const myChart_Ecom = new Chart(ctx, {
        type: "bar",

        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            datasets: [{
                    label: "Man",
                    data: [30, 25, 20, 20, 30, 20, 25, 45, 20, 25, 35, 30],
                    backgroundColor: [
                        "#194BFB",
                        "#194BFB",
                        "#194BFB",
                        "#194BFB",
                        "#194BFB",
                        "#194BFB",
                        "#194BFB",
                        "#194BFB",
                        "#194BFB",
                        "#194BFB",
                        "#194BFB",
                        "#194BFB",
                    ],
                    fill: true,
                    tension: 0.6,
                    borderWidth: 0,
                    borderSkipped: false,
                    borderRadius: 8,
                    borderRadius: {
                        topLeft: 8, // Apply border radius to the top-left corner
                        topRight: 8, // Apply border radius to the top-right corner
                        bottomLeft: 8, // Keep bottom-left corner square
                        bottomRight: 8, // Keep bottom-right corner square
                    },
                    barPercentage: 0.35,
                    categoryPercentage: 0.35,
                },
                {
                    label: "Women",
                    data: [20, 10, 30, 20, 20, 15, 15, 15, 20, 15, 20, 30],
                    backgroundColor: [
                        "#95ADFF",
                        "#95ADFF",
                        "#95ADFF",
                        "#95ADFF",
                        "#95ADFF",
                        "#95ADFF",
                        "#95ADFF",
                        "#95ADFF",
                        "#95ADFF",
                        "#95ADFF",
                        "#95ADFF",
                        "#95ADFF",
                    ],
                    hoverBackgroundColor: "#0A82FD",
                    borderWidth: 0,
                    borderSkipped: false,
                    borderRadius: 8,
                    borderRadius: {
                        topLeft: 8, // Apply border radius to the top-left corner
                        topRight: 8, // Apply border radius to the top-right corner
                        bottomLeft: 8, // Keep bottom-left corner square
                        bottomRight: 8, // Keep bottom-right corner square
                    },
                    barPercentage: 0.35,
                    categoryPercentage: 0.35,
                },
                {
                    label: "New",
                    data: [10, 15, 20, 15, 10, 15, 20, 15, 30, 20, 25, 15],
                    backgroundColor: [
                        "#E1E1E9",
                        "#E1E1E9",
                        "#E1E1E9",
                        "#E1E1E9",
                        "#E1E1E9",
                        "#E1E1E9",
                        "#E1E1E9",
                        "#E1E1E9",
                        "#E1E1E9",
                        "#E1E1E9",
                        "#E1E1E9",
                        "#E1E1E9",
                    ],
                    hoverBackgroundColor: "#0A82FD",
                    borderWidth: 0,
                    borderSkipped: false,
                    borderRadius: 8,
                    borderRadius: {
                        topLeft: 8, // Apply border radius to the top-left corner
                        topRight: 8, // Apply border radius to the top-right corner
                        bottomLeft: 8, // Keep bottom-left corner square
                        bottomRight: 8, // Keep bottom-right corner square
                    },
                    barPercentage: 0.35,
                    categoryPercentage: 0.35,
                },
            ],
        },

        options: {
            maintainAspectRatio: false,
            responsive: true,

            scales: {
                x: {
                    stacked: true,
                    ticks: {
                        color: "#5D6A83",
                    },
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                },
                y: {
                    stacked: true,
                    ticks: {
                        color: "#5D6A83",
                        callback: function(value, index, values) {
                            return (value / 10) * 10 + "";
                        },
                    },
                    grid: {
                        drawBorder: false,
                        color: "#F1F1F5",
                        borderDash: [5, 5],
                    },
                },
            },
            plugins: {
                tooltip: {
                    padding: 10,
                    displayColors: true,
                    yAlign: "bottom",
                    backgroundColor: "#fff",
                    titleColor: "#000",
                    titleFont: {
                        weight: "normal"
                    },
                    bodyColor: "#2F3032",
                    cornerRadius: 12,
                    boxPadding: 3,
                    usePointStyle: true,
                    borderWidth: 0,
                    font: {
                        size: 14,
                    },
                    caretSize: 9,
                    bodySpacing: 100,
                },
                legend: {
                    position: "top",
                    display: false,
                },
                title: {
                    display: false,
                    text: "Sell History",
                },
            },
        },
    });
    */
</script>