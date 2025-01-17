const todoTask = document.querySelector("#todoTask")
const todobtn = document.querySelector("#btnadd")
let AllTask =[];
// let previousTask;
let addTask = () =>{
    alert(todoTask.value);
    AllTask.push(todoTask.value);
    storeTasks();
    showTasks();
    todoTask.value = "";
}
  btnadd.addEventListener("click", addTask);
let storeTasks = () => {
    AllTask = JSON.stringify(AllTask);
    // console.log(AllTask);
    localStorage.setItem("allTask", AllTask);
}
let showTasks = () => {
    AllTask = localStorage.getItem("allTask");
    AllTask= JSON.parse(AllTask);
    // console.log(AllTask);     
const List = document.querySelector("#List")
    List.innerText = "";
    AllTask.forEach((task) => {
    li = document.createElement("li");
    li.innerText = task;
    List.appendChild(li);
}) 
}
showTasks()