let form = document.querySelector('form');

form.addEventListener('submit', async function (e) {
    e.preventDefault();

    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    let obj = { name, email, password };

    let res = await fetch('./apis/create.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
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