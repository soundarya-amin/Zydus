document.addEventListener("DOMContentLoaded", function () {

    /*
    |--------------------------------------------------------------------------
    | Same Address Checkbox
    |--------------------------------------------------------------------------
    */

    const sameAddress = document.getElementById("sameAddress");
    const permanentAddress =
        document.querySelector('[name="permanent_address"]');

    const deliveryAddress =
        document.getElementById("deliveryAddress");

    if (
        sameAddress &&
        permanentAddress &&
        deliveryAddress
    ) {

        sameAddress.addEventListener("change", function () {

            if (this.checked) {
                deliveryAddress.value =
                    permanentAddress.value;

                deliveryAddress.readOnly = true;
            } else {
                deliveryAddress.value = "";
                deliveryAddress.readOnly = false;
            }

        });

        permanentAddress.addEventListener("input", function () {

            if (sameAddress.checked) {
                deliveryAddress.value = this.value;
            }

        });
    }


    /*
    |--------------------------------------------------------------------------
    | Mobile Number Validation
    |--------------------------------------------------------------------------
    */

    const mobileInputs = document.querySelectorAll(
        'input[type="tel"]'
    );

    mobileInputs.forEach(function (input) {

        input.addEventListener("input", function () {

            // Allow numbers only
            this.value = this.value.replace(/\D/g, "");

            // Maximum 10 digits
            if (this.value.length > 10) {
                this.value = this.value.substring(0, 10);
            }

        });

    });


    /*
    |--------------------------------------------------------------------------
    | Smooth Scroll
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('a[href^="#"]').forEach(function (link) {

        link.addEventListener("click", function (event) {

            const targetId = this.getAttribute("href");

            if (
                targetId &&
                targetId !== "#" &&
                document.querySelector(targetId)
            ) {

                event.preventDefault();

                document.querySelector(targetId).scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });

            }

        });

    });


    /*
    |--------------------------------------------------------------------------
    | Bootstrap Mobile Navbar Close
    |--------------------------------------------------------------------------
    */

    const navbarLinks =
        document.querySelectorAll("#mainNavbar .nav-link");

    const navbar =
        document.getElementById("mainNavbar");

    navbarLinks.forEach(function (link) {

        link.addEventListener("click", function () {

            if (
                navbar &&
                navbar.classList.contains("show")
            ) {

                const bsCollapse =
                    bootstrap.Collapse.getInstance(navbar);

                if (bsCollapse) {
                    bsCollapse.hide();
                }

            }

        });

    });

});
