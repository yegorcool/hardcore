window.onload = function() {
let percent = document.querySelector('.skill-percent');
let counter = 0;
setInterval(() => {
    if(counter == 100) {
        clearInterval();
    } else {
        counter += 1;
        percent.innerHTML = counter + "%";
    }
}, 10);
}
