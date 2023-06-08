window.onload = () => {

    // document.querySelector('.loading').style.display = 'none'
    document.querySelector('.loading').classList.add('hide')


    // Ajax Using Axios
    let btn = document.querySelector('.loadbtn');
    let wrapper = document.querySelector('.product-wrapper');

    btn.onclick = () => {
        axios.get('https://dummyjson.com/products')
        .then(res => {
            console.log(res.data.products);
        })
        .catch(err => {
            console.log(err);
        })
        .finally(function () {
            console.log('Job done');
        });
    }

}