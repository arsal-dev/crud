function dlt_btn() {
    let dlt_btn = document.querySelectorAll('.dlt_btn');
    let yes_dlt = document.getElementById('yes_dlt');

    for (let btn of dlt_btn) {
        btn.addEventListener('click', function () {
            let id = this.id;

            yes_dlt.addEventListener('click', async function () {
                let res = await fetch(`./apis/delete.php?id=${id}`);
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