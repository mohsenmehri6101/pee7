<div class="col-sm-8">
    <div class="description-block text-left pl-4">
        <h5 class="description-header pb-3 text-right pr-3 text-secondary">
            درباره
        </h5>
        <div class="description-block text-right pr-5">
            <p class="text-justify">
                {{ auth()->user()->admin->about }}
            </p>
        </div>
    </div>
</div>
