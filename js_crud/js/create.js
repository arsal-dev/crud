let form = document.querySelector('form');

form.addEventListener('submit', async function (e) {
    e.preventDefault();

    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    // let obj = { name, email, password };

    let formData = new FormData();

    formData.append('name', name);
    formData.append('email', email);
    formData.append('password', password);

    let res = await fetch('./apis/create.php', {
        method: 'POST',
        body: formData
    });

    res = await res.json();

    if (res.status == 200) {
        getData();
    }
    else {
        alert(res.result);
    }
});