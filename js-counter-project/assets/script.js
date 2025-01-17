let counter = document.getElementById("counter");
let btnminus = document.getElementById("btnminus");  
let btnreset = document.getElementById("btnreset");
let btnplus = document.getElementById("btnplus");
let counterstatus = document.querySelector( "#counterstatus");
let counterVal = 0;
        
let add = () =>{
  counterVal++;
  console.log("Adding to counter");
  counter.innerText = counterVal;
};

 btnplus.addEventListener("click", () => {
 add();
});

let subtract = () =>{
  counterVal--;
  console.log("Subtracted from counter");
  counter.innerText = counterVal;
};

 btnminus.addEventListener("click", () => {
  subtract();
});
        
let reset = () =>{
  counterVal=0;
  console.log("Reset counter");
  counter.innerText = counterVal;
};

 btnreset.addEventListener("click", () => {
  reset();
});