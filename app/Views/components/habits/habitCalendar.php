<div class="calendar">
    <div class="month">
        <div class="left-arrow-calendar">
            <span>
                < </span>
        </div>
        <p class="month-name"> </p>
        <div class="right-arrow-calendar">
            >
        </div>
        <div class="year"><span class="year-calendar"></span></div>
    </div>
    <div class="weekdays">

    </div>
    <div class="dates">
        <!-- Dates will be dynamically added here -->
    </div>


    <!-- JS for calendar -->
    <script>
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var d = new Date();
        var monthIndex = d.getMonth();
        var currentYear = new Date().getFullYear();
        var datesContainer = document.querySelector('.dates');
        var weekdaysContainer = document.querySelector('.weekdays');
        var weekdays = ["S", "M", "T", "W", "T", "F", "S"];

        weekdays.forEach(function(day) {
            var div = document.createElement('div');
            div.textContent = day;
            weekdaysContainer.appendChild(div, );
        });

        calendar(monthIndex, currentYear);

        $('.left-arrow-calendar').click(function() {
            $('.dates').empty();


            if (monthIndex < 1) {
                monthIndex = 11;
                calendar(monthIndex, currentYear - 1);
                currentYear--;
            } else {
                calendar(monthIndex - 1, currentYear);
                monthIndex--;
                console.log('MI left ' + monthIndex);

            };
        })

        $('.right-arrow-calendar').click(function() {
            $('.dates').empty();

            if (monthIndex >= 11) {
                console.log('MI ' + monthIndex);
                monthIndex = 0;
                calendar(monthIndex, currentYear + 1);
                currentYear++;
            } else {
                calendar(monthIndex + 1, currentYear)
                monthIndex++;

                console.log('MI right ' + monthIndex);

            };

        })

        function dateDivData(date, isTodayDate = "") {
            return (`<div class="circle-wrap ${isTodayDate}">
                        <div class="circle">
                            <div class="mask full">
                                <div class="fill"></div>
                            </div>
                            <div class="mask half">
                                <div class="fill"></div>
                            </div>
                            <div class="inside-circle">${date}</div>
                        </div>
                    </div>`);
        }

        function calendar(monthIndex, currentYear) {
            var monthName = months[monthIndex];

            var daysInMonth = new Date(currentYear, (monthIndex + 1), 0).getDate();
            // console.log('days ' + daysInMonth)


            var startDayIndex = new Date(`${monthName},1, ${currentYear}`).getDay();
            console.log("Start index " + startDayIndex);



            $('.month-name').text(monthName);
            $('.year-calendar').text(currentYear);



            // Populate dates
            let dayCount = 1;
            var row = 0;
            if (startDayIndex >= 5 && daysInMonth == 31 || startDayIndex == 6 && daysInMonth == 30) {
                row = 6;
            } else {
                row = 5;
            }


            for (let i = 0; i < row; i++) {

                // Assuming maximum of 6 weeks 
                for (let j = 0; j < 7; j++) {
                    // 7 days in a week 
                    if (i === 0 && j < startDayIndex) {
                        // Add empty cell for days before the start of the month var
                        emptyCell = document.createElement('div');
                        emptyCell.classList.add('empty-cell');
                        datesContainer.appendChild(emptyCell);
                    } else if (dayCount <= daysInMonth) {

                        // Add date cell var
                        // dateCell = document.createElement('div');
                        // dateCell.textContent = dayCount;
                        // dateCell.classList.add('date-cell');

                        if (dayCount === new Date().getDate() && monthName === months[d.getMonth()] && currentYear == d.getFullYear()) {
                            // dateCell.append('current-month'); // Highlight current date
                            $('.dates').append(dateDivData(dayCount, "current-month"))
                        } else {

                            $('.dates').append(dateDivData(dayCount));
                        }
                        dayCount++;
                    }
                }

            }
        }
    </script>

</div>