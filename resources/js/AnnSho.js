if (document.querySelector('#imgMain')) {

    let img_big = document.querySelector('#imgMain');
    let imgs_btn = [];
    for (let i = 0; i < img_num; i++) 
    {
        imgs_btn[i] = document.querySelector('#img-gallery' + i);
        imgs_btn[i].addEventListener('click', function() 
        {
            img_big.setAttribute('src', imgs_btn[i].getAttribute('src'));
        });
    }
}