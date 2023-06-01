class Header extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <nav>            
        <div class="header">
        <div class="header-left">
          <a href="Home.html">  <img src="./Image/logo_200x200-1.png" title="WARRIOR GYM - GYM FOR WARRIOR"> </a>
        </div>
        <div class="header-right">
            <div class="slogan">
                <p>WARRIOR GYM - GYM FOR REAL WARRIOR</p>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Giỏ hàng</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Kiến thức</a></li>
                    <li class="news">
                        <a href="#">Danh mục sản phẩm</a>
                        <ul>
                            <a href="#">
                                <li>Dụng cụ tập gym</li>
                            </a>
                            <a href="#">
                                <li>Thiết bị tập gym</li>
                            </a>
                            <a href="#">
                                <li>Dụng cụ boxing</li>
                            </a>
                            <a href="#">
                                <li>Dụng cụ cầu lông</li>
                            </a>
                            <a href="#">
                                <li>Máy chạy bộ</li>
                            </a>
                            <a href="#">
                                <li>Thực phẩm chức năng</li>
                            </a>
                            <a href="#">
                                <li>Khác</li>
                            </a>
                        </ul>
                    </li>
                    <li><a href="#">Mục khác</a></li>
                </ul>
            </div>
        </div>
        <div class="header-last">
        <li><input style={color:red; width: 250px; height: 70px;} type="text" placeholder="Tìm kiếm"></li>
        <a href = "#"> <img style="height: 20px; width:20px; margin-left: 18px; margin-right: 18px"src="./Assets/search.png"></a>|
        <a href = "#"> <img style="height: 20px; width:20px; margin-left: 18px; margin-right: 18px"src="./Assets/bag.png"></a>|
        <a href = "#"> <img style="height: 20px; width:20px; margin-left: 18px; margin-right: 18px"src="./Assets/user.png"></a>
        </div>
    </div>     
        </nav>
      `;
    }
}
customElements.define('main-header', Header);