Promise.all([
    fetch("header.html").then(res => res.text()).then(data => { var $h = $("#header"); if ($h.length) $h.html(data); }).catch(() => {}),
    fetch("sidebar.html").then(res => res.text()).then(data => { var $s = $("#sidebar"); if ($s.length) $s.html(data); }).catch(() => {}),
    fetch("footer.html").then(res => res.text()).then(data => { var $f = $("#footer"); if ($f.length) $f.html(data); }).catch(() => {})
]).then(() => {
    initNavLink();
    initFAQtabbtn();
    initAnimate();
    initProgressBar();
    initCounter();
    initOdometerCounter();
    initSidebar();
    initSidebarDropdown();
    if ($("#contactForm").length) initSubmitContact();
    if ($("#newsletterForm").length) initSubmitNewsletter();
    initStickyHeader();
}).catch(function() {
    initNavLink();
    initFAQtabbtn();
    initAnimate();
    initProgressBar();
    initCounter();
    initOdometerCounter();
    initSidebar();
    initSidebarDropdown();
    if ($("#contactForm").length) initSubmitContact();
    if ($("#newsletterForm").length) initSubmitNewsletter();
    initStickyHeader();
});

function initCounter() {
    var $counters = $('.counter');
    var totalDuration = 2000;
    var maxTarget = 0;

    $counters.each(function() {
        var target = parseFloat($(this).attr('data-target'));
        if (target > maxTarget) {
            maxTarget = target;
        }
    });

    function startCounting($counter) {
        var target = parseFloat($counter.attr('data-target'));
        var count = 0;
        var step = target / (totalDuration / 16);

        function updateCount() {
            if (count < target) {
                count += step;
                if (count > target) count = target;

                if (target >= 1000) {
                    if (target % 1000 === 0) {
                        $counter.text(Math.floor(count / 1000) + "K");
                    } else {
                        $counter.text((count / 1000).toFixed(1) + "K");
                    }
                } else {
                    var decimalPlaces = (target.toString().split('.')[1] || '').length;
                    $counter.text(count.toFixed(decimalPlaces));
                }

                if (count < target - step) {
                    setTimeout(updateCount, 16);
                } else {
                    var decimalPlaces = (target.toString().split('.')[1] || '').length;
                    $counter.text(
                        target >= 1000
                            ? (target / 1000).toFixed(target % 1000 === 0 ? 0 : 1) + "K"
                            : target.toFixed(decimalPlaces)
                    );
                }
            }
        }

        updateCount();
    }

    var observer = new window.IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                $counters.each(function() {
                    startCounting($(this));
                });
                observer.disconnect();
            }
        });
    }, { threshold: 0.3 });

    $counters.each(function() {
        observer.observe(this);
    });
}

function initOdometerCounter() {
    let hasStarted = false;

    function startOdometer() {
        if (hasStarted) return;
        hasStarted = true;

        $('.odometer').each(function () {
            const $el = $(this);
            const rawValue = parseInt($el.attr('data-raw-value'), 10);
            let displayValue = '';
            let suffix = '';

            if (rawValue >= 1000000) {
                displayValue = (rawValue / 1000000).toFixed(1);
                suffix = 'M';
            } else if (rawValue >= 1000) {
                displayValue = (rawValue / 1000).toFixed(1);
                suffix = 'K';
            } else {
                displayValue = rawValue;
                suffix = '';
            }

            // Tambahkan angka di depan titik jika perlu
            if (displayValue.toString().startsWith('.')) {
                displayValue = '0' + displayValue;
            }

            $el.text(displayValue);

            // Cari elemen .odometer-suffix di dalam parent terdekat dan set suffix
            $el.closest('.counter-box').find('.odometer-suffix').text(suffix);
        });
    }

    // Cek apakah ada elemen .odometer di halaman
    const $odometers = $('.odometer');
    if ($odometers.length === 0) return;

    // Gunakan IntersectionObserver agar animasi dimulai saat elemen terlihat di layar
    const observer = new window.IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                startOdometer();
                observer.disconnect();
            }
        });
    }, { threshold: 0.3 });

    // Observe salah satu odometer saja, karena biasanya mereka muncul bersamaan
    observer.observe($odometers.get(0));
}



function  initNavLink() {
    const currentUrl = window.location.href.split("?")[0].split("#")[0];
    $(".navbar-nav .nav-link, .sidebar .menu a").each(function() {
        const href = this.href.split("?")[0].split("#")[0];
        if (href === currentUrl) {
            $(this).addClass("active");
            this.setAttribute("aria-current", "page");
        }
    });
    $(".navbar-nav .dropdown-menu .dropdown-item").each(function() {
        if (this.href === currentUrl) {
            $(this).closest(".dropdown").find(".nav-link.dropdown-toggle").addClass("active");
        }
    });
}

function initFAQtabbtn() {
    var $buttons = $(".tab-btn");
    var $smallTabContents = $(".tab-content-sm .tab-pane");
    var $largeTabContents = $(".tab-content .tab-pane");
    var mediaQuery = window.matchMedia("(max-width: 768px)");

    $buttons.on("click", function () {
        var targetAttr = $(this).attr("data-bs-target");
        if (!targetAttr || targetAttr === "#") return;
        var targetId = targetAttr.substring(1);
        if (!targetId) return;

        if (mediaQuery.matches) {
            $smallTabContents.removeClass("show active");
            $("#" + targetId).addClass("show active");
        } else {
            $largeTabContents.removeClass("show active");
            var $targetContent = $("#" + targetId + "-lg");
            if ($targetContent.length) {
                $targetContent.addClass("show active");
            }
        }

        $buttons.removeClass("active");
        $(this).addClass("active");
    });
}

function initAnimate() {
    var $elements = $('[data-animate]');
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var $el = $(entry.target);
                var delay = $el.attr('data-delay') || 0;
                setTimeout(function() {
                    $el.addClass($el.attr('data-animate'));
                    $el.css('opacity', 1);
                    observer.unobserve(entry.target);
                }, delay);
            }
        });
    }, { threshold: 0.1 });

    $elements.each(function() {
        observer.observe(this);
    });
}
function initProgressBar() {
  $('.progress-bar').each(function () {
    var $progressBar = $(this);
    var $progressBarContainer = $progressBar.closest('.progress-bar-container');
    var $progressMessage = $progressBarContainer.find('.progress-message');
    var $progressMessageSpan = $progressMessage.find('span');
    var target = parseInt($progressBar.attr('data-progress-target'), 10);
    var current = 0;
    var animated = false;

    function animateProgress() {
      if (current <= target) {
        $progressBar.css('width', current + '%');
        $progressMessageSpan.text((current < 10 ? '0' : '') + current + '%');

        var containerWidth = $progressBarContainer.outerWidth();
        var messageWidth = $progressMessage.outerWidth();
        var left = (containerWidth * current / 100) - (messageWidth / 2);
        left = Math.max(0, Math.min(left, containerWidth - messageWidth));
        $progressMessage.css('left', left + 'px');

        current++;
        requestAnimationFrame(animateProgress);
      }
    }

    var observer = new window.IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting && !animated) {
          animated = true;
          $progressBar.css('width', '0%');
          current = 0;
          animateProgress();
          observer.unobserve($progressBarContainer[0]);
        }
      });
    }, { threshold: 0.3 });

    observer.observe($progressBarContainer[0]);
  });
}

function initSidebar() {
    const $menuBtn = $('.nav-btn');
    const $closeBtn = $('.close-btn');
    const $overlay = $('.sidebar-overlay');
    const $sidebar = $('.sidebar');
  
    function closeSidebar() {
      $sidebar.removeClass('active');
      $menuBtn.attr('aria-expanded', 'false');
      setTimeout(() => {
        $overlay.removeClass('active');
      }, 200);
    }

    $menuBtn.click(function() {
      $overlay.addClass('active');
      $menuBtn.attr('aria-expanded', 'true');
      setTimeout(() => {
        $sidebar.addClass('active');
      }, 200);
    });
  
    $closeBtn.click(function() {
      closeSidebar();
    });
  
    $overlay.click(function() {
      closeSidebar();
    });

    $(document).on('keydown', function(event) {
      if (event.key === 'Escape' && $sidebar.hasClass('active')) {
        closeSidebar();
      }
    });
}

function initSidebarDropdown() {
    var $dropdownButtons = $(".sidebar-dropdown-btn");

    $dropdownButtons.on("click", function () {
        var $dropdownMenu = $(this).parent().next();
        var isOpen = $dropdownMenu.hasClass("active");

        $(".sidebar-dropdown-menu").not($dropdownMenu).removeClass("active");

        $dropdownMenu.toggleClass("active", !isOpen);
    });
}

function initStickyHeader() {
    const $navbarLayout = $('.navbar-layout');
    const $navbar = $('.navbar');
    
    $(window).on('scroll', function() {
        const scrollTop = $(window).scrollTop();
        
        if (scrollTop > 50) {
            $navbarLayout.addClass('scrolled');
        } else {
            $navbarLayout.removeClass('scrolled');
        }
    });
    
    // Trigger initial check
    $(window).trigger('scroll');
}