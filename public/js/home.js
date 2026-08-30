/**
 * Diasens Connect - Interactive UI Script
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Sticky Navbar styling on scroll
    const navbar = document.querySelector('.navbar-custom');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 40) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // 2. Same as Permanent Address checkbox handler
    const sameAddressCheck = document.getElementById('sameAddress');
    const permanentAddressInput = document.getElementById('permanentAddress');
    const deliveryAddressInput = document.getElementById('deliveryAddress');

    if (sameAddressCheck && permanentAddressInput && deliveryAddressInput) {
        sameAddressCheck.addEventListener('change', () => {
            if (sameAddressCheck.checked) {
                deliveryAddressInput.value = permanentAddressInput.value;
                deliveryAddressInput.setAttribute('readonly', 'true');
                deliveryAddressInput.style.backgroundColor = '#EEF4F8';
            } else {
                deliveryAddressInput.removeAttribute('readonly');
                deliveryAddressInput.style.backgroundColor = '';
            }
        });

        // If permanent address changes while checkbox is checked, update delivery address
        permanentAddressInput.addEventListener('input', () => {
            if (sameAddressCheck.checked) {
                deliveryAddressInput.value = permanentAddressInput.value;
            }
        });
    }

    // 3. 10-digit Mobile Number strictly numeric filter
    const mobileInputs = document.querySelectorAll('.mobile-number');
    mobileInputs.forEach(input => {
        input.addEventListener('input', (e) => {
            e.target.value = e.target.value.replace(/[^0-9]/g, '').slice(0, 10);
        });
    });

    // 4. Smooth scrolling for anchor links (both internal and cross-page)
    document.querySelectorAll('a[href*="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const rawHref = this.getAttribute('href');
            if (!rawHref || rawHref === '#') return;

            try {
                const targetUrl = new URL(this.href, window.location.origin);
                
                // If the link points to a hash on the current page
                if (targetUrl.pathname === window.location.pathname && targetUrl.hash) {
                    const targetElement = document.querySelector(targetUrl.hash);
                    if (targetElement) {
                        e.preventDefault();

                        // Close mobile navbar if open
                        const navCollapse = document.getElementById('navbarContent');
                        if (navCollapse && navCollapse.classList.contains('show')) {
                            const bsCollapse = bootstrap.Collapse.getInstance(navCollapse);
                            if (bsCollapse) bsCollapse.hide();
                        }

                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                        history.pushState(null, null, targetUrl.hash);
                    }
                }
            } catch (err) {
                console.error('Smooth scroll error:', err);
            }
        });
    });

    // 5. Scroll to hash target on page load if coming from another page
    if (window.location.hash) {
        setTimeout(() => {
            const targetElement = document.querySelector(window.location.hash);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }, 150);
    }
});
