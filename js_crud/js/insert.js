let form = document.querySelector('form');

form.addEventListener('submit', async function (e) {
    e.preventDefault();

    let name = document.querySelector('#name').value;
    let email = document.querySelector('#email').value;
    let password = document.querySelector('#password').value;

    let obj = { name, email, password };

    let res = await fetch('./apis/insert.php', {
        method: 'POST',
        body: JSON.stringify(obj)
    });

    res = await res.json();
    if (res.status == 200) {
        getData();
    }
    else {
        alert(res.result);
    }
});