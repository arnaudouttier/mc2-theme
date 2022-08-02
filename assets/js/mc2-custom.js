// Custom JS for MC2
console.log('Hello la MC2');

document.addEventListener('DOMContentLoaded', () => {

    // Message Flash Top Bar
    if (document.getElementById('closeTopBar')) {

        let topBarFlash = document.getElementById('bandeau');
        let closeTopBar = document.getElementById('closeTopBar');

        closeTopBar.addEventListener('click', () => {
            document.cookie = "messageFlash=off; path=/; max-age=${60 * 60 * 24 * 1};";
            topBarFlash.style.height = '0';
            topBarFlash.style.paddingBlock = '0';
        });
    }

    // Play Video HomePage
    // if(document.querySelector('.video-saisons')){
    //     let videoHome = document.getElementById('video-home');
    //     let playBtn = document.querySelector('.vs-play');

    //     playBtn.addEventListener('click' , ()=> {

    //         if (videoHome.paused) {
    //             videoHome.play();
    //             playBtn.querySelector('p').innerText = "Pause";
    //           } else {
    //             videoHome.pause();
    //             playBtn.querySelector('p').innerText = "Lire";

    //           }
    //     });
    // }

    // Sticky menu on scroll + mega menu position
    if (document.getElementById('navigation-container')) {
        let nav = document.getElementById('navigation-container');
        let navHeight;
        if (document.body.classList.contains('home')) {
            navHeight = nav.offsetHeight;
        } else {
            navHeight = document.getElementById('site-header').offsetHeight;
        }

        document.addEventListener('scroll', () => {
            let scrollAmount = window.scrollY;
            if (scrollAmount > navHeight) {
                nav.classList.add('sticky')
            } else {
                nav.classList.remove('sticky');
            }
        })
    }

    // Open Sub Menu
    let itemNav = document.querySelectorAll('#primary-menu .submenu');
    let subMenuAll = document.querySelectorAll('.mega-menu');
    if (document.getElementById('headerHome')) {
        let headerHome = document.getElementById('headerHome');
    }

    // Pour le placement du megamenu
    let headerHeight = document.getElementById('navigation-container').getBoundingClientRect().bottom;
    let totalHeight = headerHeight;
    let totalHeightScroll = null;

    if (document.getElementById('wpadminbar')) {
        let adminBarHeight = document.getElementById('wpadminbar').offsetHeight;
        totalHeight += adminBarHeight;
    }

    // Position on load
    subMenuAll.forEach(sub => {
        sub.style.top = totalHeight - 1 + 'px';
    });

    // If scroll => reposition
    document.addEventListener('scroll', () => {
        if (document.getElementById('navigation-container').classList.contains('sticky')) {
            totalHeightScroll = document.getElementById('navigation-container').offsetHeight;

            subMenuAll.forEach(sub => {
                sub.style.top = totalHeightScroll - 1 + 'px';
            });

        } else {
            subMenuAll.forEach(sub => {
                sub.style.top = totalHeight - 1 + 'px';
            });
        }

    })

    // Menu item with sub-megamenu
    itemNav.forEach(el => {
        let target = el.dataset.sub;
        let subMenu = document.getElementById(target);

        el.addEventListener('click', (e) => {

            e.preventDefault(); // href=#

            if (e.target.classList.contains('focus')) {
                subMenuAll.forEach(sub => {
                    sub.classList.remove('active');
                });
                e.target.classList.remove('focus');
                headerHome.classList.remove('sub-menu-open');
            } else {
                itemNav.forEach(item => {
                    item.classList.remove('focus');
                });
                subMenuAll.forEach(sub => {
                    sub.classList.remove('active');
                });
                e.target.classList.add('focus');
                subMenu.classList.add('active');
                headerHome.classList.add('sub-menu-open');
            }
        });
    });

    // Slider Item 3 col on Home Page

    if (document.querySelector('.slider-main')) {
        let mainSection = document.getElementById('slider-home');
        let mainBg = mainSection.getAttribute('style');

        let allCols = document.querySelectorAll('.slider-main-item');
        console.log(allCols);
        console.log(mainBg);

        allCols.forEach(col => {

            let cible = col.querySelector('label');
            cible.addEventListener('click', (e) => {

                e.preventDefault();

                // BG value for changing on click (ACF field in input hidden)
                let bg = col.querySelector('.bg-col').value;

                if (col.classList.contains('active')) {
                    col.classList.remove('active');
                    mainSection.setAttribute('style', mainBg);
                } else {
                    allCols.forEach(col => {
                        col.classList.remove('active');
                    });
                    col.classList.add('active');
                    mainSection.setAttribute('style', 'background: url(' + bg + ');');
                }

            });
        })
    }

});



jQuery(document).ready(function ($) {

    // Cookies
    $('a[href=#cookies]').click(function (e) {
        e.preventDefault();
        openAxeptioCookies();
    });

    // Video BG Home Page
    $("#video-home").YTPlayer();

    $('#vs-play').click(function () {
        $('#video-home').YTPPlay();
        $('#video-home').YTPSetVolume(100);
        $(this).fadeOut();
    });

    if ($("#headerHome").length) {
        $("#headerHome").YTPlayer();
        $("#headerHome").on("YTPReady", function (e) {
            $("#headerHome").addClass('no-bg');
        });
        $('#headerHome').YTPPlay();
    }

});