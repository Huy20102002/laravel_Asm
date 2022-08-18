let quantityvalue = document.querySelector('#quantityvalue');

const config = axios.create({
   baseURL: "http://localhost:8000/",
   headers: {
      "Content-Type": "application/json",
      "X-Requested-With": "XMLHttpRequest",
   },
});
const addCart = async (data, data_detail) => {

   let size = document.querySelector('#size') == undefined ? 0 : document.querySelector('#size').value;
   let color = document.querySelector('#color') == undefined ? 0 : document.querySelector('#color').value;

  
      await config.post('add_cart', {
         'id_product': data.id,
         'image': data.image,
         'id_size': size,
         'id_color': color,
         'quantity': quantityvalue.value,
         'price': data.price
      });
      toastr.success(`Thêm sản phẩm  ${data.name} vào giỏ hàng thành công`, data.name)
      quantityvalue.value = 1;


}
function increasingquantity() {
   quantityvalue.value++;
}

function decreasingquantity() {
   quantityvalue.value--;
   if (quantityvalue.value <= 0) {
      quantityvalue.value = 1;

   }
}

const getCart = async () => {
   let cart = document.querySelector('#cart_your');
   const { data } = await config.get('getcart');
   let conVertObject = Object.keys(data);
   // console.log(conVertObject)
   // console.log(data[38].product_id)
   console.log(data)
   cart.innerHTML = conVertObject.map((item, index) =>/*html*/ `
   <div class="item-cart">
      <div class="img-cart pr-3">
         <img src='http://localhost:8000/${data[item].image}'
            width="100" alt="">
      </div>
      <div class="title-cart">
         <div class="title-cart-head">
            <p>${data[item].product_name}</p>
            <div class="quantity-cart">
                  <span> <i class="fal fa-times"></i> ${data[item].quantity}</span>
            </div>
         </div>
         <div class="propertis_product">
         <div>
         Kích thước: <span>${data[item].size == null ? 'Không có' : data[item].size}</span>
         </div>
           Màu sắc: <span>${data[item].color == null ? 'Không có' : data[item].color}</span>
         </div>
         <div class="price-cart">
            <p> ${data[item].price}</p>
         </div>
      </div>
</div>
`)
}

/*
   <div class="item-cart">
      <div class="img-cart pr-3">
         <img src='http://localhost:8000/${item.image}'
            width="100" alt="">
      </div>
      <div class="title-cart">
         <div class="title-cart-head">
            <p>${item.product_name}</p>
            <div class="quantity-cart">
                  <span> <i class="fal fa-times"></i> ${item.quantity}</span>
            </div>
         </div>
         <div class="propertis_product">
         <div>
         Kích thước: <span>${item.size == null ? 'Không có' : item.size}</span>
         </div>
           Màu sắc: <span>${item.color == null ? 'Không có' : item.color}</span>
         </div>
         <div class="price-cart">
            <p> ${item.price}</p>
         </div>
      </div>
</div>
*/