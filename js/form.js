const xhr = new XMLHttpRequest();
const status = document.getElementById('status');

document.querySelector('.form').addEventListener('submit', (e) => {
    e.preventDefault();
    const data = {};
    const inputs = [...e.target.elements];
    inputs.forEach(input => {
        if (input.name) data[input.name] = input.value;
    })
    submitform(data)
})

function submitform(data) {
    showMsg('INFO', 'Submitting form please wait');
    xhr.open('GET', '/php/clients.php');
    xhr.setRequestHeader('Content-type', 'application/json');
    xhr.send(JSON.stringify(data));
}

xhr.onload = function () {
    const res = JSON.parse(this.responseText);
    showMsg(res.success ? 'SUCCESS' : 'FAILED', res.message);
}

function showMsg(type, msg) {
    const color = {
        INFO: 'royalblue',
        SUCCESS: 'green',
        FAILED: 'orangered'
    }[type];
    status.innerHTMl = `<p style="color:${color}">${msg}</p>`
}