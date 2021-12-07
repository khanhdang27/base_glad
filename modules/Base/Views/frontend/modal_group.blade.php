<div class="modal-group">
    <!--Modal login-->
    <div class="modal modal-login border-0" id="modal-login" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content modal-row">
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <img class="modal-image d-none d-sm-block" src="../images/modal-login.svg"
                                 alt="Modal Login">
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="h-100">
                                <div class="close-modal">
                                    <a href="javascript:" class="d-flex align-items-end" data-bs-dismiss="modal">
                                        <i class="bi-x"></i>關閉
                                    </a>
                                </div>
                                <div class="form-login">
                                    <h3>登入</h3>
                                    <hr>
                                    <form>
                                        <div class="form-group">
                                            <label class="label-input-login" for="email">電郵地址<span> *</span></label>
                                            <input type="text" id="email" name="email" placeholder="電郵地址"
                                                   class="form-control input-login">
                                        </div>
                                        <div class="form-group">
                                            <label class="label-input-login" for="password">
                                                密碼 <span> *</span>
                                            </label>
                                            <input type="password" id="password" name="password" placeholder="密碼"
                                                   class="form-control input-login">
                                        </div>
                                        <div class="btn-group-login">
                                            <button class="btn btn-outline-main btn-login" type="submit">登入</button>
                                            <button type="button" data-bs-dismiss="modal" data-bs-toggle="modal"
                                                    data-bs-target="#modal-forgot" class="btn btn-forgot">
                                                忘記密碼
                                            </button>
                                            <a href="register.html" class="btn btn-main btn-register">建立新帳戶</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal forgot password-->
    <div class="modal modal-forgot border-0" id="modal-forgot" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content modal-row">
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="h-100">
                                <div class="close-modal justify-content-start ps-5">
                                    <a href="javascript:" class="d-flex align-items-end" data-bs-dismiss="modal">
                                        <i class="bi-x"></i>關閉
                                    </a>
                                </div>
                                <div class="form-forgot">
                                    <form>
                                        <h3>忘記密碼</h3>
                                        <hr>
                                        <div class="title-noti">我們將會發送電郵給你重設密碼</div>
                                        <div class="form-group">
                                            <label class="label-input-login" for="email-forgot">
                                                電郵地址 <span> *</span>
                                            </label>
                                            <input type="text" id="email-forgot" name="email" placeholder="電郵地址"
                                                   class="form-control input-login">
                                        </div>
                                        <div class="row-send">
                                            <a href="" class="btn btn-main px-5 py-2 rounded-0">提交</a>
                                            <div class="title-or">或</div>
                                            <a href="" class="text-decoration-none title-cancel">提交</a>
                                        </div>
                                        <div class="divider one-line">或</div>
                                        <div class="title-forgot mb-1">新客戶</div>
                                        <div class="title-noti mb-lg-3 mb-5">申請賬戶後付款更快捷、查看訂單及其他資料</div>
                                        <a href="register.html" class="btn btn-main btn-register">建立新帳戶</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <img class="modal-image d-none d-sm-block" src="../images/modal-forgot.svg"
                                 alt="Modal Forgot">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Regist Email-->
    <div class="modal modal-register-email border-0" id="modal-register-email" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content modal-row">
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <img class="modal-image d-none d-sm-block w-100" src="../images/regist_email.svg"
                                 alt="Modal Register Email">
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="h-100">
                                <div class="close-modal">
                                    <a href="javascript:" class="d-flex align-items-end" data-bs-dismiss="modal">
                                        <i class="bi-x"></i>關閉
                                    </a>
                                </div>
                                <div class="form text-center">
                                    <h3 class="fw-bold title">HELLO!</h3>
                                    <div class="description">
                                        新⽤⼾登記EMAIL將會收到9折優惠碼
                                        亦誠邀<a href="#" class="cl-text-primary">加入FB群組!</a> 睇更多⽤家分享
                                    </div>
                                    <form class="mb-5">
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-0" placeholder="登記你的電郵地址"
                                                   aria-describedby="basic-addon2">
                                            <button class="btn" id="basic-addon2">提交</button>
                                        </div>
                                        <div class="form-group text-start">
                                            <label class="checkmark-group">想收取更多驚喜資訊！
                                                <input type="checkbox" id="check-register-email" class="me-2">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-center">
                                        <div class="d-flex justify-content-between w-25">
                                            <img src="../images/icon-fb-light.svg" alt="">
                                            <img src="../images/icon-ins-light.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal point-->
    <div id="title-reward" class="title-reward">
        <a href="javascript:" data-bs-toggle="modal" data-bs-target="#modal-point">
            會員積分獎賞
        </a>
    </div>
    <div class="modal modal-point border-0" id="modal-point" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content modal-row">
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 ps-0">
                                <img src="../images/modal-point.svg" class="modal-image d-none d-sm-block" alt="">
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="close-modal">
                                    <a href="javascript:" class="d-flex align-items-end" data-bs-dismiss="modal">
                                        <i class="bi-x"></i>關閉
                                    </a>
                                </div>
                                <div class="point">
                                    <div class="py-4">
                                        <a href="index.html">
                                            <img src="../images/logo-primary.svg" class="logo" height="50px" alt="Logo">
                                        </a>
                                    </div>
                                    <div class="title-point">申請賬戶後即可參與獨家獎勵！</div>
                                    <div class="tab mb-4">
                                        <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link w-100 active" id="reward-tab"
                                                        data-bs-toggle="pill"
                                                        data-bs-target="#reward" type="button" role="tab"
                                                        aria-controls="reward" aria-selected="true">獎賞
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link w-100" id="point-tab" data-bs-toggle="pill"
                                                        data-bs-target="#point" type="button" role="tab"
                                                        aria-controls="point" aria-selected="false">儲積分
                                                </button>
                                            </li>

                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="reward" role="tabpanel"
                                                 aria-labelledby="reward-tab">
                                                <div class="point-table">
                                                    <table class="w-100">
                                                        <tr>
                                                            <td><img class="img-point" src="../images/surprise.svg"
                                                                     alt="Icon reward"></td>
                                                            <td class="text-name">
                                                                獎賞
                                                            </td>
                                                            <td class="text-point">1000 Points</td>
                                                        </tr>
                                                        <tr>
                                                            <td><img class="img-point" src="../images/surprise.svg"
                                                                     alt="Icon reward"></td>
                                                            <td class="text-name">
                                                                獎賞
                                                            </td>
                                                            <td class="text-point">1000 Points</td>
                                                        </tr>
                                                        <tr>
                                                            <td><img class="img-point" src="../images/surprise.svg"
                                                                     alt="Icon reward"></td>
                                                            <td class="text-name">
                                                                獎賞
                                                            </td>
                                                            <td class="text-point">1000 Points</td>
                                                        </tr>
                                                        <tr>
                                                            <td><img class="img-point" src="../images/surprise.svg"
                                                                     alt="Icon reward"></td>
                                                            <td class="text-name">
                                                                獎賞
                                                            </td>
                                                            <td class="text-point">1000 Points</td>
                                                        </tr>
                                                        <tr>
                                                            <td><img class="img-point" src="../images/surprise.svg"
                                                                     alt="Icon reward"></td>
                                                            <td class="text-name">
                                                                獎賞
                                                            </td>
                                                            <td class="text-point">1000 Points</td>
                                                        </tr>
                                                        <tr>
                                                            <td><img class="img-point" src="../images/voucher.svg"
                                                                     alt="Icon reward"></td>
                                                            <td class="text-name">
                                                                獎賞
                                                            </td>
                                                            <td class="text-point">2000 Points</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade accumulate-points" id="point" role="tabpanel"
                                                 aria-labelledby="point-tab">
                                                <div class="point-table">
                                                    <table class="w-100">
                                                        <tr>
                                                            <td class="text-name">積分</td>
                                                            <td class="text-point">1000 Points</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-name">積分</td>
                                                            <td class="text-point">1000 Points</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-name">積分</td>
                                                            <td class="text-point">1000 Points</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-name">積分</td>
                                                            <td class="text-point">1000 Points</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-name">積分</td>
                                                            <td class="text-point">1000 Points</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-main px-4 py-2 mb-3">建立帳戶</button>
                                    <div class="cl-text-blue p-0">
                                        己有帳戶?
                                        <a href="#" class="btn cl-text-primary p-0">立即登入</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart -->
    <div id="cart-box" class="cart-box selector-close d-none">
        <a href="javascript:" class="d-flex justify-content-end cl-text-blue close close-hide">
            <i class="bi-x" style="font-size: 25px;"></i>關閉
        </a>
        <div class="cart-content">
            <div class="cart-header">
                <h5>購物⾞</h5>
                <hr>
            </div>
            <div class="cart-body pb-4">
                <div class="cart-list">
                    <div class="cart-item d-flex">
                        <div class="flex-shrink-0 image">
                            <img src="../images/cate.png" alt="../images/cate.png">
                        </div>
                        <div class="flex-grow-1 ms-3 content">
                            <h6 class="title">瑰麗亮肌煥彩護療霜 NOURISHING ROSANNA RENEWED TREATMENT</h6>
                            <div class="capacity">Normal 30ml</div>
                            <div class="quantity">1 X <span class="fw-bold">$000.00</span></div>
                        </div>
                    </div>
                    <div class="cart-item d-flex">
                        <div class="flex-shrink-0 image">
                            <img src="../images/cate.png" alt="../images/cate.png">
                        </div>
                        <div class="flex-grow-1 ms-3 content">
                            <h6 class="title">瑰麗亮肌煥彩護療霜 NOURISHING ROSANNA RENEWED TREATMENT</h6>
                            <div class="capacity">Normal 30ml</div>
                            <div class="quantity">1 X <span class="fw-bold">$000.00</span></div>
                        </div>
                    </div>
                    <div class="cart-item d-flex">
                        <div class="flex-shrink-0 image">
                            <img src="../images/cate.png" alt="../images/cate.png">
                        </div>
                        <div class="flex-grow-1 ms-3 content">
                            <h6 class="title">瑰麗亮肌煥彩護療霜 NOURISHING ROSANNA RENEWED TREATMENT</h6>
                            <div class="capacity">Normal 30ml</div>
                            <div class="quantity">1 X <span class="fw-bold">$000.00</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-footer">
                <hr>
                <div class="d-flex justify-content-between mb-3">
                    <h5>總額:</h5>
                    <div class="total-price">HK$000.00</div>
                </div>
                <a href="shopping-cart.html" class="btn btn-outline-dark rounded-0 w-100 close close-hide" data-bs-toggle="modal"
                   data-bs-target="#modal-cart-detail">
                    查看購物⾞
                </a>
            </div>
        </div>
    </div>
    <!-- Modal Cart -->
    <div class="modal modal-cart-detail border-0" id="modal-cart-detail" tabindex="-1"
         aria-hidden="true">
        <div class="modal-dialog modal-lx">
            <div class="modal-content modal-row">
                <div class="modal-body p-0">
                    <div class="close-modal">
                        <a href="javascript:" class="d-flex align-items-end" data-bs-dismiss="modal">
                            <i class="bi-x"></i>
                        </a>
                    </div>
                    <div class="cart-content">
                        <div class="container pb-5" style="border-bottom: 1px solid #d4e2ee;">
                            <div class="modal-title pb-3 mb-5">
                                <h4>以下產品已加⼊購物⾞:</h4>
                            </div>
                            <div class="modal-cart-detail-row row">
                                <div class="col-lg-4">
                                    <div class="shopping-overview">
                                        <div class="card border-0 rounded-0">
                                            <div class="card-header text-center">
                                                <h5 class="fw-bold">查看購物⾞</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="cart-count-product text-center p-5">
                                                    2購物⾞中的產品
                                                </div>
                                                <div class="cart-total-price d-flex justify-content-between align-items-center py-3 mb-3">
                                                    <h5 class="fw-bold">總額:</h5>
                                                    <div class="price">$000.00</div>
                                                </div>
                                                <div class="cart-btn">
                                                    <button class="btn btn-outline-dark rounded-0">繼續購物</button>
                                                    <a href="shopping-cart.html" class="btn btn-main">付款</a>
                                                </div>
                                                <div class="cart-method">
                                                    <button class="btn btn-dark btn-method gg-pay">
                                                        Buy with
                                                        <img src="https://www.nicepng.com/png/full/769-7692974_googlepay-2-google-pay-logo-black.png"
                                                             alt="">
                                                    </button>
                                                    <button class="btn btn-warning btn-method pay-pal">
                                                        <img src="https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404__480.png"
                                                             alt="">
                                                    </button>
                                                    <button class="btn btn-method shop-pay">
                                                        Shop Pay
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="shopping-list">
                                        <div class="card border-0 rounded-0">
                                            <div class="card-header text-center">
                                                <h5 class="fw-bold">你的訂單</h5>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="cart-list">
                                                    <div class="cart-item row">
                                                        <div class="image col-md-2 col-4">
                                                            <a href="#"><img src="../images/cate.png" width="100%" alt="../images/cate.png"></a>
                                                        </div>
                                                        <div class="col-md-4 col-8">
                                                            <div class="content">
                                                                <a href="#" class="title">瑰麗亮肌煥彩護療霜 NOURISHING ROSANNA RENEWED
                                                                    TREATMENT</a>
                                                                <div class="capacity">Normal 30ml</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 range-quantity">
                                                            <div class="price">$000.00</div>
                                                            <div class="px-2">
                                                                <div class="input-group">
                                                                    <button type="button"
                                                                            class="btn rounded-0 border decrease">-
                                                                    </button>
                                                                    <input type="number" min="1" value="1"
                                                                           class="form-control text-center"
                                                                           oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                                                                    <button type="button"
                                                                            class="btn border rounded-0 increase">+
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="price">$000.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="cart-item row">
                                                        <div class="image col-md-2 col-4">
                                                            <a href="#"><img src="../images/cate.png" width="100%" alt="../images/cate.png"></a>
                                                        </div>
                                                        <div class="col-md-4 col-8">
                                                            <div class="content">
                                                                <a href="#" class="title">瑰麗亮肌煥彩護療霜 NOURISHING ROSANNA RENEWED
                                                                    TREATMENT</a>
                                                                <div class="capacity">Normal 30ml</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 range-quantity">
                                                            <div class="price">$000.00</div>
                                                            <div class="px-2">
                                                                <div class="input-group">
                                                                    <button type="button"
                                                                            class="btn rounded-0 border decrease">-
                                                                    </button>
                                                                    <input type="number" min="1" value="1"
                                                                           class="form-control text-center">
                                                                    <button type="button"
                                                                            class="btn border rounded-0 increase">+
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="price">$000.00</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container product-list">
                            <div class="title text-center p-4">
                                <h4 class="fw-bold">YOU MAY ALSO LIKE</h4>
                            </div>
                            <div class="container mb-5">
                                <div class="product-list row">
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <a href="product-detail.html"><img src="../images/cate.png" class="mb-3" alt="../images/cate.png"></a>
                                            <div class="content text-md-center mb-3">
                                                <a href="product-detail.html" class="title">⾦縷梅⽔凝抗炎護療霜</a>
                                                <div class="description">Moistening Hamamelis Clearing Treatment</div>
                                                <div class="product-price">from <span class="price">$000.00</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <a href="product-detail.html"><img src="../images/cate.png" class="mb-3" alt="../images/cate.png"></a>
                                            <div class="content text-md-center mb-3">
                                                <a href="product-detail.html" class="title">⾦縷梅⽔凝抗炎護療霜</a>
                                                <div class="description">Moistening Hamamelis Clearing Treatment</div>
                                                <div class="product-price">from <span class="price">$000.00</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <a href="product-detail.html"><img src="../images/cate.png" class="mb-3" alt="../images/cate.png"></a>
                                            <div class="content text-md-center mb-3">
                                                <a href="product-detail.html" class="title">⾦縷梅⽔凝抗炎護療霜</a>
                                                <div class="description">Moistening Hamamelis Clearing Treatment</div>
                                                <div class="product-price">from <span class="price">$000.00</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <a href="product-detail.html"><img src="../images/cate.png" class="mb-3" alt="../images/cate.png"></a>
                                            <div class="content text-md-center mb-3">
                                                <a href="product-detail.html" class="title">⾦縷梅⽔凝抗炎護療霜</a>
                                                <div class="description">Moistening Hamamelis Clearing Treatment</div>
                                                <div class="product-price">from <span class="price">$000.00</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Limit Purchase Offer -->
    <div class="modal modal-purchase-offer-limit border-0" id="modal-purchase-offer-limit"
         tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content modal-row">
                <div class="modal-body p-0">
                    <div class="close-modal">
                        <a href="javascript:" class="d-flex align-items-end" data-bs-dismiss="modal">
                            <i class="bi-x"></i>
                        </a>
                    </div>
                    <div class="title text-center mb-3">
                        <h5 class="fw-bold cl-text-blue">限時加購優惠</h5>
                    </div>
                    <div class="date-end">
                        <h4 class="fw-bold">限時優惠快將完結: <span class="remain-time fw-bold text-danger">10:40</span></h4>
                    </div>
                    <div class="container content px-md-5">
                        <div class="product-info border-bottom">
                            <div class="flex-shrink-0 image">
                                <img src="../images/cate.png" alt="../images/cate.png">
                            </div>
                            <div class="flex-grow-2 info px-md-5">
                                <div class="title m-0">
                                    <h5 class="fw-bold">瑰麗亮肌煥彩護療霜 NOURISHING ROSANNA RENEWED TREATMENT</h5>
                                </div>
                                <div class="price-group d-flex align-items-center">
                                    <div class="price">
                                        $000.0
                                    </div>
                                    <div class="discount-price">
                                        $000.0
                                    </div>
                                    <div class="discount text-success">
                                        (15%OFF)
                                    </div>
                                </div>
                                <div class="description">
                                    坊間玫瑰乳霜大多為白色，若將玫瑰籽油去除顏色和氣味
                                    ，則大大減低營養價值。本產採用的玫瑰籽油保留了原有色澤，所以調製出來的乳霜偏黃，但絕對不令皮膚變黃，使用後反能提亮膚色。
                                </div>
                            </div>
                            <div class="flex-grow-1 d-flex align-items-center">
                                <button class="btn btn-main btn-add-to-card rounded w-100">
                                    加入購物車
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="container button-group p-md-5">
                        <button class="btn btn-outline-main">不需要此優惠</button>
                        <button class="btn btn-main">付款</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
