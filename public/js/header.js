setTimeout(() => {

    $(function () {
        // Mobile nav menu dropdown
        let toggleMenuvisibleBtn = document.querySelector('.nav-mobile-toggle');
        let menuCloseBtn = document.getElementsByClassName('nav-close-btn')[0];
        let mainNav = document.querySelector('nav');

        let logo = document.getElementsByClassName('header-logo')[0];
        // hide nav menu, client map, news 
        logo.addEventListener('click', () => {
            if (mainNav.classList.contains('visible')) {
                toggleNavMenuvisible();
            }

            let mapBlock = $('.map-block');
            if (mapBlock.hasClass('active')) {
                toggleClientMapvisible();
            }

            if (newsBlockvisible) {
                toggleNewsBlockvisible();
            }

            document.querySelector('nav .equipment.active').classList.remove('active');
        })


        function toggleNavMenuvisible() {
            mainNav.classList.toggle('visible');

            document.querySelectorAll('header .in-menu').forEach((el, _) => {
                el.classList.toggle('nav-open');
            });

        }

        // mobile navigation
        let mobileSearch = document.querySelector('.header-search');
        let searchBtn = document.querySelector('.header-search a');
        let searchInput = document.getElementById('search-input');
        let headerPhone = document.querySelector('.header-phone');
        let navMobileToggle = document.querySelector('.nav-mobile-toggle');
        let headerPhoneBtn = document.querySelector('.header-phone a');
        let headerPhoneIcon = document.querySelector('.header-phone img');


        // show search box
        searchBtn.addEventListener('click', () => {
            mobileSearch.classList.toggle('open');
            searchInput.focus();

            if (window.innerWidth < 650) {
                headerPhone.style.display = 'none';
                navMobileToggle.style.display = 'none';
            }
        });

        // close search box
        searchInput.addEventListener('blur', () => {
            mobileSearch.classList.remove('open');
            if (window.innerWidth < 650) {
                headerPhone.style.display = 'inline-block';
                navMobileToggle.style.display = 'inline-block';
            }
        }, true);


        window.addEventListener('click', (evt) => {
            let phonevisible = headerPhone.classList.contains('open');
            if (phonevisible) {
                let clickedOnheaderPhone = evt.target === headerPhoneBtn
                    || evt.target === headerPhone.querySelector('.header-phone .call-number')
                    || evt.target === headerPhoneIcon;
                if (!clickedOnheaderPhone) {
                    headerPhone.classList.remove('open');
                    mobileSearch.style.display = 'inline-block';
                    navMobileToggle.style.display = 'block';
                }
            }

            // close second active nav menu
            if (!evt.target.classList.contains('equipment')) {
                let activeMenu = document.querySelector('.equipment.active');
                if (activeMenu !== null) {
                    activeMenu.classList.remove('active');
                }
            }
        })

        // show phone number
        headerPhoneBtn.addEventListener('click', (evt) => {
            headerPhone.classList.toggle('open');

            if (window.innerWidth < 650) {
                mobileSearch.style.display = 'none';
                navMobileToggle.style.display = 'none';
            }
        });

        toggleMenuvisibleBtn.addEventListener('click', () => {
            toggleNavMenuvisible();
            closeActiveMenu();
            document.querySelector('.soc-block').classList.toggle('soc-visible');
        });

        menuCloseBtn.addEventListener('click', () => {
            closeActiveMenu();
            toggleNavMenuvisible();
        });

        function closeActiveMenu() {
            let activeMenu = document.querySelector('nav .equipment.active');
            if (activeMenu !== null) {
                activeMenu.classList.remove('active');
            }
        }

        let activeMenu = $("nav .equipment.active")[0];
        let inMenu = false;
        let inNav = false;
        $("nav .equipment").mouseover(toggleSecondNavMenu);
        $("nav .equipment").click(toggleSecondNavMenu);


        function toggleSecondNavMenu(evt) {
            inNav = true;
            if (evt.target !== activeMenu && activeMenu !== undefined) {
                $(activeMenu).removeClass('active');
            }
            $(this).addClass('active');
            activeMenu = this;
        }


        $("header").mouseleave(function () {
            inNav = false;
        });

        $("header").mouseover(function () {
            inMenu = true;
        });

        $(".in-menu").mouseleave(function () {
            setTimeout(() => {
                if (!inMenu && !inNav) {
                    $(activeMenu).removeClass('active');
                }
            }, 200);
            inMenu = false;
        });

        $('.out-of-menu').mouseover(() => {
            $(activeMenu).removeClass('active');
        })

        $('.services a').mouseleave((evt) => {
            evt.target.classList.remove('active');
        })

        $('.partners a').mouseleave((evt) => {
            evt.target.classList.remove('active');
        })

        $('.projects a').mouseleave((evt) => {
            evt.target.classList.remove('active');
        })

        $('.contacts-menu a').mouseleave((evt) => {
            evt.target.classList.remove('active');
        })

        $('header .search').on('click', (evt) => {
            if (evt.target.value === "") {
                evt.target.placeholder = "";
            }
        });

        $('header .search').on('focusout', (evt) => {
            evt.target.placeholder = "Поиск";
        })

    });

}, 1000);
