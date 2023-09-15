function dlt_func() {
    let dlt_btn = document.querySelectorAll('.delete_btn');

    for (let i = 0; i < dlt_btn.length; i++) {
        dlt_btn[i].addEventListener('click', function () {
            let yes_dlt = document.querySelector('#yes_dlt');
            let dlt_id = this.id;
            yes_dlt.addEventListener('click', async function () {
                let res = await fetch(`./apis/delete.php?id=${dlt_id}`);
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

