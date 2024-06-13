
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetsHub Admin Dashboard</title>
    <link rel="icon" href="images/images-removebg-preview.png">



    <style>
        @font-face {
            font-family: 'Black';
            src: url('../fonts/MPLUSRounded1c-Black.ttf');
        }
        @font-face {
            font-family: 'Medium';
            src: url('../fonts/MPLUSRounded1c-Medium.ttf');
        }
        @font-face {
            font-family: 'ExtraBold';
            src: url('../fonts/MPLUSRounded1c-ExtraBold.ttf');
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
            flex-direction: column;
            background: linear-gradient(to right, #9796f0, #42445A);
            font-family: 'ExtraBold';
        }
        .sidebar {
            width: 250px;
            background-color: #3D67FF;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
            height: 100%;
            position: fixed;
            transition: transform 0.3s ease;
            background-color: #9796f0;
        }
        .sidebar.hidden {
            transform: translateX(-250px);
        }
        .logo {
            margin-bottom: 20px;
        }
        .logo img {
            width: 100px;
        }
        .menu {
            list-style: none;
            padding: 0;
            width: 100%;
        }
        .menu li {
            width: 100%;
        }
        .menu li a {
            display: block;
            padding: 15px;
            color: white;
            text-decoration: none;
            text-align: center;
            width: 100%;
            box-sizing: border-box;
        }
        .menu li a:hover, .menu li a.active {
            background-color: #1649ff;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            background-color: #F4F4F4;
            flex-grow: 1;
            overflow-y: auto;
            transition: margin-left 0.3s ease;
        }
        .content.shifted {
            margin-left: 0;
        }
        .dashboard-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .dashboard-stats .stat {
            background-color: #3D67FF;
            color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            flex-grow: 1;
            min-width: 150px;
        }
        .topbar {
            display: none;
            width: 100%;
            background-color: #3D67FF;
            color: white;
            padding: 10px 20px;
            box-sizing: border-box;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
        }
        .menu-icon {
            font-size: 24px;
            cursor: pointer;
        }
        .topbar .menu {
            display: flex;
            flex-direction: column;
            width: 100%;
            align-items: center;
        }
        @media (max-width: 768px) {
            .contianer{
                width:100% !important;
            }
            .sidebar {
                display: none;
            }
            .content {
                margin-left: 0;
            }
            .topbar {
                display: flex;
            }
        }
        #home > h1 {
            color: #3D67FF;
        }
        .AddContainer {
            display: flex;
            flex-direction: column;
            padding: 2vw;
            gap: 2Vw;
        }
        .AddContainer>button {
            padding: 2vw;
            font-size: 2vw;
            background-color: #3D67FF;
            border: none;
            border-radius: 1vw;
            color: white;
            cursor: pointer;
        }
        * {
    padding: 0;
    margin: 0;
    font-family: consolas;
    box-sizing: border-box;
  }
  
  
  .calendar {
    height: 30rem;
    width: max-content;
    background-color: white;
    border-radius: 25px;
    overflow: hidden;
    padding: 35px 50px 0px 50px;
  }
  
  .calendar {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  }
  
  .calendar-header {
    background: #8089FE;
    display: flex;
    justify-content: space-between;
    border-radius: 7px;
    align-items: center;
    font-weight: 700;
    color: #ffffff;
    padding: 10px;
  }
  
  .calendar-body {
    padding: 10px;
  }
  
  .calendar-week-days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    font-weight: 600;
    cursor: pointer;
    color: rgb(104, 104, 104);
  }
  
  .calendar-week-days div:hover {
    color: black;
    transform: scale(1.2);
    transition: all .2s ease-in-out;
  }
  
  .calendar-week-days div {
    display: grid;
    place-items: center;
    color: #6D67CF;
    height: 50px;
  }
  
  .calendar-days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 2px;
    color: #0A0921;
  }
  
  .calendar-days div {
    width: 37px;
    height: 33px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px;
    position: relative;
    cursor: pointer;
    animation: to-top 1s forwards;
  }
  
  .month-picker {
    padding: 5px 10px;
    border-radius: 10px;
    cursor: pointer;
  }
  
  .year-picker {
    display: flex;
    align-items: center;
  }
  
  .year-change {
    height: 30px;
    width: 30px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    margin: 0px 10px;
    cursor: pointer;
  }
  
  .year-change:hover {
    background-color: #9796f0;
    transition: all .2s ease-in-out;
    transform: scale(1.12);
  }
  
  .calendar-footer {
    padding: 10px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
  }
  
  #year:hover {
    cursor: pointer;
    transform: scale(1.2);
    transition: all 0.2 ease-in-out;
  }
  
  .calendar-days div span {
    position: absolute;
  }
  
  .calendar-days div:hover {
    transition: width 0.2s ease-in-out, height 0.2s ease-in-out;
    background-color: #fbc7d4;
    border-radius: 20%;
    color: #f8fbff;
  }
  
  .calendar-days div.current-date {
    color: #f8fbff;
    background-color: #9796f0;
    border-radius: 20%;
  }
  
  .month-list {
    position: relative;
    left: 0;
    top: -130px;
    background-color: #ebebeb;
    color: #151426;
    display: grid;
    grid-template-columns: repeat(3, auto);
    gap: 5px;
    border-radius: 20px;
  }
  
  .month-list>div {
    display: grid;
    place-content: center;
    margin: 5px 10px;
    transition: all 0.2s ease-in-out;
  }
  
  .month-list>div>div {
    border-radius: 15px;
    padding: 10px;
    cursor: pointer;
  }
  
  .month-list>div>div:hover {
    background-color: #9796f0;
    color: #f8fbff;
    transform: scale(0.9);
    transition: all 0.2s ease-in-out;
  }
  
  .month-list.show {
    visibility: visible;
    pointer-events: visible;
    transition: 0.6s ease-in-out;
    animation: to-left .71s forwards;
  }
  
  .month-list.hideonce {
    visibility: hidden;
  }
  
  .month-list.hide {
    animation: to-right 1s forwards;
    visibility: none;
    pointer-events: none;
  }
  
  .date-time-formate {
    height: 4rem;
    width: 100%;
    font-family: Dubai Light, Century Gothic;
    position: relative;
    display: flex;
    top: 50px;
    justify-content: center;
    align-items: center;
  }
  
  .day-text-formate {
    font-family: Microsoft JhengHei UI;
    font-size: 1.4rem;
    padding-right: 5%;
    border-right: 3px solid #9796f0;
  }
  
  .date-time-value {
    display: block;
    position: relative;
    text-align: center;
    padding-left: 5%;
  }
  
  .time-formate {
    font-size: 1.5rem;
  }
  
  .time-formate.hideTime {
    animation: hidetime 1.5s forwards;
  }
  
  .day-text-formate.hidetime {
    animation: hidetime 1.5s forwards;
  }
  
  .date-formate.hideTime {
    animation: hidetime 1.5s forwards;
  }
  
  .day-text-formate.showtime {
    animation: showtime 1s forwards;
  }
  
  .time-formate.showtime {
    animation: showtime 1s forwards;
  }
  
  .date-formate.showtime {
    animation: showtime 1s forwards;
  }
  
  @keyframes to-top {
    0% {
      transform: translateY(0);
      opacity: 0;
    }
  
    100% {
      transform: translateY(100%);
      opacity: 1;
    }
  }
  
  @keyframes to-left {
    0% {
      transform: translatex(230%);
      opacity: 1;
    }
  
    100% {
      transform: translatex(0);
      opacity: 1;
    }
  }
  
  @keyframes to-right {
    10% {
      transform: translatex(0);
      opacity: 1;
    }
  
    100% {
      transform: translatex(-150%);
      opacity: 1;
    }
  }
  
  @keyframes showtime {
    0% {
      transform: translatex(250%);
      opacity: 1;
    }
  
    100% {
      transform: translatex(0%);
      opacity: 1;
    }
  }
  
  @keyframes hidetime {
    0% {
      transform: translatex(0%);
      opacity: 1;
    }
  
    100% {
      transform: translatex(-370%);
      opacity: 1;
    }
  }
  .contianer{
    display: flex;
    width: 76%;
    align-self: end;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }
    </style>
</head>
<body>
    <div class="topbar" id="topbar">
        <div class="logo">
            <img src="../images/Happy-Men-Transparent-Background-PNG.png" alt="PetsHub Logo">
        </div>
        <span class="menu-icon" onclick="toggleMenu()">&#9776;</span>
        <ul class="menu" id="topbarMenu">
        <li><a href="#" onclick="window.location.href = 'reserv.html'">Dashboard</a></li>
            <li><a href="#" class="active" onclick="showSection(event, 'home')">calendrier</a></li>
            <li><a onclick="window.location.href = '../home.html'">Log out</a></li>
        </ul>
    </div>
<div class="contianer">
    <div class="calendar">
      <div class="calendar-header">
        <span class="month-picker" id="month-picker"> May </span>
        <div class="year-picker" id="year-picker">
          <span class="year-change" id="pre-year">
            <pre><</pre>
          </span>
          <span id="year">2020 </span>
          <span class="year-change" id="next-year">
            <pre>></pre>
          </span>
        </div>
      </div>

      <div class="calendar-body">
        <div class="calendar-week-days">
          <div>Sun</div>
          <div>Mon</div>
          <div>Tue</div>
          <div>Wed</div>
          <div>Thu</div>
          <div>Fri</div>
          <div>Sat</div>
        </div>
        <div class="calendar-days">
        </div>
      </div>
      <div class="calendar-footer">
      </div>
      <div class="date-time-formate">
        <div class="day-text-formate">TODAY</div>
        <div class="date-time-value">
          <div class="time-formate">01:41:20</div>
          <div class="date-formate">03 - march - 2022</div>
        </div>
      </div>
      <div class="month-list"></div>
    </div>
  </div>
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <img src="../images/Happy-Men-Transparent-Background-PNG.png">
        </div>
        <ul class="menu">
            <li><a href="#" onclick="window.location.href = 'reserv.html'">reservation</a></li>
            <li><a href="#" class="active" onclick="showSection(event, 'home')">Les Dates reservé</a></li>
            <li><a onclick="window.location.href = '../home.html'">Log out</a></li>
        </ul>
    </div>
    
   <script>
    const isLeapYear = (year) => {
    return (
      (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) ||
      (year % 100 === 0 && year % 400 === 0)
    );
  };
  const getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28;
  };
  let calendar = document.querySelector('.calendar');
  const month_names = [
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'July',
      'August',
      'September',
      'October',
      'November',
      'December',
    ];
  let month_picker = document.querySelector('#month-picker');
  const dayTextFormate = document.querySelector('.day-text-formate');
  const timeFormate = document.querySelector('.time-formate');
  const dateFormate = document.querySelector('.date-formate');
  
  month_picker.onclick = () => {
    month_list.classList.remove('hideonce');
    month_list.classList.remove('hide');
    month_list.classList.add('show');
    dayTextFormate.classList.remove('showtime');
    dayTextFormate.classList.add('hidetime');
    timeFormate.classList.remove('showtime');
    timeFormate.classList.add('hideTime');
    dateFormate.classList.remove('showtime');
    dateFormate.classList.add('hideTime');
  };
  
  const generateCalendar = (month, year) => {
    let calendar_days = document.querySelector('.calendar-days');
    calendar_days.innerHTML = '';
    let calendar_header_year = document.querySelector('#year');
    let days_of_month = [
        31,
        getFebDays(year),
        31,
        30,
        31,
        30,
        31,
        31,
        30,
        31,
        30,
        31,
      ];
  
    let currentDate = new Date();
  
    month_picker.innerHTML = month_names[month];
  
    calendar_header_year.innerHTML = year;
  
    let first_day = new Date(year, month);
  
  
    for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
  
      let day = document.createElement('div');
  
      if (i >= first_day.getDay()) {
        day.innerHTML = i - first_day.getDay() + 1;
  
        if (i - first_day.getDay() + 1 === currentDate.getDate() &&
          year === currentDate.getFullYear() &&
          month === currentDate.getMonth()
        ) {
          day.classList.add('current-date');
        }
      }
      calendar_days.appendChild(day);
    }
  };
  
  let month_list = calendar.querySelector('.month-list');
  month_names.forEach((e, index) => {
    let month = document.createElement('div');
    month.innerHTML = `<div>${e}</div>`;
  
    month_list.append(month);
    month.onclick = () => {
      currentMonth.value = index;
      generateCalendar(currentMonth.value, currentYear.value);
      month_list.classList.replace('show', 'hide');
      dayTextFormate.classList.remove('hideTime');
      dayTextFormate.classList.add('showtime');
      timeFormate.classList.remove('hideTime');
      timeFormate.classList.add('showtime');
      dateFormate.classList.remove('hideTime');
      dateFormate.classList.add('showtime');
    };
  });
  
  (function() {
    month_list.classList.add('hideonce');
  })();
  document.querySelector('#pre-year').onclick = () => {
    --currentYear.value;
    generateCalendar(currentMonth.value, currentYear.value);
  };
  document.querySelector('#next-year').onclick = () => {
    ++currentYear.value;
    generateCalendar(currentMonth.value, currentYear.value);
  };
  
  let currentDate = new Date();
  let currentMonth = { value: currentDate.getMonth() };
  let currentYear = { value: currentDate.getFullYear() };
  generateCalendar(currentMonth.value, currentYear.value);
  
  const todayShowTime = document.querySelector('.time-formate');
  const todayShowDate = document.querySelector('.date-formate');
  
  const currshowDate = new Date();
  const showCurrentDateOption = {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    weekday: 'long',
  };
  const currentDateFormate = new Intl.DateTimeFormat(
    'en-US',
    showCurrentDateOption
  ).format(currshowDate);
  todayShowDate.textContent = currentDateFormate;
  setInterval(() => {
    const timer = new Date();
    const option = {
      hour: 'numeric',
      minute: 'numeric',
      second: 'numeric',
    };
    const formateTimer = new Intl.DateTimeFormat('en-us', option).format(timer);
    let time = `${`${timer.getHours()}`.padStart(
        2,
        '0'
      )}:${`${timer.getMinutes()}`.padStart(
        2,
        '0'
      )}: ${`${timer.getSeconds()}`.padStart(2, '0')}`;
    todayShowTime.textContent = formateTimer;
  }, 1000);
   </script>
</body>
</html>
