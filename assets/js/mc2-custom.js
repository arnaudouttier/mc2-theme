// Custom JS for MC2
console.log('Hello la MC2');

document.addEventListener('DOMContentLoaded', () => {



    // Message Flash Top Bar
    if (document.getElementById('closeTopBar')) {

        let topBarFlash = document.getElementById('bandeau');
        let closeTopBar = document.getElementById('closeTopBar');
        const navigationContainer = document.querySelector('#navigation-container')

        closeTopBar.addEventListener('click', () => {
            document.cookie = "messageFlash=off; path=/; max-age=${60 * 60 * 24 * 1};";
            topBarFlash.style.height = '0';
            topBarFlash.style.paddingBlock = '0';
            navigationContainer.classList.remove('active')
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
            let viewportWidth = window.innerWidth;

            if (scrollAmount > navHeight && viewportWidth > 1200) {
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

    let viewportWidth = window.innerWidth;

    // If scroll => reposition
    document.addEventListener('scroll', () => {

        if (document.getElementById('navigation-container').classList.contains('sticky') && viewportWidth > 1200) {
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
        const navigationContainer = document.querySelector('#navigation-container')

        el.addEventListener('click', (e) => {

            e.preventDefault(); // href=#

            if (e.target.classList.contains('focus')) {
                subMenuAll.forEach(sub => {
                    sub.classList.remove('active');
                    navigationContainer.classList.remove('active')
                });
                e.target.classList.remove('focus');
                headerHome.classList.remove('sub-menu-open');
            } else {
                itemNav.forEach(item => {
                    item.classList.remove('focus');
                });
                subMenuAll.forEach(sub => {
                    sub.classList.remove('active');
                    navigationContainer.classList.remove('active')
                });
                e.target.classList.add('focus');
                subMenu.classList.add('active');
                headerHome.classList.add('sub-menu-open');
                navigationContainer.classList.add('active')
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

    // Page Agenda Bouton filtrer en jaune quand actif
    const agendaFilterButtonContainer = document.querySelector('.tribe-events-c-events-bar__filter-button-container')
    let agendaFilterButton = document.querySelector('.tribe-events-c-events-bar__filter-button')

    agendaFilterButton.addEventListener('click', () => {
        agendaFilterButtonContainer.classList.toggle('active')
    })


    /* Page Agenda Filtre bar bouton associé aux filtres */
    let agendaFilterButtons = document.querySelectorAll('button.tribe-filter-bar-c-pill__pill')
    let filterBarContainerItems = document.querySelectorAll('.tribe-filter-bar-c-filter__container')

    agendaFilterButtons[0].classList.add('button-filter-programme')
    agendaFilterButtons[1].classList.add('button-filter-evenements')
    agendaFilterButtons[2].classList.add('button-filter-rdv-public')

    const moveFilterBarToFilterButton = (first, second) => {
        var FirstParent = first;
        var SecondParent = second;

        if (SecondParent.hasChildNodes()) {
            FirstParent.insertAdjacentElement("afterend", SecondParent);
        }
    }

    // bouton programme  
    moveFilterBarToFilterButton(agendaFilterButtons[0], filterBarContainerItems[0]);

    // bouton evenement
    moveFilterBarToFilterButton(agendaFilterButtons[1], filterBarContainerItems[1]);

    // bouton rdv public
    moveFilterBarToFilterButton(agendaFilterButtons[2], filterBarContainerItems[2]);


    /* Agenda event List en grid*/
    // const agendaEventList = document.querySelector('.tribe-events-calendar-list')

    // function insertAfter(newNode, existingNode) {
    //     existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
    // }

    // D'abord vérifier que l'élément a des noeuds enfants
    // if (agendaEventList.hasChildNodes()) {
    //     var children = agendaEventList.childNodes;

    //     console.log(children);

    //     for (var i = 0; i < children.length; i++) {
    //         // faire quelque chose avec chaque enfant[i]
    //         // NOTE: La liste est en ligne, l'ajout ou la suppression des enfants changera la liste


    //         console.log(children[0]);
    //         let li = document.createElement('li');
    //         li.textContent = 'Services';
    //         insertAfter(li, children[0])

    //         if (children[i].nodeName === "h2") {
    //             let hhh = children[i].nodeName === "h2"
    //             console.log(typeof hhh);
    //             hhh.insertAdjacentHTML("afterend", `<h1>OUI</h1>`)
    //         }

    //     }
    // }

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