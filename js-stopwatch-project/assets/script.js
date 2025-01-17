let hh = document.querySelector("#hh");
let mm = document.querySelector("#mm");
let ss = document.querySelector("#ss");

let hrs=0, minutes=0, seconds = 0;
setTimeout(() => { alert("This is after 1 second")},1000);

let stopwatch;

function startstopwatch(){
   stopwatch = setInterval(() => { start() }, 1000);
}
btnStart.addEventListener("click", () => {startstopwatch()})

function stopstopwatch(){
   clearInterval(stopwatch);
}
btnStop.addEventListener("click", () => {stopstopwatch()})

function resetstopwatch(){
clearInterval(stopwatch);
hrs = minutes =  seconds = 0;
ss.innerText = seconds;
mm.innerText = minutes;
hh.innerText = hrs;
}
btnReset.addEventListener("click",() => {resetstopwatch()})

function start() {
seconds++;
if (seconds == 60){
    seconds = 0;
    minutes++;
    if (minutes == 60){
    minutes = 0;
    minutes++;
    hh.innerText = hrs;
    }
  mm.innerText = minutes;
  }
ss.innerText = seconds;
}