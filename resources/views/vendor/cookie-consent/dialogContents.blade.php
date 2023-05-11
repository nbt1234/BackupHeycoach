<div class="js-cookie-consent cookie-consent bg-light fixed-bottom cockies-popup py-3 shadow">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="max-w-7xl mx-auto px-6">
        <div class="p-2 rounded-lg bg-yellow-100">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 items-center hidden md:inline">
                    <p class="ml-3 mb-0 text-black cookie-consent__message">
                        {!! trans('cookie-consent::texts.message') !!}
                    </p>
                </div>
                
            </div>
        </div>
    </div>
            </div>
            <div class="col-md-4">
                <div class="mt-2 flex-shrink-0 w-full sm:mt-0 sm:w-auto">
                    <button class="js-cookie-consent-agree cookie-consent__agree cursor-pointer flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-300 accept mx-2">
                        {{ trans('cookie-consent::texts.agree') }}
                    </button>
                    <button class="decline btn-danger mx-2"> Decline</button>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
.cockies-popup button.accept {
    border: none;
    border-radius: 5px;
    background: #00a19a;
    padding: 10px 20px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
}

  .cockies-popup button.decline {
    border: none;
    border-radius: 5px;
/*    background: #00a19a;*/
    padding: 10px 20px;
/*    color: #fff;*/
    font-size: 15px;
    cursor: pointer;
}
</style>