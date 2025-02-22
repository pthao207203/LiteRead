<!DOCTYPE html>
<html lang="vi">
  <head>
<style>
/* globals.css */
@import url("https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css");
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,700,600");
* {
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}
html,
body {
  margin: 0px;
  height: 100%;
}
/* a blue color as a generic focus style */
button:focus-visible {
  outline: 2px solid #4a90e2 !important;
  outline: -webkit-focus-ring-color auto 5px !important;
}
a {
  text-decoration: none;
}

/* style.css */
.frame {
    display: flex;
    flex-direction: column;
    width: 428px;
    align-items: flex-start;
    gap: 12px;
    position: relative;
  }
  
  .frame .name {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    gap: 16px;
    padding: 17px;
    position: relative;
    align-self: stretch;
    width: 100%;
    flex: 0 0 auto;
  }
  
  .frame .nguy-t-h {
    position: relative;
    align-self: stretch;
    margin-top: -1.00px;
    font-family: "Montserrat", Helvetica;
    font-weight: 700;
    color: var(--foundationredreddark);
    font-size: 24px;
    text-align: center;
    letter-spacing: 0;
    line-height: 29.3px;
  }
  
  .frame .div {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 12px;
    position: relative;
    align-self: stretch;
    width: 100%;
    flex: 0 0 auto;
  }
  
  .frame .text-wrapper {
    position: relative;
    align-self: stretch;
    margin-top: -1.00px;
    font-family: "Montserrat", Helvetica;
    font-weight: 500;
    color: var(--foundationredreddark);
    font-size: 18px;
    letter-spacing: 0;
    line-height: 22.0px;
  }
  
  .frame .div-2 {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    position: relative;
    align-self: stretch;
    width: 100%;
    flex: 0 0 auto;
  }
  
  .frame .div-3 {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    gap: 10px;
    padding: 10px;
    position: relative;
    flex: 1;
    flex-grow: 1;
    background-color: var(--foundationredorangelight-hover);
    border-radius: 12px;
  }
  
  .frame .text-wrapper-2 {
    position: relative;
    width: fit-content;
    margin-top: -1.00px;
    font-family: "Montserrat", Helvetica;
    font-weight: 400;
    color: var(--foundationredrednormal);
    font-size: 18px;
    letter-spacing: 0;
    line-height: normal;
  }
  
  .frame .text-wrapper-3 {
    position: relative;
    width: fit-content;
    font-family: "Montserrat", Helvetica;
    font-weight: 600;
    color: var(--foundationredrednormal);
    font-size: 14px;
    letter-spacing: 0;
    line-height: normal;
  }
  
  .frame .div-4 {
    display: flex;
    width: 397px;
    align-items: flex-start;
    justify-content: center;
    gap: 10px;
    position: relative;
    flex: 0 0 auto;
    margin-right: -3.00px;
  }
  
  .frame .div-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 10px;
    position: relative;
    flex: 1;
    flex-grow: 1;
    background-color: var(--foundationredrednormal);
    border-radius: 12px;
  }
  
  .frame .text-wrapper-4 {
    position: relative;
    width: fit-content;
    margin-top: -1.00px;
    font-family: "Montserrat", Helvetica;
    font-weight: 600;
    color: var(--foundationredredlight);
    font-size: 18px;
    letter-spacing: 0;
    line-height: normal;
  }
  
  .frame .div-wrapper-2 {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 10px;
    position: relative;
    flex: 1;
    flex-grow: 1;
    background-color: var(--foundationredorangelight-hover);
    border-radius: 12px;
  }
  
  .frame .text-wrapper-5 {
    position: relative;
    width: fit-content;
    margin-top: -1.00px;
    font-family: "Montserrat", Helvetica;
    font-weight: 600;
    color: var(--foundationredrednormal);
    font-size: 18px;
    letter-spacing: 0;
    line-height: normal;
  }
  
  .frame .div-5 {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 18px;
    position: relative;
    align-self: stretch;
    width: 100%;
    flex: 0 0 auto;
  }
  
  .frame .story-card {
    width: 394px;
    align-items: flex-end;
    gap: 12px;
    flex: 0 0 auto;
    display: flex;
    position: relative;
  }
  
  .frame .image {
    position: relative;
    width: 177px;
    height: 220px;
  }
  
  .frame .div-wrapper-3 {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    position: relative;
    align-self: stretch;
    width: 100%;
  }
  
  .frame .text-wrapper-6 {
    position: relative;
    flex: 1;
    font-family: "Montserrat", Helvetica;
    font-weight: 500;
    color: var(--foundationredreddarker);
    font-size: 20px;
    letter-spacing: 0;
    line-height: normal;
  }
  
  .frame .div-6 {
    position: relative;
    flex: 1;
    margin-top: -1.00px;
    font-family: "Montserrat", Helvetica;
    font-weight: 400;
    color: var(--foundationredreddarker);
    font-size: 16px;
    letter-spacing: 0;
    line-height: normal;
  }
  
  .frame .span {
    font-family: "Montserrat", Helvetica;
    font-weight: 400;
    color: #4b2423;
    font-size: 16px;
    letter-spacing: 0;
  }
  
  .frame .text-wrapper-7 {
    font-weight: 600;
  }
  
  .frame .story-card-2 {
    display: flex;
    align-items: flex-end;
    gap: 12px;
    position: relative;
    align-self: stretch;
    width: 100%;
    flex: 0 0 auto;
  }
  
  .frame .img {
    position: relative;
    width: 177px;
    height: 220px;
    object-fit: cover;
  }
  
  .frame .group {
    position: relative;
    width: 428px;
    height: 322px;
  }
  
  .frame .overlap-group {
    position: relative;
    height: 322px;
  }
  
  .frame .div-wrapper-4 {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 10px;
    position: absolute;
    top: 0;
    left: 17px;
    background-color: var(--foundationredorangelight-hover);
    border-radius: 12px 12px 0px 0px;
  }
  
  .frame .div-7 {
    display: flex;
    width: 428px;
    align-items: center;
    gap: 17px;
    padding: 12px 17px;
    position: absolute;
    top: 37px;
    left: 0;
    background-color: var(--foundationredorangelight-hover);
    overflow-x: scroll;
  }
  
  .frame .div-7::-webkit-scrollbar {
    width: 0;
    display: none;
  }
  
  .frame .story-card-3 {
    flex-direction: column;
    width: 121px;
    height: 261px;
    align-items: flex-start;
    gap: 4px;
    display: flex;
    position: relative;
  }
  
  .frame .image-2 {
    position: relative;
    align-self: stretch;
    width: 100%;
    height: 150px;
  }
  
  .frame .tag {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 2px;
    position: relative;
    flex: 0 0 auto;
    background-color: var(--foundationredrednormal);
    border-radius: 2px;
  }
  
  .frame .text-wrapper-8 {
    position: relative;
    width: fit-content;
    margin-top: -1.00px;
    font-family: "Montserrat", Helvetica;
    font-weight: 500;
    color: var(--foundationredorangelight);
    font-size: 12px;
    letter-spacing: 0;
    line-height: normal;
  }

  .frame .infor, 
  .frame .infor-2 {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 10px; /* Loại bỏ khoảng cách */
    width: 177px;
    height: 220px;
    position: relative;
    align-self: stretch;
    width: 100%;
    margin-top: -2px;
  }

  
  .frame .text-wrapper-9 {
    position: relative;
    flex: 1;
    margin-top: -1.00px;
    font-family: "Montserrat", Helvetica;
    font-weight: 500;
    color: var(--foundationredorangedarker);
    font-size: 16px;
    letter-spacing: 0;
    line-height: normal;
  }
  
  .frame .div-8 {
    display: inline-flex;
    align-items: flex-start;
    gap: 4px;
    position: relative;
    flex: 0 0 auto;
  }
  
  .frame .rate {
    display: inline-flex;
    align-items: flex-end;
    position: relative;
    flex: 0 0 auto;
  }
  
  .frame .star {
    position: relative;
    width: 16px;
    height: 16px;
  }
  
  .frame .text-wrapper-10 {
    position: relative;
    width: fit-content;
    margin-top: -1.00px;
    font-family: "Montserrat", Helvetica;
    font-weight: 400;
    color: var(--foundationredrednormal);
    font-size: 12px;
    letter-spacing: 0;
    line-height: normal;
  }
  
  .frame .text-wrapper-11 {
    position: relative;
    flex: 1;
    margin-top: -1.00px;
    font-family: "Montserrat", Helvetica;
    font-weight: 400;
    color: var(--foundationredrednormal);
    font-size: 16px;
    letter-spacing: 0;
    line-height: normal;
  }
  
  .frame .image-3 {
    position: relative;
    align-self: stretch;
    width: 100%;
    height: 150px;
    object-fit: cover;
  }
  /* Original CSS code */
  
  /* Add these new styles */
  body {
    font-family: "Montserrat", Helvetica, Arial, sans-serif;
    color: var(--foundationredreddarker);
    line-height: 1.5;
  }
  
  .frame {
    max-width: 428px;
    margin: 0 auto;
  }
  
  .name h1 {
    margin-bottom: 16px;
  }
  
  .div-4 {
    margin-bottom: 18px;
  }
  
  .div-4 button {
    cursor: pointer;
    border: none;
    font-family: inherit;
    font-size: inherit;
    transition: background-color 0.3s ease;
  }
  
  .div-4 button:hover {
    opacity: 0.9;
  }
  
  .story-card,
  .story-card-2,
  .story-card-3 {
    transition: transform 0.3s ease;
  }
  
  .story-card:hover,
  .story-card-2:hover,
  .story-card-3:hover {
    transform: translateY(-5px);
  }
  
  .rate {
    display: inline-flex;
    align-items: center;
  }
  
  .rate img {
    width: 16px;
    height: 16px;
  }
  
  .div-7 {
    scrollbar-width: thin;
    scrollbar-color: var(--foundationredrednormal)
      var(--foundationredorangelight-hover);
  }
  
  .div-7::-webkit-scrollbar {
    width: 6px;
    height: 6px;
  }
  
  .div-7::-webkit-scrollbar-thumb {
    background-color: var(--foundationredrednormal);
    border-radius: 3px;
  }
  
  .div-7::-webkit-scrollbar-track {
    background-color: var(--foundationredorangelight-hover);
  }
  
  @media (max-width: 428px) {
    .frame {
      width: 100%;
    }
  
    .div-4 {
      flex-wrap: wrap;
    }
  
    .div-4 button {
      flex: 1 1 100%;
      margin-bottom: 10px;
    }
  }
  
/* styleguide.css */
:root {
    --foundationredreddark: rgba(160, 77, 76, 1);
    --foundationredrednormal: rgba(213, 102, 101, 1);
    --foundationredredlight: rgba(251, 240, 240, 1);
    --foundationredreddarker: rgba(75, 36, 35, 1);
    --foundationredorangelight: rgba(255, 247, 245, 1);
    --foundationredorangedarker: rgba(89, 59, 55, 1);
    --foundationredorangelight-hover: rgba(255, 242, 240, 1);
  }
  
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang cá nhân tác giả</title>
  </head>
  <body>
    <main class="frame">
      <section class="name">
        <h1 class="nguy-t-h">NGUYỆT HẠ</h1>
        <div class="div">
          <p class="text-wrapper">14 Truyện</p>
          <div class="div-2">
            <div class="div-3">
              <p class="text-wrapper-2">4</p>
              <p class="text-wrapper-3">Truyện sáng tác</p>
            </div>
            <div class="div-3">
              <p class="text-wrapper-2">0</p>
              <p class="text-wrapper-3">Truyện dịch</p>
            </div>
          </div>
          <div class="div-2">
            <div class="div-3">
              <p class="text-wrapper-2">120</p>
              <p class="text-wrapper-3">Người theo dõi</p>
            </div>
            <div class="div-3">
              <p class="text-wrapper-2">66.6K</p>
              <p class="text-wrapper-3">Lượt đọc</p>
            </div>
          </div>
        </div>
        <div class="div">
          <nav class="div-4">
            <button class="div-wrapper"><span class="text-wrapper-4">Đã duyệt</span></button>
            <button class="div-wrapper-2"><span class="text-wrapper-5">Chờ duyệt</span></button>
            <button class="div-wrapper-2"><span class="text-wrapper-5">Nháp</span></button>
          </nav>
          <div class="div-5">
            <article class="story-card">
              <img
                class="image"
                src="https://c.animaapp.com/Bio2gXdc/img/image-7-2@2x.png"
                alt="Bìa truyện Thiên quan tứ phúc"
              />
              <div class="infor">
                <h2 class="div-wrapper-3"><span class="text-wrapper-6">Thiên quan tứ phúc</span></h2>
                <p class="div-wrapper-3"><span class="div-6">Số chữ: 24.7K</span></p>
                <p class="div-wrapper-3">
                  <span class="div-6">
                    <span class="span">Trạng thái: </span>
                    <span class="text-wrapper-7">Đã duyệt</span>
                  </span>
                </p>
                <p class="div-wrapper-3"><span class="div-6">Thể loại: Truyện dịch</span></p>
                <p class="div-wrapper-3"><span class="div-6">Số chương: 120</span></p>
                <p class="div-wrapper-3"><span class="div-6">Lượt đọc: 33.3k</span></p>
                <p class="div-wrapper-3"><span class="div-6">Yêu thích: 12K</span></p>
                <p class="div-wrapper-3"><span class="div-6">Bình luận: 200</span></p>
              </div>
            </article>
            <article class="story-card-2">
              <img
                class="img"
                src="https://c.animaapp.com/Bio2gXdc/img/image-7-3@2x.png"
                alt="Bìa truyện Thiên quan tứ phúc"
              />
              <div class="infor">
                <h2 class="div-wrapper-3"><span class="text-wrapper-6">Thiên quan tứ phúc</span></h2>
                <p class="div-wrapper-3"><span class="div-6">Số chữ: 24.7K</span></p>
                <p class="div-wrapper-3">
                  <span class="div-6">
                    <span class="span">Trạng thái: </span>
                    <span class="text-wrapper-7">Đã duyệt</span>
                  </span>
                </p>
                <p class="div-wrapper-3"><span class="div-6">Thể loại: Truyện dịch</span></p>
                <p class="div-wrapper-3"><span class="div-6">Số chương: 120</span></p>
                <p class="div-wrapper-3"><span class="div-6">Lượt đọc: 33.3k</span></p>
                <p class="div-wrapper-3"><span class="div-6">Yêu thích: 12K</span></p>
                <p class="div-wrapper-3"><span class="div-6">Bình luận: 200</span></p>
              </div>
            </article>
            <article class="story-card-2">
              <img
                class="img"
                src="https://c.animaapp.com/Bio2gXdc/img/image@2x.png"
                alt="Bìa truyện Thiên quan tứ phúc"
              />
              <div class="infor">
                <h2 class="div-wrapper-3"><span class="text-wrapper-6">Thiên quan tứ phúc</span></h2>
                <p class="div-wrapper-3"><span class="div-6">Số chữ: 24.7K</span></p>
                <p class="div-wrapper-3">
                  <span class="div-6">
                    <span class="span">Trạng thái: </span>
                    <span class="text-wrapper-7">Đã duyệt</span>
                  </span>
                </p>
                <p class="div-wrapper-3"><span class="div-6">Thể loại: Truyện dịch</span></p>
                <p class="div-wrapper-3"><span class="div-6">Số chương: 120</span></p>
                <p class="div-wrapper-3"><span class="div-6">Lượt đọc: 33.3k</span></p>
                <p class="div-wrapper-3"><span class="div-6">Yêu thích: 12K</span></p>
                <p class="div-wrapper-3"><span class="div-6">Bình luận: 200</span></p>
              </div>
            </article>
          </div>
        </div>
      </section>
      <section class="group">
        <div class="overlap-group">
          <h2 class="div-wrapper-4"><span class="text-wrapper-5">Truyện đề cử</span></h2>
          <div class="div-7">
            <article class="story-card-3">
              <img
                class="image-2"
                src="https://c.animaapp.com/Bio2gXdc/img/image-7-8@2x.png"
                alt="Bìa truyện Thiên Quan Tứ Phúc"
              />
              <div class="tag"><span class="text-wrapper-8">Full</span></div>
              <div class="infor-2">
                <h3 class="div-wrapper-3"><span class="text-wrapper-9">Thiên Quan Tứ Phúc</span></h3>
                <div class="div-8">
                  <div class="rate" aria-label="Đánh giá 4 sao">
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-29.svg" alt="Sao rỗng" />
                  </div>
                  <span class="text-wrapper-10">4</span>
                </div>
                <p class="div-wrapper-3"><span class="text-wrapper-11">Số chữ: 24.7K</span></p>
              </div>
            </article>
            <article class="story-card-3">
              <img
                class="image-3"
                src="https://c.animaapp.com/Bio2gXdc/img/image-7-5@2x.png"
                alt="Bìa truyện Thỉnh Hạ"
              />
              <div class="tag"><span class="text-wrapper-8">Full</span></div>
              <div class="infor-2">
                <h3 class="div-wrapper-3"><span class="text-wrapper-9">Thỉnh Hạ</span></h3>
                <div class="div-8">
                  <div class="rate" aria-label="Đánh giá 4 sao">
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-29.svg" alt="Sao rỗng" />
                  </div>
                  <span class="text-wrapper-10">4</span>
                </div>
                <p class="div-wrapper-3"><span class="text-wrapper-11">Chương 6</span></p>
              </div>
            </article>
            <article class="story-card-3">
              <img
                class="image-3"
                src="https://c.animaapp.com/Bio2gXdc/img/image-7-6@2x.png"
                alt="Bìa truyện Mùa Hạ Năm Ấy"
              />
              <div class="tag"><span class="text-wrapper-8">Full</span></div>
              <div class="infor-2">
                <h3 class="div-wrapper-3"><span class="text-wrapper-9">Mùa Hạ Năm Ấy</span></h3>
                <div class="div-8">
                  <div class="rate" aria-label="Đánh giá 4 sao">
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-29.svg" alt="Sao rỗng" />
                  </div>
                  <span class="text-wrapper-10">4</span>
                </div>
                <p class="div-wrapper-3"><span class="text-wrapper-11">Chương 12</span></p>
              </div>
            </article>
            <article class="story-card-3">
              <img
                class="image-2"
                src="https://c.animaapp.com/Bio2gXdc/img/image-7-8@2x.png"
                alt="Bìa truyện Thiên quan tứ phúc"
              />
              <div class="tag"><span class="text-wrapper-8">Full</span></div>
              <div class="infor-2">
                <h3 class="div-wrapper-3"><span class="text-wrapper-9">Thiên quan tứ phúc</span></h3>
                <div class="div-8">
                  <div class="rate" aria-label="Đánh giá 4 sao">
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-29.svg" alt="Sao rỗng" />
                  </div>
                  <span class="text-wrapper-10">4</span>
                </div>
                <p class="div-wrapper-3"><span class="text-wrapper-11">Số chữ: 24.7K</span></p>
              </div>
            </article>
            <article class="story-card-3">
              <img
                class="image-2"
                src="https://c.animaapp.com/Bio2gXdc/img/image-7-8@2x.png"
                alt="Bìa truyện Thiên quan tứ phúc"
              />
              <div class="tag"><span class="text-wrapper-8">Full</span></div>
              <div class="infor-2">
                <h3 class="div-wrapper-3"><span class="text-wrapper-9">Thiên quan tứ phúc</span></h3>
                <div class="div-8">
                  <div class="rate" aria-label="Đánh giá 4 sao">
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-28.svg" alt="Sao đầy" />
                    <img class="star" src="https://c.animaapp.com/Bio2gXdc/img/star-29.svg" alt="Sao rỗng" />
                  </div>
                  <span class="text-wrapper-10">4</span>
                </div>
                <p class="div-wrapper-3"><span class="text-wrapper-11">Số chữ: 24.7K</span></p>
              </div>
            </article>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>
