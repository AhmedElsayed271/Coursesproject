const scrollBtn = document.getElementById("scrollBtn");
if (scrollBtn) {
  function scrollToTop() {
    window.addEventListener("scroll", () => {
      if (window.scrollY >= 400) {
        scrollBtn.style.display = "block";
      } else {
        scrollBtn.style.display = "none";
      }
    });
    scrollBtn.addEventListener("click", () => {
      window.scrollTo({ top: 1, behavior: "smooth" });
    });
  }
  scrollToTop();
  AOS.init();
}

const radionBtnWalet = document.getElementById("wallet");
const cards = document.getElementById("cards");
const walletData = document.getElementById("walletData");

if (radionBtnWalet && cards && walletData) {
  function walletPayment() {
    walletData.style.display = "none";
    radionBtnWalet.addEventListener("change", () => {
      if (radionBtnWalet.checked) {
        walletData.style.display = "block";
      } else {
        walletData.style.display = "none";
      }
    });
    cards.addEventListener("change", () => {
      if (cards.checked) {
        walletData.style.display = "none";
      }
    });
  }
  walletPayment()
}


const videoTitles = document.querySelectorAll(".video-title");
const mainVideo = document.getElementById("player");
if (videoTitles && mainVideo) {
  function changeVideoSrc() {
    videoTitles.forEach((title) => {
      title.addEventListener("click", () => {
        const videoSrc = title.getAttribute("data-video-src");
        mainVideo.src = videoSrc;
        mainVideo.load();
        mainVideo.play();
      });
    });
  }
  changeVideoSrc();
  const player = new Plyr("#player");
}

const copyIcon = document.getElementById("copyIcon");

if (copyIcon) {
  copyIcon.addEventListener("click", () => {
    const inputElement = document.querySelector('input[name="userlink"]');
    if (inputElement) {
      inputElement.select();
      document.execCommand("copy");
      copyIcon.classList.remove("fa-regular", "fa-copy");
      copyIcon.classList.add("fa-solid", "fa-check");
      copyIcon.style.color = "#d0004a";

      setTimeout(() => {
        copyIcon.classList.add("fa-regular", "fa-copy");
        copyIcon.classList.remove("fa-solid", "fa-check");
        copyIcon.style.color = "";
      }, 1500);
    }
  });
}
const moneyWallet = document.getElementById("moneyWallet");
const moneyHaveing = document.getElementById("moneyHaveing");

const marketing = document.getElementById("marketing");

if (marketing) {
  marketing.onchange = function () {
    
    let ElementLink = document.getElementById("linkCourse");

    constOptoinSelected = document.querySelector("#marketing option[selected]");

    let selectedOption = this.options[this.selectedIndex];

    linkOfCourse = selectedOption.getAttribute('data-link');

    ElementLink.value = linkOfCourse;

  };
}



