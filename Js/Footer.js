class Footer extends HTMLElement {
    connectedCallback() {
      this.innerHTML = `
        <nav>            
        <div class="footer">
            <div class="section1">
                <h2>Liên kết</h2>
                <ul>
                    <li><a>Góp ý</a></li>
                    <li><a>Phản hồi</a></li>
                    <li><a>Điều kiện bảo mật</a></li>
                    <li><a>Chính sách thanh toán</a></li>
                    <li><a>Khiếu nại</a></li>
                </ul>
            </div>
            <div class="section2">
                <h2>Liên hệ</h2>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i>Địa Chỉ: WARRIOR GYM - GYM FOR WARRIOR</li>
                    <li>Email: warriorgym@gmail.com</li>
                    <li>Hotline: 0902 1411 7102</li>
                    <li>Điện Thoại: 0902 1411 7102</li>
                    <li>Giờ Làm Việc: 6h00 - 22h00</li>
                </ul>
            </div>
            <div class="section3">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Farmyfitness.fyc&tabs=timeline&width=340&height=331&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="340" height="331" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
        <div class="footer2">
            <center><img src="./Image/logo_200x200.png"></center>
            <center><h4>Hiệu quả tập luyện có thể khác nhau, tùy thuộc vào thể trạng của mỗi người.</h4>
            <h4>Hãy kiên trì tập luyện, kết quả sẽ đến với bạn</h4></center>
        </div>
        </nav>
      `;
    }
  }
customElements.define('main-footer', Footer);