<div class="light-wrapper">
    <div class="container faq-container">
        <div class="row">
            <h3 class="section-title text-center">
                F.A.Q
            </h3>
            <section class="faq-container">
                <details class="faq">
                    <summary>{{__('faq.prices_q')}}</summary>
                    <p>{{__('faq.prices_a')}}
                    </p>
                </details>
                <details class="faq">
                    <summary>{{__('faq.after_services_q')}}</summary>
                    <p>{{__("faq.after_services_a")}}
                    </p>
                </details>
                <details class="faq">
                    <summary>{{__('faq.how_much_q')}}
                    </summary>
                    <p>{{__('faq.how_much_a')}}</p>
                </details>
               
            </section>
        </div>
    </div>
</div>
<style>

    .faq-container {
    padding: 4rem 0;
    width: 80%;
    margin: auto;
    }
    .faq[open] summary ~ * {
    animation: open 0.3s ease-in-out;
    }

    @keyframes open {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
    }
    .faq summary::-webkit-details-marker {
    display: none;
    }
    .faq summary:hover{
        text-shadow: 2px 2px lightblue;
    }

    .faq summary {
    width: 100%;
    padding: 0.5rem 0;
    border-top: 1px solid lightgray;
    position: relative;
    cursor: pointer;
    font-size: 2rem;
    font-weight: 300;
    list-style: none;
    }

    .faq summary:after {
    content: "+";
    color: black;
    position: absolute;
    font-size: 1.75rem;
    line-height: 0;
    margin-top: 0.75rem;
    right: 0;
    font-weight: 200;
    transform-origin: center;
    transition: 200ms linear;
    }
    .faq[open] summary:after {
    transform: rotate(45deg);
    font-size: 2rem;
    }
    .faq summary {
    outline: 0;
    }
    .faq p {
    font-size: 1.5rem;
    margin: 0 0 1rem;
    padding-top: 1rem;
    }

</style>