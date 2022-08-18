const filter = document.querySelectorAll('.filtercheckbox');
const filterProduct = () => {   
    let products_content = document.querySelector('#products_content');
    filter.forEach((event) => {
        event.addEventListener('change', async () => {
            if (event.checked == true) {
                console.log(event.value);
                const dataproduct = await config.post('products', { category_id: event.value })
                const { data } = dataproduct.data;
                products_content.innerHTML = data.map((item,index)=>`
                <div class="products_grid">
                <div class="ico-label">
                    <span class="ico-product ico-new">New</span>
                    
                    <span class="ico-product ico-sale ${item.sale == 1 ? '': 'd-none'}">Sale</span>
                    
                </div>
                <a href='products/details/${item.id}'>

                <div class="products_img">
                        <img src="${item.image}" alt="">
                </div>
                </a>

                <div class="products_text">
                    <div class="item-title">
                        <a href="">${item.name}</a>
                    </div>
                    <div class="item-price">
                        <div class="price-box">
                            <span class="price1">${item.sale == 1 ? item.product_detail.price_sale : item.price}</span>
                            <span class="price2">${item.sale == 1 ? item.price : '' }</span>
                        </div>
                    </div>
                </div>
                <div class="action-bot">
                    <div class="wrap-addTocart">
                        <a href='products/details/${item.id}' class="text-white">
                        <button class=" btn-cart" title="Add To Cart">
                                Chi Tiết
                            </button>
                        </a>

                        </div>
                    <div class="actions">
                        <ul class="add-to-links">
                            <li>
                                <a class="link-wishlist" href="#" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a class="link-compare" href="#" title="Add to Compare">
                                    <i class="fa fa-random"></i>
                                </a>
                            </li>
                            <li class="wrap-quickview" data-id="qv_item_7">
                                <div class="quickview-wrap">
                                    <a class="sns-btn-quickview qv_btn" href="#">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
                `).join('');
              
            } else if(event.checked == false) {
                const dataproduct = await config.get('products');
                const { data } = dataproduct.data;
                console.log(dataproduct);
                products_content.innerHTML = data.map((item,index)=>`
                <div class="products_grid">
                <div class="ico-label">
                    <span class="ico-product ico-new">New</span>
                    
                    <span class="ico-product ico-sale ${item.sale == 1 ? '': 'd-none'}">Sale</span>
                    
                </div>
                <a href='products/details/${item.id}'>

                <div class="products_img">
                        <img src="${item.image}" alt="">
                </div>
                </a>

                <div class="products_text">
                    <div class="item-title">
                        <a href="">${item.name}</a>
                    </div>
                    <div class="item-price">
                        <div class="price-box">
                            <span class="price1">${item.sale == 1 ? item.product_detail.price_sale : item.price}</span>
                            <span class="price2">${item.sale == 1 ? item.price : '' }</span>
                        </div>
                    </div>
                </div>
                <div class="action-bot">
                    <div class="wrap-addTocart">
                        <a href='products/details/${item.id}' class="text-white">
                        <button class=" btn-cart" title="Add To Cart">
                                Chi Tiết
                            </button>
                        </a>

                        </div>
                    <div class="actions">
                        <ul class="add-to-links">
                            <li>
                                <a class="link-wishlist" href="#" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a class="link-compare" href="#" title="Add to Compare">
                                    <i class="fa fa-random"></i>
                                </a>
                            </li>
                            <li class="wrap-quickview" data-id="qv_item_7">
                                <div class="quickview-wrap">
                                    <a class="sns-btn-quickview qv_btn" href="#">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
                `).join('');
            }
        });
    });
}
filterProduct();