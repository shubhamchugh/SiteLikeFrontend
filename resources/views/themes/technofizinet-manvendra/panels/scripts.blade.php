<script class="img-fluid" src="{{ asset('themes/manvendra/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>


<style>
    .accordion-button:focus {
        z-index: 3;
        border-color: transparent;
        outline: 0;
        box-shadow: none;
    }

    .accordion-button:not(.collapsed) {
        color: var(--bs-accordion-active-color);
        background-color: transparent;
        box-shadow: inset 0 calc(var(--bs-accordion-border-width) * -1) 0 var(--bs-accordion-border-color);
    }

    .accordion-button::after {
        content: "";
        background-image: none;
        background-repeat: no-repeat;
    }

    .accordion-button:not(.collapsed)::after {
        background-image: none;
        transform: var(--bs-accordion-btn-icon-transform);
    }
</style>