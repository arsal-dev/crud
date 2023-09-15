function update_func() {
    let update_btn = document.querySelectorAll('.update_btn');
    let up_name = document.getElementById('up_name');
    let up_email = document.getElementById('up_email');
    let up_password = document.getElementById('up_password');
    let up_form = document.getElementById('up_form');

    for (let btn of update_btn) {
        btn.addEventListener('click', function () {
            let id = this.id;

            up_name.value = this.name;
            up_email.value = this.getAttribute('email');
            up_password.value = this.getAttribute('password');

            up_form.addEventListener('submit', async function (e) {
                e.preventDefault();
                let api = `./apis/update.php?id=${id}&name=${up_name.value}&email=${up_email.value}&password=${up_password.value}`;
                let res = await fetch(api);
                res = await res.json();

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