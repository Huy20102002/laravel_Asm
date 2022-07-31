
<span class="navfilter"><i class="fal fa-bars"></i></span>
<div class="filter">
    <div class="title-filter">
        <h5>BỘ LỌC</h5>
    </div>
    <div class="main-filter">
        <div class="category">
            <div class="title-cate">
                <h6>Danh Mục</h6>
            </div>
            <div class="main-cate">
                @foreach ($dataCate as $item)
                <div class="form-input align-items-center">
                    <input type="checkbox" id="sofas">
                    <label for="sofas">{{$item->name}}</label>
                </div>
                @endforeach
               
            </div>
        </div>
        <div class="size">
            <div class="title-size mb-3">
                <span class="fw-bold">Kích Thước</span>
            </div>
            <div class="main-size">
                @foreach($dataSize as $item)
                <div class="form-input align-items-center">
                    <input type="checkbox" id="sofas">
                    <label for="sofas">{{$item->name}}</label>
                </div>  
                @endforeach
              
            </div>
        </div>
        <div class="price-filter">
            <div class="title-price">
                <span>Giá Tiền</span>
            </div>
            <form action="">
                <div class="form">
                    <div class="form-price">
                        <input type="text" class="first-price">
                        <input type="text" class="lasted-price">
                    </div>
                    <button>Lọc</button>
                </div>                
            </form>
        </div>
    </div>
</div>
