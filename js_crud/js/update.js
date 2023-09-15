function update_func() {
    let update_btn = document.querySelectorAll('.update_btn');
    let up_name = document.getElementById('up_name');
    let up_email = document.getElementById('up_email');
    let up_password = document.getElementById('up_password');
    let up_form = document.getElementById('up_submit');


    for (let btn of update_btn) {
        btn.addEventListener('click', function () {
            let id = this.id;
            let name = this.getAttribute('name');
            let email = this.getAttribute('email');
            let password = this.getAttribute('password');

            up_name.value = name;
            up_email.value = email;
            up_password.value = password;

            up_form.addEventListener('submit', async function (e) {
                e.preventDefault();

                let api = `./apis/update.php?id=${id}&name=${name}&email=${email}&password=${password}`;

                res = await fetch(api);
                res = await res.josn();

                if (res.status == 200) {
                    getData();
                }
                else {
                    alert(res.result);
                }
            });
        });
    }
}
