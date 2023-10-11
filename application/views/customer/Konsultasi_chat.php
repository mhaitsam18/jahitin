<html>
    <style>
        .timer {
          font-family: sans-serif;
          display: grid;
          height: 50vh;
          place-items: center;
        }

        .base-timer {
          position: relative;
          width: 150px;
          height: 150px;
        }

        .base-timer__svg {
          transform: scaleX(-1);
        }

        .base-timer__circle {
          fill: none;
          stroke: none;
        }

        .base-timer__label {
          position: absolute;
          width: 150px;
          height: 50px;
          /* top: 0; */
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 80px;
          color: red;
        } 

    </style>
    <body>
      <!-- Timer start -->
      <div class="timer">
        <div id="app"></div>
      </div>
      <!-- Timer END -->

        <!-- Daftar Produk -->
        <div class="page-section">
          <div class="container">
            <div class="text-center">
              <h2 class="title-section"><span class="marked">Serba 50 Ribu Hanya dalam 30 Menit</span></h2>
              <div class="divider mx-auto"></div>
            </div>


            <div class="row mt-5 text-center">
                <?php foreach ($produk as $row):?>
                    <div class="col-lg-4 py-3">
                        <img src="<?= base_url() ?>assets/img/<?= $row->foto_produk?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row->nama_produk?></h5><br>
                                <s class="card-text">Rp <?= number_format($row->harga_produk, 2,',','.') ?> </s>
                                <p>Rp 50.000</p>
                                <?= anchor('customer/Produk_customer/tambah_ke_keranjang/' .$row->id_produk, 
                                '<div type="button" class="btn btn-primary">Tambah</div>') ?>
                            </div>
                    </div>
                <?php endforeach ?>
            </div>
          </div> <!-- .container -->
        </div> <!-- .page-section -->
    </body>
    
</html>
<script>
    const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 10;
const ALERT_THRESHOLD = 5;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

const TIME_LIMIT = 1800;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

startTimer();

function onTimesUp() {
  clearInterval(timerInterval);
}

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    document.getElementById("base-timer-label").innerHTML = formatTime(
      timeLeft
    );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);

    if (timeLeft === 0) {
      alert ("Sesi Promo Telah Berakhir");
      onTimesUp();
    }
  }, 1);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  return `${minutes}:${seconds}`;
}

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
    .setAttribute("stroke-dasharray", circleDasharray);
}
</script>